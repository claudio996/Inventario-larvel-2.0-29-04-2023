<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    protected $categories;

    public function __construct()
    {
        $this->middleware('auth');
        $this->categories = new  Categorie();
    }
    public function index()
    {
        //
        $categorie = $this->categories::all();

        return view('categories.index', ['category' => $categorie]);
    }

 
    public function create()
    {
        //
        return view('categories.create');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:255',
            'status' => 'required',
        ]);

        $this->categories->name = $request->input('name');
        $this->categories->status = $request->input('status');
        $this->categories->save();
        return redirect('categories');
    }

    public function update_status($id)
    {
        $categories = DB::table('categories')
            ->select('status')
            ->where('id', '=', $id)
            ->first();


        if ($categories->status == '1') {
            $status = '0';
        } else {
            $status = '1';
        }
        $values = array('status' => $status);
        DB::table('categories')->where('id', $id)->update($values);
        session()->flash('msg', 'categories status has been updated sucesfully');
        return redirect('categories');
    }

    public function edit($id)
    {
        $categories = Categorie::findOrFail($id);

        return view('categories.edit', ['categories' => $categories]);
    }

    public function update(Request $request, string $id)
    {
        //
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $categories = Categorie::find($id);
        $categories->name = $request->input('name');
        $categories->update();
        return redirect('categories');
    }

    public function destroy(string $id)
    {
        Categorie::destroy($id);
        return redirect('categories');
    }
}
