<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Item;
use App\Models\Subitem;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubitemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $item= Item::all();
        $subitems = Subitem::all();
         return view('admin.subitem.index',compact('subitems','categories','item'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $items = Item::all();
        return view('admin.subitem.create', compact('categories','items'));
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
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required' 
             
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->name);

        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.'.'.$image->getClientOriginalExtension();
            if (!file_exists('uploads/item')) {
                mkdir('uploads/item',077, true);
             }
            $image->move('uploads/item', $imagename );
        }else {
           $imagename = 'default.png';
        }

        $subitem = new Subitem();
        $subitem->category_id = $request->category;
        $subitem->item_id = $request->item;
        $subitem->subitem_name = $request->name;
        $subitem->subitem_slug = $slug;
        $subitem->description = $request->description;
        $subitem->price = $request->price;
        $subitem->image = $imagename;
          
        $subitem->save();
        return redirect()->route('subitem.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $items = Item::all();
        $subitem = Subitem::find($id);
        return view('admin.subitem.edit', compact('subitem','categories','items'));
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
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'price' => 'required' 
             
        ]);

        $subitem = Subitem::find($id);
        $image = $request->file('image');
        $slug = str_slug($request->name);


        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.'.'.$image->getClientOriginalExtension();
            if (!file_exists('uploads/item')) {
                mkdir('uploads/item',077, true);
             }
            $image->move('uploads/item', $imagename );
        }else {
           $imagename = $subitem->image;
        }
 
        $subitem->category_id = $request->category;
        $subitem->subitem_name = $request->name;
        $subitem->item_id = $request->item;
        $subitem->subitem_slug = $slug;
        $subitem->description = $request->description;
        $subitem->price = $request->price;
        $subitem->image = $imagename;
          
        $subitem->save();
        return redirect()->route('subitem.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subitem = Subitem::find($id);
         if (file_exists('uploads/item/'.$subitem->image)) {
               unlink('uploads/item/'.$subitem->image);
             }

        $subitem->delete();
        return redirect()->route('subitem.index');
    }
}
