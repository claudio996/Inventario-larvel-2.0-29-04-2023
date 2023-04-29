<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $this->items->numero = $request->input('numero');
        $this->items->estado = $request->input('estado');
        $this->items->categorie_id = $request->input('categorie_id');
        $this->items->status = $request->input('status');

        $this->items->save();
        return redirect('items');
    }

    public function show(string $id)
    {
    }


    public function edit($id)
    {


        /*SELECT categories.name from categories, items where items.categorie_id = categories.id and items.id = 1;*/

        /*  $item = Item::where('id', '=',  $id)->first(); */
        /*     $categoriesItem  =  DB::table('categories')->select('categories.*', 'categories.name')
            ->join('items', 'categories.id', '=', 'items.categorie_id')
            ->where('items.id', $id)
            ->first(); */
        // print_r($item);.

        //   ['items' => $items], 

        $items = Item::where('id', $id)->first();
        /*       $getCategories = Categorie::all(); */

        // $categoriesItem = Item::table('items')->where('categorie_id ', '=', $id)->get();

        // 'categories' => $getCategories]

        $cat = $this->categories->all();

        return view('items.edit', ['items' => $items, 'categories' => $cat]);
    }


    public function update(Request $request, string $id)
    {

        //
        print('en update');

        /*  $this->validate($request, [
            'name' => 'required|max:255',
        ]); */
        $getItems = $this->items->find($id);

        Item::where('id', $id)->update([
            'name' => $request->name,
            'serialNumber' => $request->serialNumber,
            'numero' =>  $request->numero,
            'estado' => $request->status,
            'categorie_id' => $request->cat_id,
            'status' => $request->status
        ]);

        return redirect('items');
    }

    public function destroy(string $id)
    {
        //
    }
}
