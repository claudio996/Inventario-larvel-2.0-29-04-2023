<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Item;
use App\Models\personal;
use App\Models\prestacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class EventoController extends Controller
{
    protected $personal, $items, $prestacion;

    public function __construct()
    {
        $this->personal = new personal();
        $this->items = new Item();
        $this->prestacion = new  prestacion();
    }
    public function index()
    {
        //

        $getAllPersonal = $this->personal->where('status', 1)->get();
        $getAllItems = $this->items->where('status', 1)->get();
       
        return view('eventos.index',['personal' => $getAllPersonal, 'items' => $getAllItems]);
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
    }

    /**
     * Display the specified resource.
     */
    public function show(Evento $evento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evento $evento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evento $evento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evento $evento)
    {
        //
    }
}
