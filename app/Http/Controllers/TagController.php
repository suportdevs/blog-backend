<?php

namespace App\Http\Controllers;

use App\Models\Tags;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class TagController extends Controller
{
    public function index()
    {
        // $tags = DB::table('tags')->orderBy('id', 'DESC')->get();
        $tags = Tags::latest()->get();
        return view('backend.components.tags.index', compact('tags'));
    }
    public function create()
    {
        return view('backend.components.tags.create');
    }
    public function store(Request $request)
    {
        $validator = $request->validate([
            'tag_name' => 'required|unique:tags|min:4',
            'tag_img' => 'required|image|mimes:jpg,jpeg,png|max:1024',
        ],
        [
            'tag_name.required' => 'The Tag Name must be Fillable',
            'tag_name.unique' => 'The Tag Name Unique Charactor',
            'tag_name.min' => 'The Tag Name must be 4 charactor',
            'tag_img.required' => 'Tag Image must be Fillable',
            'tag_img.max' => 'Image must be less then 1MB',
            'tag_img.mimes' => 'Image must be jpg, jpeg, or png',
        ]);

        $tag_img = $request->file('tag_img');
        $name_gen = hexdec(uniqid());
        $ext = strtolower($tag_img->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$ext;
        $path = 'images/tags/';
        Image::make($tag_img)->resize(1080,600)->save('images/tags/'.$img_name);
        $final_img = $path.$img_name;

        // $img_gen = hexdec(uniqid()).'.'.$tag_img->getClientOriginalExtension();
        // Image::make($tag_img)->resize(300,200)->save('images/tags/'.$img_gen);
        // $final_img = 'image/brands/'.$img_gen;
        
        // $data = array();
        // $data['user_id'] = Auth::user()->id;
        // $data['tag_name'] = $request->tag_name;
        // $data['slug'] = Str::slug($request->tag_name, '-');
        // $data['image'] = $final_img;
        // $data['description'] = $request->description;
        // $data['created_at'] = Carbon::now();
        // DB::table('tags')->insert($data);

        $tag = new Tags();
        $tag->user_id = Auth::user()->id;
        $tag->tag_name = $request->tag_name;
        $tag->slug = Str::slug($request->tag_name, '-');
        $tag->image = $final_img;
        $tag->description = $request->description;
        $tag->save();
        
        // Tags::insert([
        //     'user_id' => Auth::user()->id,
        //     'tag_name' => $request->tag_name,
        //     'slug' => Str::slug($request->tag_name),
        //     'image' => $final_img,
        //     'description' => $request->description,
        //     'created_at' => Carbon::now()
        // ]);

        return Redirect()->route('admin.tags')->with('status', 'Tags Created Successfull.');
    }
    public function edit($id)
    {
        $tag = DB::table('tags')->where('id', $id)->first();
        return view('backend.components.tags.edit', ['tag' => $tag]);
    }
    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'tag_name' => 'required|min:4',
            'tag_img' => 'max:1024',
        ],
        [
            'tag_name.required' => 'The Tag Name must be Fillable',
            'tag_name.min' => 'The Tag Name must be 4 charactor',
            'tag_img.max' => 'Image must be less then 1MB',
            'tag_img.mimes' => 'Image must be jpg, jpeg, or png',
        ]);

        $tag = Tags::find($id);

        if($request->file('tag_img') != ''){
            // code for remove old image
            if($tag->image != '' && $tag->image != null){
                $old_img = $tag->image;
                unlink($old_img);
            }
            // upload new file
            $new_file = $request->file('tag_img');
            $fileName = hexdec(uniqid()).'.'.$new_file->getClientOriginalExtension();
            Image::make($new_file)->resize(1600, 1060)->save('images/tags/'.$fileName);
            $final_img = 'images/tags/'.$fileName;
                    
            $data = array();
            // $data['user_id'] = Auth::user()->id;
            $data['tag_name'] = $request->tag_name;
            $data['slug'] = $request->slug;
            $data['image'] = $final_img;
            $data['description'] = $request->description;
            $data['updated_at'] = Carbon::now();
            $data['updated_by'] = Auth::user()->id;
            DB::table('tags')->where('id', $id)->update($data);

            return Redirect()->route('admin.tags')->with('status', 'Tag Upadated Successfull.');
        } 
        else {

            $data = array();
            // $data['user_id'] = Auth::user()->id;
            $data['tag_name'] = $request->tag_name;
            $data['slug'] = $request->slug;
            $data['description'] = $request->description;
            $data['updated_at'] = Carbon::now();
            $data['updated_by'] = Auth::user()->id;
            DB::table('tags')->where('id', $id)->update($data);

            return Redirect()->route('admin.tags')->with('status', 'Tag Upadated Successfull.');
        }
    }
    public function show($id)
    {
        // $tag = DB::table('tags')->where('id', $id)->first();
        $tag = Tags::find($id);
        return view('backend.components.tags.show', ['tag' => $tag]);
    }
    public function restore($id)
    {
        Tags::onlyTrashed()->find($id)->restore();
        return Redirect()->back()->with('status', 'Tag Restored Successfull.');
    }
    public function destroy($id)
    {
        Tags::find($id)->delete();
        return Redirect()->back()->with('status', 'Tag Deleted Successfull.');
    }
    public function trashed()
    {
        $tags = Tags::onlyTrashed()->get();
        return view('backend.components.tags.trashed', ['tags' => $tags]);
    }
    public function forceDelete($id)
    {
        $tag = Tags::onlyTrashed()->find($id);

        $exit_img = $tag->image;
        unlink($exit_img);

        Tags::onlyTrashed()->find($id)->forceDelete();

        return Redirect()->back()->with('status', 'Tag Permanently Deleted Successfull.');
    }
}
