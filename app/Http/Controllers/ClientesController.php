<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClientesController extends Controller
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
        $clientes  = Cliente::all();
        return view('admin.clientes.index')->with('clientes', $clientes);
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

        $cliente = new Cliente();
        $cliente->nome = $data['nome'];
        $cliente->email = $data['email'];
        $cliente->telefone_fixo = $data['telefone'];
        $cliente->celular = $data['celular'];
        $cliente->whatsapp = $data['whatsapp'];
        $cliente->onde_joga = $data['onde_joga'];
        $cliente->save();

        flash('Cliente cadastrado com sucesso.')->success()->important();

        return redirect()->route('clients');
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

        $cliente = Cliente::find($id);
        $cliente->nome = $data['nome'];
        $cliente->email = $data['email'];
        $cliente->telefone_fixo = $data['telefone'];
        $cliente->celular = $data['celular'];
        $cliente->whatsapp = $data['whatsapp'];
        $cliente->onde_joga = $data['onde_joga'];
        $cliente->save();

        flash('Cliente editado com sucesso.')->success()->important();

        return redirect()->route('clients');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::find($id);

        $cliente->delete();

        flash('Cliente removido com sucesso.')->success()->important();

        return redirect()->route('clients');
    }
}
