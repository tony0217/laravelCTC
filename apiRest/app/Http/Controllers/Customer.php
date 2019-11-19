<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerModel;
use Carbon\Carbon;
Use Validator;

class Customer extends Controller
{
    /**
     * Función que Retorna todos los registros
     *
     * @return Response
     */
    public function index()
    {

        return response()->json(CustomerModel::get(),200);
    }

    /**
     * Función que crea un nuevo  registro
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name'=>'required|min:3|max:199',
            'password'=>'required|min:6|max:199',
            'email' =>  'required|regex:/^.+@.+$/i'
        ];
        $validator = Validator::make( $request->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        $customer= CustomerModel::create( $request->all());
        $customer->fill(['password' => encrypt($request->password)])->save();
        return response()->json(CustomerModel::get()->last(),201);
    }

    /**
     * Función que retorna un registro especifico
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $customer = CustomerModel::find($id);
        if (is_null($customer)) {
            return response()->json(["message"=>"Registro no encontrado!"],404);
        }
        $customer->fill(['password' =>  decrypt($customer->password)]);
        return response()->json($customer,200);
    }

    /**
     * Función que actualiza un registro especifico
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
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
        $customer->update(['password' => encrypt($request->password)]);
        $customer->update(['modified' =>  $date,'modified_by' => 'Anthony']);
        return response()->json($customer,200);
    }

    /**
     * Función que elimina un registro especifico
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $customer = CustomerModel::find($id);
        if (is_null($customer)) {
            return response()->json(["message"=>"Registro no encontrado!"],404);
        }
        $customer->delete();
        return response()->json(null,204);
    }
}
