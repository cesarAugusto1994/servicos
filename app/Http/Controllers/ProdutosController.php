<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Marca;
use App\Modelo;
use App\Cordas;

class ProdutosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos  = Produto::all();
        $marcas = Marca::all();
        $modelos = Modelo::all();
        $cordas = Cordas::all();

        return view('admin.produtos.index')
        ->with('produtos', $produtos)
        ->with('marcas', $marcas)
        ->with('modelos', $modelos)
        ->with('cordas', $cordas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->request->all();

        $cliente = new Produto();
        $cliente->nome = $data['nome'];
        $cliente->marca_id = $data['marca'];
        $cliente->modelo_id = $data['modelo'];
        $cliente->corda_id = $data['cordas'];
        $cliente->nos = $data['nos'];
        $cliente->cross_poly = $data['cross_poly'];
        $cliente->cross_nylon = $data['cross_nylon'];
        $cliente->save();

        flash('Produto cadastrado com sucesso.')->success()->important();

        return redirect()->route('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $data = $request->request->all();

        $cliente = Produto::find($id);
        $cliente->nome = $data['nome'];
        $cliente->marca_id = $data['marca'];
        $cliente->modelo_id = $data['modelo'];
        $cliente->corda_id = $data['cordas'];
        $cliente->nos = $data['nos'];
        $cliente->cross_poly = $data['cross_poly'];
        $cliente->cross_nylon = $data['cross_nylon'];
        $cliente->save();

        flash('Produto editado com sucesso.')->success()->important();

        return redirect()->route('products');
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
