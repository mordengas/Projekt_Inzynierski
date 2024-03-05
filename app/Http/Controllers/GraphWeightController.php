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
        $validatedData = $request->validate([
            'start' => 'required|string',
            'destination' => 'required|string',
            'weight' => 'required|numeric|between:1,10',
        ]);

        if($validatedData['start'] === $validatedData['destination']){
            return redirect()->back()->with('err', "Start can't be same as destination.");
        }else{
            $graphWeightSame = GraphWeight::where('start', $validatedData['start'])
            ->where('destination', $validatedData['destination'])
            ->first();

            $graphWeightBidirect = GraphWeight::where('start', $validatedData['destination'])
            ->where('destination', $validatedData['start'])
            ->first();

            if ($graphWeightSame) {
                return redirect()->back()->with('err', 'Graph weight already exists for the specified start and destination.');
            }else{
                if($graphWeightBidirect){
                    $graphWeightNew = new GraphWeight();
                    $graphWeightNew->start = $validatedData['start'];
                    $graphWeightNew->destination = $validatedData['destination'];
                    $graphWeightNew->weight = $graphWeightBidirect->weight;
                    $graphWeightNew->save();
                    return redirect()->route('graphWeights.index')->with('message', 'Graph weight created successfully!');
                }
            }

            $graphWeightNew = new GraphWeight();
            $graphWeightNew->start = $validatedData['start'];
            $graphWeightNew->destination = $validatedData['destination'];
            $graphWeightNew->weight = $validatedData['weight'];
            $graphWeightNew->save();
            return redirect()->route('graphWeights.index')->with('message', 'Graph weight created successfully!');
        }

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

        $validatedData = $request->validate([
            'start' => 'required|string',
            'destination' => 'required|string',
            'weight' => 'required|numeric|between:1,10',
        ]);

        if($validatedData['start'] === $validatedData['destination']){
            return redirect()->back()->with('err', "Start can't be same as destination.");
        }else{
            $graphWeightSame = GraphWeight::where('start', $validatedData['start'])
            ->where('destination', $validatedData['destination'])
            ->first();

            $graphWeightBidirect = GraphWeight::where('start', $validatedData['destination'])
            ->where('destination', $validatedData['start'])
            ->first();

            if ($graphWeightSame->id !== $graphWeight->id) {
                return redirect()->back()->with('err', 'Graph weight already exists for the specified start and destination.');
            }else{
                if($graphWeightBidirect){

                    $graphWeight->start = $validatedData['start'];
                    $graphWeight->destination = $validatedData['destination'];
                    $graphWeight->weight = $validatedData['weight'];
                    $graphWeight->update();

                    if($graphWeightBidirect->weight !== $validatedData['weight']){
                        $graphWeightBidirect->weight = $validatedData['weight'];
                        $graphWeightBidirect->update();
                    }

                    return redirect()->route('graphWeights.index')->with('message', 'Graph weight created successfully!');
                }
            }

            $graphWeight = new GraphWeight();
            $graphWeight->start = $validatedData['start'];
            $graphWeight->destination = $validatedData['destination'];
            $graphWeight->weight = $validatedData['weight'];
            $graphWeight->update();
            return redirect()->route('graphWeights.index')->with('message', 'Graph weight created successfully!');
        }

        return redirect()->route('graphWeights.index')->with('message', 'Graph weight updated successfully!');
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

        return redirect()->route('graphWeights.index')->with('message', 'Graph weight deleted successfully!');
    }
}
