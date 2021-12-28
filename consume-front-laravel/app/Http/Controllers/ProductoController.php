<?php

namespace App\Http\Controllers;

use App\Models\Categoria;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

use Illuminate\Support\Facades\Http;

class ProductoController extends Controller{

    public function index(Request $request){
        $e = $request->get('e');
        $c = $request->get('c');
        $e = ($e??'');
        $c = ($c??'');

        $response = Http::asForm()->post('localhost/CRUD-2/apiproducto',[
            'method'   =>'index',
            'estado'   =>$e,
            'categoria'=>$c
        ]);

        $categorias = Categoria::all()->pluck('nom_categoria','id_categoria');

        $tatus     = $response->json('status');
        if($tatus == 'ok'){
            $productos = $response->json('data');
            return view('productos.index', compact('productos','categorias'));
        }else{
            return redirect()->route('productos.create')->with('msg',$response->json('msg'));
        }
    }


    public function show($id){
        $response = Http::asForm()->post('localhost/CRUD-2/apiproducto',
        [
           'method'=>'show',
           'id'    =>$id
        ]);
        $producto = $response->json('data');
        return view('productos.show', compact('producto'));
    }

    public function edit($id){
        $categorias = Categoria::all()->pluck('nom_categoria','id_categoria');
        $response = Http::asForm()->post('localhost/CRUD-2/apiproducto',
            [
                'method'=>'edit',
                'id'    =>$id
            ]);
        $producto = $response->json('data');
        return view('productos.editar', compact('producto', 'categorias'));
        //return $producto;
    }

    public function create(){
        $response = Http::asForm()->post('localhost/CRUD-2/apiproducto',
            [
                'method'=>'create',
            ]);
        $status = $response->json('status');

        if($status != 'ok'){
            return redirect()->route('categorias.index')->with('msg',$response->json('msg'));
        }else{
            $categorias = $response->json('data');
            return view('productos.crear', compact('categorias') );
        }
    }

    public function store(Request $request){
        $request->validate([
            'nom'      =>'required',
            'val'      =>'required',
            'stok'     =>'required',
            'estado'   =>'required',
            'categoria'=>'required'

        ]);
        $response = Http::asForm()->post('localhost/CRUD-2/apiproducto',
            [
                'method'   =>'store',
                'nom'      =>$request->input('nom'),
                'val'      =>$request->input('val'),
                'stok'     =>$request->input('stok'),
                'estado'   =>$request->input('estado'),
                'categoria'=>$request->input('categoria'),
                'descript' =>$request->input('descript')
            ]);
        $status = $response->json('status');
        if($status == 'ok'){
            return redirect()->route('productos.index')->with('msg',$response->json('msg'));
        }else{
            return  redirect()->route('productos.create')->with('msg',$response->json('msg'));
        }
    }

    public  function update(Request $request, $id){
        $request->validate([
            'nom'      =>'required',
            'val'      =>'required',
            'stok'     =>'required',
            'estado'   =>'required',
            'categoria'=>'required'
        ]);
        $response = Http::asForm()->post('localhost/CRUD-2/apiproducto',
            [
                'method'   =>'update',
                'nom'      =>$request->input('nom'),
                'val'      =>$request->input('val'),
                'stok'     =>$request->input('stok'),
                'estado'   =>$request->input('estado'),
                'categoria'=>$request->input('categoria'),
                'descript' =>$request->input('descript'),
                'id_prod'  =>$id,
            ]);

        $status = $response->json('status');
        if($status == 'ok'){
            return redirect()->route('productos.index')->with('msg',$response->json('msg'));
        }else{
            return  redirect()->route('productos.edit', $id)->with('msg',$response->json('msg'));
        }
    }

    public function destroy($id){
        $response = Http::asForm()->post('localhost/CRUD-2/apiproducto',
            [
                'method'=>'destroy',
                'id'    =>$id
            ]);
        return redirect()->route('productos.index')->with('msg',$response->json('msg'));
    }

}
