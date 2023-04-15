<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    protected $items, $categories;
    public function __construct()
    {
        $this->middleware('auth');
        $this->items = new Item();
        $this->categories = new Categorie();
     
    }

    public function index()
    {
        $items = $this->items->where('status', 1)->get();
        $categories = $this->categories->where('status', 1)->get();

        return view('items.index', ['items' => $items, 'categories' => $categories]);
    }

    public function create()
    {
        $categories = $this->categories->where('status', 1)->get();
        return view('items.create', ['categories' => $categories]);
    }


    public function store(Request $request)
    {
        //
        $this->items->name = $request->input('name');
        $this->items->serialNumber = $request->input('serialNumber');
        $this->items->numero =$request->input('numero');
        $this->items->estado =$request->input('estado');
        $this->items->categorie_id = $request->input('categorie_id');
        $this->items->status = $request->input('status');

        $this->items->save();
        return redirect('items');

    }

    public function show(string $id)
    {
        //
    }

   
    public function edit(string $id)
    {
        //
    }

  
    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
