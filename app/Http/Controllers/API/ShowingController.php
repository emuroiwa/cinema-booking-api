<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShowingStoreRequest;
use App\Showing;

class ShowingController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\ShowingStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShowingStoreRequest $request)
    {
        try {
            //validate
            $validated = $request->validated();

            Showing::create([
                'show_time' => $request['show_time'],
                'movie_id' => $request['movie_id'],
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Showing Details Added'
            ], 201);
        } catch (\Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => $ex->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\ShowingStoreRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ShowingStoreRequest $request, $id)
    {
        try {
            //validate
            $validated = $request->validated();

            $showing = Showing::findOrFail($id);
            $showing->update($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Showing Details Updated'
            ], 200);
        } catch (\ModelNotFoundException $ex) {
            // Showing not found
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
            $showing = Showing::findOrFail($id);
            $showing->delete();

            return response()->json([
                'success' => true,
                'message' => 'Movie Showing Details Delete'
            ], 201);
        } catch (\ModelNotFoundException $ex) {
            // Showing not found
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
