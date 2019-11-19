<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CustomerModel;
use Carbon\Carbon;
Use Validator;

class CustomerController extends Controller
{
      /**
     * Función que Retorna todos los registros
     *
     * @return Response
     */
    public function customer() {
        return response()->json(CustomerModel::get(),200);
    }


      /**
     * Función que retorna un registro especifico
     *
     * @param  int  $id
     * @return Response
     */
    public function customerByID($id) {
        $customer = CustomerModel::find($id);
        if (is_null($customer)) {
            return response()->json(["message"=>"Registro no encontrado!"],404);
        }
        return response()->json($customer,200);
    }


    /**
     * Función que crea un nuevo  registro
     *
     * @param  Request  $request
     * @return Response
     */
    public function customerSave(Request $request){


        $rules = [
            'name'=>'required|min:3|max:199',
            'password'=>'required|min:6|max:199',
            'email' =>  'regex:/^.+@.+$/i'
        ];
        $validator = Validator::make( $request->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }


        $customer= CustomerModel::create( $request->all());
        return response()->json(CustomerModel::get()->last(),201);
    }


 /**
     * Función que actualiza un registro especifico
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function customerUpdate(Request $request, $id ){
        $date = Carbon::now('America/Bogota');
        $rules = [
            'name'=>'required|min:3|max:199',
            'password'=>'required|min:6|max:199',
            'email' =>  'regex:/^.+@.+$/i'
        ];
        $validator = Validator::make( $request->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        $customer = CustomerModel::find($id);
        if (is_null($customer)) {
            return response()->json(["message"=>"Registro no encontrado!"],404);
        }
        $customer->update($request->all());
        $customer->update(['modified' =>  $date,'modified_by' => 'Anthony']);
        return response()->json($customer,200);
    }


    /**
     * Función que elimina un registro especifico
     *
     * @param  int  $id
     * @return Response
     */
    public function customerDelete(Request $request, $id){
        $customer = CustomerModel::find($id);
        if (is_null($customer)) {
            return response()->json(["message"=>"Registro no encontrado!"],404);
        }
        $customer->delete();
        return response()->json(null,204);
    }



}
