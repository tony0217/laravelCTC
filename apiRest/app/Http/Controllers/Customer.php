<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerModel;
use Carbon\Carbon;
Use Validator;

class Customer extends Controller
{
    /**
     * function show all records
     *
     * @return Response
     */
    public function index()
    {

        return response()->json(CustomerModel::get(),200);
    }

    /**
     * function add a record
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $rules = [
            'firstname'=>'required',
            'email' =>  'required|regex:/^.+@.+$/i'
        ];
        $validator = Validator::make( $request->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        $customer= CustomerModel::create( $request->all());
        return response()->json(CustomerModel::get()->last(),201);
    }

    /**
     * function show a record by id
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $customer = CustomerModel::find($id);
        if (is_null($customer)) {
            return response()->json(["message"=>"Record not found!"],404);
        }
        return response()->json($customer,200);
    }

    /**
     * function Update a record
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $date = Carbon::now('America/Bogota');
        $rules = [
            'firstname'=>'required',
            'email' =>  'required|regex:/^.+@.+$/i'
        ];
        $validator = Validator::make( $request->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        $customer = CustomerModel::find($id);
        if (is_null($customer)) {
            return response()->json(["message"=>"Record not found!"],404);
        }
        $customer->update($request->all());
        $customer->update(['modified' =>  $date,'modified_by' => 'User']);
        return response()->json($customer,200);
    }

    /**
     * function Delete a record
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $customer = CustomerModel::find($id);
        if (is_null($customer)) {
            return response()->json(["message"=>"Record not found!"],404);
        }
        $customer->delete();
        return response()->json(null,204);
    }
}
