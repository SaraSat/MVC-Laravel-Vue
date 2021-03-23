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
            $producto = [
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price
            ];
            
            Producto::create($producto);

            return response()->json([
                'satatus' => 200,
                'message' => 'Success -> El producto se ha registrado correctamente',
                'data' => $producto
            ], 200);
        }
        
    }

    public function editar( Request $request) {
        $producto = Producto::where('id', $request->id)->first();

        if($producto) {
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
                    'message' => 'Error -> el producto no se ha podido actualizar',
                    'data' => $v->errors()
                ], 400);                
            }else {
                $producto->update([
                    'name' => $request->name,
                    'description' => $request->description,
                    'price' => $request->price
                ]);

                return response()->json([
                    'satatus' => 200,
                    'message' => 'Success -> El producto se ha actualizado correctamente',
                    'data' => $producto
                ], 200);
                
            }
        }else {
            return response()->json([
                'satatus' => 400,
                'message' => 'Error -> Ha habido un error, el producto con '. $request->id. " no se encuentra",
                'data' => 'El id '.$request->id.' no existe'
            ], 400);

        }

    }

    public function getProducto(Request $request) {
        $producto = Producto::where('id', $request->id)->first();
        
        return $producto;

    }

}


