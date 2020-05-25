<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerStoreRequest;
use App\Repositories\Repository;
use App\Customer;

class CustomerController extends Controller
{
    private $model;
    /**
     * CustomerController constructor.
     */
    public function __construct(Customer $customer)
    {
        // set the model
        $this->model = new Repository($customer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\CustomerStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerStoreRequest $request)
    {
        try {
            //validate
            $validated = $request->validated();
            // create record and pass in only fields that are fillable
            return $this->model->create($request->only($this->model->getModel()->fillable));

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
     * @param  App\Http\Requests\CustomerStoreRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerStoreRequest $request, $id)
    {
        try {
            //validate
            $validated = $request->validated();

            // update model and only pass in the fillable fields
            $this->model->update($request->only($this->model->getModel()->fillable), $id);
            return $this->model->find($id);

        } catch (\ModelNotFoundException $ex) {
            // customer not found
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
            return $this->model->delete($id);

            return 204;
        } catch (\ModelNotFoundException $ex) {
            // customer not found
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
