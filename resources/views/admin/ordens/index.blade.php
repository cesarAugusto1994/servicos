@extends('adminlte::page')

@section('title', 'Serviços - Ordens')

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
                  <th>Produto</th>
                  <th>Data Encordoamento</th>
                  <th>Tensão</th>
                  <th>Main Cross</th>
                  <th>Foto</th>
                  <th>Observação</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($orders as $order)
                    <tr class="listaOrdens"
                      data-url="{{ route('order_update', ['id' => $order->id ]) }}"
                      data-id="{{ $order->id }}"
                      data-cliente="{{ $order->cliente->id }}"
                      data-produto="{{ $order->produto->id }}"
                      data-data_encordoamento="{{ $order->data_encordoamento }}"
                      data-tensao="{{ $order->tensao }}"
                      data-main_cross="{{ $order->main_cross }}"
                      data-foto="{{ $order->foto }}"
                      data-observacao="{{ $order->observacao }}"
                      style="cursor:pointer"
                      >
                      <td>{{ $order->id }}</td>
                      <td>{{ $order->cliente->nome }}</td>
                      <td>{{ $order->produto->nome }}</td>
                      <td>{{ $order->data_encordoamento->format('d/m/Y') }}</td>
                      <td>{{ $order->tensao }}</td>
                      <td>{{ $order->main_cross }}</td>
                      <td>

                        <div class="fileinput fileinput-new" data-provides="fileinput">
                          <div class="fileinput-new thumbnail" style="width: 32px; height: 32px;">
                            <img data-src="holder.js/300x200" src="{{ $order->foto }}" alt="...">
                          </div>

                      </td>
                      <td>{{ $order->observacao }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.table-responsive -->
          </div>
          <!-- /.box-body -->

        </div>


@stop

@section('js')
    <script>

        $(document).ready(function() {

            $('.listaProdutos').click(function() {

                var self = $(this);

                $("#modal-default").modal('show');

                $("#id").val(self.data('id'));
                $("#nome").val(self.data('nome'));
                $("#cliente").val(self.data('cliente'));

                $("#marca").val(self.data('marca'));
                $("#modelo").val(self.data('modelo'));
                $("#cordas").val(self.data('cordas'));
                $("#nos").val(self.data('nos'));
                $("#cross_poly").val(self.data('cross-poly'));
                $("#cross_nylon").val(self.data('cross-nylon'));

                $("#formProdutoModal").attr('action', self.data('url'));

            });

            $('#modal-default').on('hidden.bs.modal', function () {
                  $("#formProdutoModal").attr('action', $("#url-produto-store").val());
            });

        });

    </script>
@stop
