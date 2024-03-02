<?php

namespace App\Http\Controllers;

use App\Models\GraphWeight;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class GraphWeightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $graphWeights = GraphWeight::all();

        return view('admin.graphWeights.index', compact('graphWeights'))->with('view','admin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.graphWeights.create')->with('view','admin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'start' => 'required|string',
            'destination' => 'required|string',
            'weight' => 'required|numeric',
        ]);

        GraphWeight::create($request->all())->save();

        return redirect()->route('graphWeights.index')->with('success', 'Graph weight created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  id
     * @return \Illuminate\Http\Response
     */
    public function edit(GraphWeight $graphWeight)
    {

        return view('admin.graphWeights.edit', compact('graphWeight'))->with('view','admin');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $graphWeight = GraphWeight::findOrFail($id);

        $this->validate($request, [
            'start' => 'required|string',
            'destination' => 'required|string',
            'weight' => 'required|numeric',
        ]);

        $graphWeight->update($request->all());

        return redirect()->route('graphWeights.index')->with('success', 'Graph weight updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $graphWeight = GraphWeight::findOrFail($id);
        $graphWeight->delete();

        return redirect()->route('graphWeights.index')->with('success', 'Graph weight deleted successfully!');
    }
}
