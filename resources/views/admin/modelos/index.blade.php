@extends('adminlte::page')

@section('title', 'Serviços - Modelos')

@section('content_header')
    <h1>Modelos</h1>
@stop

@section('content')

      @include('flash::message')

      <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Listagem</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal-default">Adicionar</button>

            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <table class="table no-margin">
                <thead>
                <tr>
                  <th>Nome</th>
                  <th>Marca</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($modelos as $modelo)
                    <tr class="listaModelos"
                      data-url-remove="{{ route('model_remove', ['id' => $modelo->id ]) }}"
                      data-url="{{ route('model_update', ['id' => $modelo->id ]) }}"
                      data-id="{{ $modelo->id }}"
                      data-nome="{{ $modelo->nome }}"
                      data-marca="{{ $modelo->marca_id }}"
                      style="cursor:pointer"
                      >
                      <td><a href="#">{{ $modelo->nome }}</a></td>
                      <td>{{ $modelo->marca->nome }}</td>
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
                <h4 class="modal-title">Cadastrar Modelo</h4>
              </div>

                <form id="formModeloModal" class="form-horizontal" action="{{ route('model_store') }}" method="post">
                  {{ csrf_field() }}
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="nome" class="col-sm-2 control-label">Nome</label>
                      <div class="col-sm-10">
                        <input type="text" autofocus name="nome" class="form-control" id="nome" placeholder="Nome">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="marca" class="col-sm-2 control-label">Marca</label>
                      <div class="col-sm-10">
                        <select name="marca" id="marca" class="form-control" required>
                            @foreach($marcas as $marca)
                                <option value="{{ $marca->id }}">{{ $marca->nome }}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <!-- /.box-body -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
                    <a class="btn btn-danger btnRemoverModelo" data-toggle="modal" data-target="#removerModeloModal">Remover</a>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                  </div>
                  <!-- /.box-footer -->
                </form>

            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

        <div class="modal modal-danger fade" id="removerModeloModal" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Remover Modelo</h4>
              </div>

                <form id="formRemoverModeloModal" class="form-horizontal" method="post">
                  {{ csrf_field() }}
                  <input type="hidden" id="removerModelo"/>
                  <div class="modal-body text-center">
                      <h1>Deseja remover este Modelo?</h1>
                  </div>
                  <!-- /.box-body -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Sim</button>
                  </div>
                  <!-- /.box-footer -->
                </form>

            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

        <input type="hidden" value="{{ route('model_store') }}" id="url-modelo-store"/>

@stop

@section('js')
    <script>

        $(document).ready(function() {

            $('.listaModelos').click(function() {

                var self = $(this);

                $("#modal-default").modal('show');

                $("#id").val(self.data('id'));
                $("#nome").val(self.data('nome'));
                $("#marca").val(self.data('marca'));

                $("#removerModelo").val(self.data('url-remove'));

                $("#formModeloModal").attr('action', self.data('url'));

            });

            $('#modal-default').on('hidden.bs.modal', function () {
                  $("#formModeloModal").attr('action', $("#url-modelo-store").val());
                  $("#nome").val("");
            });

            $(".btnRemoverModelo").click(function() {

                $("#formRemoverModeloModal").attr('action', $("#removerModelo").val());

            });

        });

    </script>
@stop
