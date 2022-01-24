<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('backend.components.posts.index', ['posts' => $posts]);
    }
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('backend.components.posts.create', [
            'categories' => $categories,
            'tags' => $tags
        ]);
    }
    public function store(Request $request)
    {        
        $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'excerpt' => ['required', 'string', 'max:100'],
            'description' => ['required'],
            'featured_image' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:1024'],
            'category_id' => ['required', 'array', 'min:1'],
            'category_id.*' => ['required', 'integer', 'exists:categories,id'],
            'tag_id' => ['required', 'array', 'min:1'],
            'tag_id.*' => ['required', 'integer', 'exists:tags,id'],
            'meta_title' => ['required', 'max:100'],
        ]);
                
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
            $request->file('upload')->move(public_path('pages'), $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('pages/'.$fileName);
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url')</script>";
            echo $response;
            }

        $image = $request->file('featured_image');
        
        if(isset($image)){
            $imageName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('posts')){
                Storage::disk('public')->makeDirectory('posts');
            }
            $postImage = Image::make($image)->resize(1600, 1060)->save();
            Storage::disk('public')->put('posts/'.$imageName,$postImage);
        }
        $post = new Post();
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->slug = Str::slug($request->title, '-');
        $post->excerpt = $request->excerpt;
        $post->description = $request->description;
        $post->featured_image = $imageName;
        $post->type = $request->type;
        $post->post_status = $request->status;
        $post->is_featured = $request->is_featured;
        $post->meta_title = $request->meta_title;
        $post->meta_keyword = $request->meta_keywords;
        $post->meta_description = $request->meta_description;
        $post->save();

        $post->categories()->attach($request->category_id);
        $post->tags()->attach($request->tag_id);

        return Redirect()->route('admin.posts')->with('status', 'Post Created Successfull.');
    }

    public function ckeditor()
    {
        $post = new Post();
        $post->id = 0;
        $post->exists = true;
        $contentImage = $post->addMediaFromRequest('upload')->toMediaCollection('images');

        return response()->json([
            'url' => $contentImage->getUrl('thumb')
        ]);
    }

    public function show($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('backend.components.posts.show', ['post'=>$post, 'categories'=>$categories, 'tags'=>$tags]);
    }
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('backend.components.posts.edit', ['post'=>$post, 'categories'=>$categories, 'tags'=>$tags]);
    }

}
