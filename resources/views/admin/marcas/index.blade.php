@extends('adminlte::page')

@section('title', 'Serviços - Marcas')

@section('content_header')
    <h1>Marcas</h1>
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

                </tr>
                </thead>
                <tbody>
                  @foreach($marcas as $marca)
                    <tr class="listaMarca"
                      data-url="{{ route('brand_update', ['id' => $marca->id ]) }}"
                      data-id="{{ $marca->id }}"
                      data-nome="{{ $marca->nome }}"
                      >
                      <td><a href="#">{{ $marca->nome }}</a></td>
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
                <h4 class="modal-title">Cadastrar Marca</h4>
              </div>

                <form id="formMarcaModal" class="form-horizontal" action="{{ route('brand_store') }}" method="post">
                  {{ csrf_field() }}
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="nome" class="col-sm-2 control-label">Nome</label>
                      <div class="col-sm-10">
                        <input type="text" autofocus name="nome" class="form-control" id="nome" placeholder="Nome">
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

        <input type="hidden" value="{{ route('brand_store') }}" id="url-marca-store"/>

@stop

@section('js')
    <script>

        $(document).ready(function() {

            $('.listaMarca').click(function() {

                var self = $(this);

                $("#modal-default").modal('show');

                $("#id").val(self.data('id'));
                $("#nome").val(self.data('nome'));

                $("#formMarcaModal").attr('action', self.data('url'));

            });

            $('#modal-default').on('hidden.bs.modal', function () {
                  $("#formMarcaModal").attr('action', $("#url-marca-store").val());
                  $("#nome").val("");
            });

        });

    </script>
@stop
