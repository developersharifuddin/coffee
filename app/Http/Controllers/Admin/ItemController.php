<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category; 
use App\Models\Item;
use Carbon\Carbon;


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $items = Item::all();
        // $items = Item::select('items.*', 'categories.name')
        // ->leftJoin('categories', 'items.category_id', 'categories.id')->get();

        return view('admin.item.index', compact('categories', 'items'));
         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.item.create', compact('categories'));
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

        $item = new Item();
        $item->category_id = $request->category;
        $item->item_name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->image = $imagename;
          
        $item->save();
        return redirect()->route('item.index');
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
        $item = Item::find($id);
        return view('admin/item.edit', compact('item', 'categories'));
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

         $item = Item::find($id);
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
           $imagename = $item->image;
        }
 
        $item->category_id = $request->category;
        $item->item_name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->image = $imagename;
          
        $item->save();
        return redirect()->route('item.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
         if (file_exists('uploads/item/'.$item->image)) {
               unlink('uploads/item/'.$item->image);
             }

        $item->delete();
        return redirect()->route('item.index');

    }
}