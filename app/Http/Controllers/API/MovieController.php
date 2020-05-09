<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Movie;

class MovieController extends Controller
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
            'movie_name' => 'required|unique:movies',
        ]);

        Movie::create([
            'movie_name' => $request['movie_name'],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Movie Details Added'
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
            'movie_name' => 'required',
        ]);

        $movie = Movie::findOrFail($id);
        $movie->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Movie Details Update'
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
        $movie = Movie::findOrFail($id);
        $movie->delete();

        return response()->json([
            'success' => true,
            'message' => 'Movie Details Delete'
        ], 201);
    }
}
