@extends('adminlte::page')

@section('title', 'Serviços - Ordens')

@section('css')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
@stop

@section('content_header')
    <h1>Ordens</h1>
@stop

@section('content')

      @include('flash::message')

      <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Listagem</h3>

            <div class="box-tools pull-right">
              <a  class="btn btn-success btn-xs" href="{{ route('order_select_client') }}">Adicionar</a>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <table class="table table-hover table-striped no-margin">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Cliente</th>
                  <th>Raquete</th>
                  <th>Marca</th>
                  <th>Modelo</th>
                  <th>Data Encordoamento</th>
                  <th>Tensão</th>
                  <th>Main Cross</th>
                  <th>Foto</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($orders as $order)
                    <tr class="listaOrdens"
                      data-url-ordem="{{ route('order', $order->id) }}"
                      data-url="{{ route('order_update', ['id' => $order->id ]) }}"
                      data-id="{{ $order->id }}"
                      data-cliente="{{ $order->cliente->id }}"
                      data-produto="{{ $order->nome }}"
                      data-data_encordoamento="{{ $order->data_encordoamento }}"
                      data-tensao="{{ $order->tensao }}"
                      data-main_cross="{{ $order->main_cross }}"
                      data-foto="{{ $order->foto }}"
                      data-observacao="{{ $order->observacao }}"
                      style="cursor:pointer"
                      >
                      <td>{{ $order->id }}</td>
                      <td>{{ $order->cliente->nome }}</td>
                      <td>{{ $order->nome }}</td>
                      <td>{{ $order->marca ? $order->marca->nome : '-' }}</td>
                      <td>{{ $order->modelo ? $order->modelo->nome : '-' }}</td>
                      <td>{{ $order->data_encordoamento->format('d/m/Y') }}</td>
                      <td>{{ $order->tensao }}</td>
                      <td>{{ $order->main_cross }}</td>
                      <td>

                        <div class="fileinput fileinput-new" data-provides="fileinput">
                          <div class="fileinput-new thumbnail" style="width: 32px; height: 32px;">
                            <img data-src="holder.js/300x200" src="{{ $order->foto }}" alt="...">
                          </div>

                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>

@stop

@section('js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.4/holder.min.js"></script>
    <script>

        $(".listaOrdens").click(function() {

          var self = $(this);
            window.location.href = self.data('url-ordem');
        });

    </script>
@stop
