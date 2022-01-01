<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        // $categories = DB::table('categories')
        //             ->join('users', 'categories.user_id', 'users.id')
        //             ->select('categories.*','users.name')
        //             ->latest()->get();
        $categories = Category::latest()->get();
        return view('backend.components.categories.index', compact('categories'));
    }
    public function create()
    {
        return view('backend.components.categories.create');
    }

    public function insert(Request $request)
    {
        $request->validate([
            'category_name' => 'required|min:4|unique:categories'
        ],
        [
            'category_name.required' => 'The Category Name must be Fillable.',
            'category_name.min' => 'The Category Name must be 4 Charactors.',
            // 'slug.required' => 'The Category slug must be Fillable.',
            'category_name.unique' => 'The Category must be Unique Charactors.',

        ]);
        // Category::insert([
        //     'user_id' => Auth::user()->id,
        //     'category_name' => $request->category_name,
        //     'slug' => Str::slug($request->category_name, '-'),
        //     'description' => $request->description,
        //     'created_at' => Carbon::now()
        // ]);

        $categories = new Category();
        $categories->user_id = Auth::user()->id;
        $categories->category_name = $request->category_name;
        $categories->slug = Str::slug($request->category_name, '-');
        $categories->description = $request->description;
        $categories->save();

        // $data = array();
        // $data['user_id'] = Auth::user()->id;
        // $data['category_name'] = $request->category_name;
        // $data['slug'] = Str::slug($request->category_name, '-');
        // $data['description'] = $request->description;
        // $data['created_at'] = Carbon::now();
        // DB::table('categories')->insert($data);
        return Redirect()->route('admin.categories')->with('status', 'Category Inserted Successfull.');
    }
    public function edit($id)
    {
        $category = DB::table('categories')->where('id', $id)->first();
        // $category = Category::find($id);
        return view('backend.components.categories.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required|min:4',
            'slug' => 'required',
        ],
        [
            'category_name.required' => 'The Category Name must be Fillable.',
            'category_name.min' => 'The Category Name must be 4 Charactors.',
            'slug.min' => 'The Category Slug must be Fillable.',

        ]);

        Category::find($id)->update([
            'user_id' => Auth::user()->id,
            'category_name' => $request->category_name,
            'slug' => $request->slug,
            'description' => $request->description,

        ]);

        // $data = array();
        // $data['user_id'] = Auth::user()->id;
        // $data['category_name'] = $request->category_name;
        // $data['slug'] = $request->slug;
        // $data['description'] = $request->description;
        // $data['updated_at'] = Carbon::now();
        // DB::table('categories')->where('id', $id)->update($data);
        return Redirect()->route('admin.categories')->with('status', 'The Category Updated Successfull.');
    }
    public function show($id)
    {
        $category = Category::find($id);
        // $category = DB::table('categories')->where('id', $id)->first();
        return view('backend.components.categories.show', compact('category'));
    }
    public function destroy($id)
    {
        // DB::table('categories')->where('id', $id)->delete(); //softDeleted not working
        Category::find($id)->delete();
        return Redirect()->back()->with('status', 'The Category Deleted Successfull.');
    }
    public function trashed()
    {
        $trashed = Category::onlyTrashed()->get();
        return view('backend.components.categories.trashed', compact('trashed'));
    }

    public function restore($id)
    {
        $restore = Category::withTrashed()->find($id)->restore();
        return Redirect()->route('admin.categories')->with('status', 'The Category Restored Successfull.');
    }
    public function forceDelete($id)
    {
        $force = Category::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->route('admin.categories')->with('status', 'The Category Force Deleted Successfull.');
    }
}
