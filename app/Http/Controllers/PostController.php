<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

    public function update(Request $request, $id)
    {
        $mediaTable = DB::table('media')->where('id', $id)->first();
        if($mediaTable->id == $id){
            // Storage::disk('public')->deleteDirectory($id);        
            // DB::table('media')->where('id', $id)->delete();
        }

        $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'excerpt' => ['required', 'string', 'max:100'],
            'description' => ['required'],
            'featured_image' => ['image', 'mimes:jpg,jpeg,png', 'max:1024'],
            'category_id' => ['required', 'array', 'min:1'],
            'category_id.*' => ['required', 'integer', 'exists:categories,id'],
            'tag_id' => ['required', 'array', 'min:1'],
            'tag_id.*' => ['required', 'integer', 'exists:tags,id'],
            'meta_title' => ['required', 'max:100'],
        ]);

        $post = Post::find($id);

        $new_image = $request->file('featured_image');
        if(isset($new_image)){
            if($post->featured_image !== "" && $post->featured_image !== NULL && Storage::disk('public')->exists(('posts/'.$post->featured_image))){
                Storage::disk('public')->delete('posts/'.$post->featured_image);
            }
            $imageName = hexdec(uniqid()).'.'.$new_image->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('posts'))
            {
                Storage::disk('public')->makeDirectory('posts');
            }
            $postImage = Image::make($new_image)->resize(1600, 1060)->save();
            Storage::disk('public')->put('posts/'.$imageName,$postImage);
        } else {
            $imageName = $post->featured_image;
        }

        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->slug = Str::slug($request->title, '-');
        $post->featured_image = $imageName;
        $post->excerpt = $request->excerpt;
        $post->description = $request->description;
        $post->type = $request->post;
        $post->post_status = $request->status;
        $post->is_featured = $request->is_featured;
        $post->meta_title = $request->meta_title;
        $post->meta_keyword = $request->meta_keyword;
        $post->meta_description = $request->meta_description;
        $post->updated_by = Auth::id();
        $post->save();

        $post->categories()->sync($request->category_id);
        $post->tags()->sync($request->tag_id);
        
        return redirect()->route('admin.posts')->with('status', 'Post Updated Successful.');
    }

    public function ckeditorUpdate($id)
    {
        $post = new Post();
        $post->id = $id;
        $post->exists = true;
        $contentImage = $post->addMediaFromRequest('upload')->toMediaCollection('images');

        return response()->json([
            'url' => $contentImage->getUrl('thumb')
        ]);
    }

}
