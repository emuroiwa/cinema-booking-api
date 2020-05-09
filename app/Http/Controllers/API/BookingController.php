<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'book_id' => 'required|max:50',
            'user_id' => 'required|max:50',
            'process_type' => 'required|max:20',
        ]);

        if (!User::find($request['user_id'])) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, user with id ' . $request['user_id']
                . ' cannot be found'
            ], 400);
        }
        if (!Book::find($request['book_id'])) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, book with id ' . $request['book_id']
                . ' cannot be found'
            ], 400);
        }

        $book = resolve('App\CinemaServices\BookingService');
        return $book->checkOutBook($request['user_id'], $request['book_id']);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
