<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $catgories  = Category::All();
        return view('admin.categories.index',compact('catgories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $imageName = time().'_'.$request->image->extension();
        $request->image->move(public_path('categories'),$imageName);
       Category::create([
        'name'=>$request->name,
        'description'=>$request->description,
        'image'=>$imageName,
       ]);
       return redirect(route('admin.categories.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
       return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // dd($request->image);
        $request->validate([
            'name'=>'required',
            'description'=>'required'
        ]);
       if(isset($request->image)){
        $imageName = time().'_'.$request->image->extension();
        $request->image->move(public_path('categories'),$imageName);
        $category->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'image'=>$imageName
        ]);
       }else{
        $category->update([
            'name'=>$request->name,
            'description'=>$request->description
        ]);
       }
        
        return redirect(route('admin.categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
       $category->menus()->detach();
       $category->delete();
       return redirect(route('admin.categories.index'))->with('danger','Category deleted sucessfully.');
    }
}
