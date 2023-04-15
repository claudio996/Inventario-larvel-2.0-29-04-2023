<?php

namespace App\Http\Controllers;

use App\Models\dependence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DependenceController extends Controller
{
    protected $dependences;
    public function __construct()
    {
        $this->middleware('auth');
        $this->dependences = new  dependence();
    }

    public function index()
    {
        //
        $dependence =  $this->dependences::all();
        return view('dependences.index', ['dependences' => $dependence]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dependences.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required|max:255',
            'type' => 'required|max:255',
            'capacity' => 'required',
        ]);

        $this->dependences->name = $request->input('name');
        $this->dependences->type = $request->input('type');
        $this->dependences->capacity = $request->input('capacity');
        $this->dependences->status = $request->input('status');
        $this->dependences->save();
        return redirect('dependences');
    }

    public function edit($id)
    {
        //
        $dependency = dependence::findOrFail($id);

        return view('dependences.edit', ['dependences' => $dependency]);
    }

    public function update_status($id)
    {
        $dependences = DB::table('dependences')
            ->select('status')
            ->where('id', '=', $id)
            ->first();


        if ($dependences->status == '1') {
            $status = '0';
        } else {
            $status = '1';
        }
        $values = array('status' => $status);
        DB::table('dependences')->where('id', $id)->update($values);
        session()->flash('msg', 'dependences status has been updated sucesfully');
        return redirect('dependences');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //+
        $this->validate($request, [
            'name' => 'required|max:255',
            'type' => 'required|max:255',
            'capacity' => 'required',
        ]);

        $dependence = dependence::find($id);

        $dependence->name = $request->input('name');
        $dependence->type = $request->input('type');
        $dependence->capacity = $request->input('capacity');
        $dependence->update();
        return redirect('dependences');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        dependence::destroy($id);
        return redirect('dependences');
    }
}
