<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Producto;

class ProductoController extends Controller
{
    /**
     * Listado de productos
     */
    public function index(){
        return Producto::get();
    }

    /**
     * Registro Producto
     */
    public function registro(Request $request){

        $validator = [
            'name' => 'required', 
            'description' => 'required',
            'price' => 'numeric|required'
        ];

        $message = [
            'required' => 'campo obligatorio',
            'numeric' => 'campo numérico'
        ];

        $v = Validator::make($request->all(), $validator, $message);

        if($v->fails() == true) {
            return response()->json([
                'satatus' => 400,
                'message' => 'Error -> el producto no se ha podido registrar',
                'data' => $v->errors()
            ], 400);
        }else {
            $procuto = [
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price
            ];
            
            Producto::create($procuto);

            return response()->json([
                'satatus' => 200,
                'message' => 'Success -> El producto se ha registrado correctamente',
                'data' => $producto
            ], 200);
        }
        
    }

}


