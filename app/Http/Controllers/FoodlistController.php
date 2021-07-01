<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Foodlist;
use Illuminate\Http\Request;

class FoodlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foodlists = Foodlist::all();
        return view('admin.list.show',compact('foodlists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = Post::all();
        $categories = Category::all();
        return view('admin.list.list',compact('posts','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'slug'=>'required',
            'body'=>'required',
        ]);

        $list = new Foodlist;

        
        $list->title = $request->name;
        $list->slug = $request->slug;
        $list->body = $request->body;
        $list->save();
        $list->posts()->sync($request->posts);
        $list->categories()->sync($request->category);

        return $list->posts;
        // return redirect(route('list.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lists = Foodlist::find($id);
        return view('admin.list.edit',compact('lists'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required',
            'slug'=>'required',
            'body'=>'required',
        ]);

        $list = Foodlist::find($id);

        
        $list->title = $request->name;
        $list->slug = $request->slug;
        $list->body = $request->body;
        $list->save();

        return redirect(route('list.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Foodlist::where('id',$id)->delete();

        return redirect()->back();
    }
}
