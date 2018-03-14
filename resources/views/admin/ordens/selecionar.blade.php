@extends('adminlte::page')

@section('title', 'Serviços - Ordens')

@section('content_header')
    <h1>Criar Ordem</h1>
@stop

@section('content')

      @include('flash::message')

      <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Selecionar Cliente</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">

              <form id="formOrderSelectClient" class="form-horizontal" action="{{ route('order_create') }}" method="get">
                <div class="form-group">
                  <label for="cliente" class="col-sm-2 control-label">Cliente</label>
                  <div class="col-sm-10">
                    <select name="cliente" id="cliente" class="form-control" required>
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <button type="submit" class="btn btn-success">Avançar</button>
              </form>

          </div>

        </div>



@stop
