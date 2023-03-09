<?php

namespace App\Http\Controllers;

use App\Models\Rest;
use Illuminate\Http\Request;

class RestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rests = Rest::all()->sortBy('title');

        return view('back.indexRest', ['rests' => $rests]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.createRest');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rest = new Rest;

        $rest->title = $request->title;
        $rest->code = $request->code;
        $rest->address = $request->address;

        $rest->save();
        

        return redirect()->route('rests-index', ['#'.$rest->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rest  $rest
     * @return \Illuminate\Http\Response
     */
    public function show(Rest $rest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rest  $rest
     * @return \Illuminate\Http\Response
     */
    public function edit(Rest $rest)
    {
        return view('back.editRest', [
            'rest' => $rest
           ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Rest  $rest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rest $rest)
    {
        $rest->title = $request->rest_title;
        $rest->code = $request->rest_code;
        $rest->address = $request->rest_address;
       

        $rest->save();
        return redirect()->route('rests-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rest  $rest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rest $rest)
    {
        $rest->delete();
        return redirect()->back(); //->with('ok', 'Restaurant was deleted');
    }
}
