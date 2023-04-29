<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Item;
use App\Models\personal;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    protected  $items, $personal;

    public function __construct()
    {
        $this->middleware('auth');
        $this->items = new Item();
        $this->personal = new personal();
    }
    public function index()
    {

        $getPersonal =  $this->personal->where('status', 1)->get();
        $getItems = $this->items->where('status', 1)->get();

        if (request()->ajax()) {
            $start = (!empty($_GET['start'])) ? ($_GET['start']) : ('');
            $end = (!empty($_GET['end'])) ? ($_GET['end']) : ('');
            $events = Events::whereDate('start', '>=', $start)->whereDate('end', '<=', $end)
                ->get(['id', 'title', 'start', 'end']);
            return response()->json($events);
        }



        return view('calendar.index', ['personal' => $getPersonal, 'items' => $getItems]);
    }

    public function createEvent(Request $request)
    {

        $data = $request->except('_token');
        $events = Events::insert($data);
        $data =  response()->json($events);

        return redirect('calendar');
    }
    public function edit($id)
    {
        $events = Events::find($id);
        
        return response()->json($events);
    
    }
}
