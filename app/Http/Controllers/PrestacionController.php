<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\prestacion;
use Illuminate\Routing\Controllers\Middleware;

use App\Models\Item;
use App\Models\personal;

class PrestacionController extends Controller
{
    protected $personal, $items, $prestacion;

    public function __construct()
    {
        $this->middleware('auth');
        $this->personal = new personal();
        $this->items = new Item();
        $this->prestacion = new  prestacion();
    }

    public function index(Request $request)
    {

        $events = array();
        $prestaciones =  $this->prestacion::all();
        foreach ($prestaciones as $prestacion) {

            $events[] = [
                'title' => $prestacion->title,
                'start' => $prestacion->start_date,
                'end' => $prestacion->end_date,
                'personal_id' => $prestacion->personal_id,
                'item_id' =>   $prestacion->item_id
            ];
        }

        $getAllPersonal = $this->personal->where('status', 1)->get();
        $getAllItems = $this->items->where('status', 1)->get();
        return view('prestaciones.index', ['personal' => $getAllPersonal, 'items' => $getAllItems, 'eventsAll' => $events]);
    }


    public function action(Request $request)
    {
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        print('ddd');


        $this->prestacion->create([
            
            'title' => $request->input('title'),
            'personal_id' => $request->personal_id,
            'item_id' => $request->item_id,
            'start' => $request->startDateTime,
            'end' => $request->end_date

        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(prestacion $prestacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(prestacion $prestacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($request, prestacion $prestacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(prestacion $prestacion)
    {
        //
    }
}
