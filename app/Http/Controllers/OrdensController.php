<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ordem;
use App\Cliente;
use App\Produto;
use Request as Req;

class OrdensController extends Controller
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
        $ordens  = Ordem::all();

        return view('admin.ordens.index')
        ->with('orders', $ordens);
    }

    public function selectClient()
    {
        $clientes = Cliente::all();

        return view('admin.ordens.selecionar')
        ->with('clientes', $clientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cliente = Req::get('cliente');
        $cliente = Cliente::find($cliente);
        $produtos = Produto::where('cliente_id', $cliente->id)->get();

        return view('admin.ordens.create')
        ->with('cliente', $cliente)
        ->with('produtos', $produtos);

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

        $ordem = new Ordem();
        $ordem->cliente_id = $data['cliente'];
        $ordem->produto_id = $data['produto'];

        $dataEnc = \DateTime::createFromFormat('d/m/Y', $data['data_encordoamento']);
        $ordem->data_encordoamento = $dataEnc->format('Y-m-d');

        $ordem->tensao = $data['tensao'];
        $ordem->corda = $data['corda'];
        $ordem->main_cross = $data['main_cross'];
        $ordem->observacao = $data['observacao'];

        $destino = "images/" . $_FILES['foto']['name'];
        $arquivo_tmp = $_FILES['foto']['tmp_name'];

        move_uploaded_file( $arquivo_tmp, $destino  );

        if(isset($_FILES['foto'])) {
            $ordem->foto = $destino;
        }

        $ordem->save();

        return redirect()->route('orders');
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
