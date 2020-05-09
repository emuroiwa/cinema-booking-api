<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Showing;

class ShowingController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate
        request()->validate([
            'show_time' => 'required',
            'movie_id' => 'required|numeric',
        ]);

        Showing::create([
            'show_time' => $request['show_time'],
            'movie_id' => $request['movie_id'],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Movie Showing Details Added'
        ], 201);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate
        request()->validate([
            'show_time' => 'required'
        ]);

        $showing = Showing::findOrFail($id);
        $showing->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Movie Showing Details Update'
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $showing = Showing::findOrFail($id);
        $showing->delete();

        return response()->json([
            'success' => true,
            'message' => 'Movie Showing Details Delete'
        ], 201);
    }
}
