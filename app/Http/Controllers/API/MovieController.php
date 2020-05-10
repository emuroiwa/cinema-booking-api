<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\MovieStoreRequest;
use App\Movie;

class MovieController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MovieStoreRequest $request)
    {
        try {
            //validate
            $validated = $request->validated();

            Movie::create([
                'movie_name' => $request['movie_name'],
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Movie Details Added'
            ], 201);
        } catch (\Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => $ex->getMessage()
            ], 400);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MovieStoreRequest $request, $id)
    {
        try {
            //validate
            $validated = $request->validated();

            $movie = Movie::findOrFail($id);
            $movie->update($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Movie Details Updated'
            ], 200);
        } catch (\ModelNotFoundException $ex) {
            // Movie not found
            return response()->json([
                'success' => false,
                'message' => $ex->getMessage()
            ], 422);
        } catch (\Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => $ex->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $movie = Movie::findOrFail($id);
            $movie->delete();

            return 204;
        } catch (\ModelNotFoundException $ex) {
            // Movie not found
            return response()->json([
                'success' => false,
                'message' => $ex->getMessage()
            ], 422);
        } catch (\Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => $ex->getMessage()
            ], 500);
        }
    }
}
