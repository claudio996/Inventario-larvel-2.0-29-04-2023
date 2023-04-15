<?php

namespace App\Http\Controllers;

use App\Models\personal;
use App\Models\Item;
use Illuminate\Http\Request;


class PersonalController extends Controller
{
    protected $personal, $items;
    public function __construct()
    {
        $this->personal = new personal();
        $this->items = new Item();
    }
    public function index()
    {
        //
        $getAllPersonal = $this->personal->where('status', 1)->get();
        $getAllItems = $this->items->where('status', 1)->get();
        return view('personal.index', ['personal' => $getAllPersonal, 'items' => $getAllItems]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $this->validate($request, [
            'name' => 'required|max:255',
            'surname' => 'required|max:100',
            'cargo' => 'required',
            
        ]);

        $this->personal->name = $request->input('name');
        $this->personal->surname = $request->input('surname');
        $this->personal->cargo = $request->input('cargo');
        $this->personal->save();
        return redirect('personal');
    }

    /**
     * 
     * Display the specified resource.
     */
    public function show(personal $personal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(personal $personal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($request, personal $personal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(personal $personal)
    {
        //
    }
}
