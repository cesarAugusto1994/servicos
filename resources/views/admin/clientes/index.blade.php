@extends('adminlte::page')

@section('title', 'Serviços - Clientes')

@section('css')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
@stop

@section('content_header')
    <h1>Clientes</h1>
@stop

@section('content')

      @include('flash::message')

      <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Clientes</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal-default">Adicionar</button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <table class="table table-hover table-striped no-margin">
                <thead>
                <tr>
                  <th>Nome</th>
                  <th>E-mail</th>
                  <th>Telefone</th>
                  <th>Celular</th>
                  <th>WhatsApp</th>
                  <th>Onde Joga?</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($clientes as $cliente)
                    <tr class="listaCliente"
                      data-url="{{ route('client_update', ['id' => $cliente->id ]) }}"
                      data-id="{{ $cliente->id }}"
                      data-nome="{{ $cliente->nome }}"
                      data-email="{{ $cliente->email }}"
                      data-telefone="{{ $cliente->telefone_fixo }}"
                      data-celular="{{ $cliente->celular }}"
                      data-whatsapp="{{ $cliente->whatsapp }}"
                      data-onde-joga="{{ $cliente->onde_joga }}"
                      style="cursor:pointer"
                      >
                      <td><a href="#">{{ $cliente->nome }}</a></td>
                      <td>{{ $cliente->email }}</td>
                      <td>{{ $cliente->telefone_fixo }}</td>
                      <td>{{ $cliente->celular }}</td>
                      <td>{{ $cliente->whatsapp }}</td>
                      <td>{{ $cliente->onde_joga }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.table-responsive -->
          </div>
          <!-- /.box-body -->

        </div>

        <div class="modal fade" id="modal-default" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Cadastrar Cliente</h4>
              </div>

                <form id="formClienteModal" class="form-horizontal" action="{{ route('client_store') }}" method="post">
                  {{ csrf_field() }}
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="nome" class="col-sm-2 control-label">Nome</label>
                      <div class="col-sm-10">
                        <input type="text" autofocus name="nome" class="form-control" id="nome" placeholder="Nome">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="email" class="col-sm-2 control-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="telefone" class="col-sm-2 control-label">Telefone</label>
                      <div class="col-sm-10">
                        <input type="text" name="telefone" class="form-control" data-mask="(99)9999-9999" id="telefone" placeholder="Telefone">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="celular" class="col-sm-2 control-label">Celular</label>
                      <div class="col-sm-10">
                        <input type="text" name="celular" class="form-control" id="celular" data-mask="(99)99999-9999" placeholder="Celular">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="whatsapp" class="col-sm-2 control-label">WhatsApp</label>
                      <div class="col-sm-10">
                        <input type="text" name="whatsapp" class="form-control" id="whatsapp" data-mask="(99)99999-9999" placeholder="WhatsApp">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="onde_joga" class="col-sm-2 control-label">Onde joga</label>
                      <div class="col-sm-10">
                        <input type="text" name="onde_joga" class="form-control" id="onde_joga" placeholder="Onde joga?">
                      </div>
                    </div>



                  </div>
                  <!-- /.box-body -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                  </div>
                  <!-- /.box-footer -->
                </form>

            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

        <input type="hidden" value="{{ route('client_store') }}" id="url-client-store"/>

@stop

@section('js')

    <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.4/holder.min.js"></script>
    <script>

        $(document).ready(function() {

            $('.listaCliente').click(function() {

                var self = $(this);

                $("#modal-default").modal('show');

                $("#id").val(self.data('id'));
                $("#nome").val(self.data('nome'));
                $("#email").val(self.data('email'));
                $("#telefone").val(self.data('telefone'));
                $("#celular").val(self.data('celular'));
                $("#whatsapp").val(self.data('whatsapp'));
                $("#onde_joga").val(self.data('onde-joga'));

                $("#formClienteModal").attr('action', self.data('url'));

            });

            $('#modal-default').on('hidden.bs.modal', function () {
                  $("#formClienteModal").attr('action', $("#url-client-store").val());
                  $("#nome").val("");
            });

        });

    </script>
@stop
