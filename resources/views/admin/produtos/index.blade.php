@extends('adminlte::page')

@section('title', 'Serviços - Produtos')

@section('content_header')
    <h1>Produtos</h1>
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
                  @foreach($produtos as $produto)
                    <tr class="listaProdutos"
                      data-url="{{ route('product_update', ['id' => $produto->id ]) }}"
                      data-id="{{ $produto->id }}"
                      data-nome="{{ $produto->nome }}"
                      data-marca="{{ $produto->marca_id }}"
                      data-modelo="{{ $produto->modelo_id }}"
                      data-cordas="{{ $produto->corda_id }}"
                      data-nos="{{ $produto->nos }}"
                      data-cross-poly="{{ $produto->cross_poly }}"
                      data-cross-nylon="{{ $produto->cross_nylon }}"
                      >
                      <td><a href="#">{{ $produto->nome }}</a></td>
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
                <h4 class="modal-title">Cadastrar Produto</h4>
              </div>

                <form id="formProdutoModal" class="form-horizontal" action="{{ route('product_store') }}" method="post">
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
                    <div class="form-group">
                      <label for="modelo" class="col-sm-2 control-label">Modelo</label>
                      <div class="col-sm-10">
                        <select name="modelo" id="modelo" class="form-control" required>
                            @foreach($modelos as $modelo)
                                <option value="{{ $modelo->id }}">{{ $modelo->nome }}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="cordas" class="col-sm-2 control-label">Cordas</label>
                      <div class="col-sm-10">
                        <select name="cordas" id="cordas" class="form-control" required>
                            @foreach($cordas as $corda)
                                <option value="{{ $corda->id }}">{{ $corda->nome }}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="nos" class="col-sm-2 control-label">Nós</label>
                      <div class="col-sm-10">
                        <select name="nos" id="nos" class="form-control" required>
                            <option value="2">2</option>
                            <option value="4">4</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="cross_poly" class="col-sm-2 control-label">Cross Poly</label>
                      <div class="col-sm-10">
                        <select name="cross_poly" id="cross_poly" class="form-control" required>
                            <option value="2">6 mm</option>
                            <option value="4">5,5 mm</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="cross_nylon" class="col-sm-2 control-label">Cross Nylon</label>
                      <div class="col-sm-10">
                        <select name="cross_nylon" id="cross_nylon" class="form-control" required>
                            <option value="2">5,5 mm</option>
                            <option value="4">5 mm</option>
                        </select>

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

        <input type="hidden" value="{{ route('product_store') }}" id="url-produto-store"/>

@stop

@section('js')
    <script>

        $(document).ready(function() {

            $('.listaProdutos').click(function() {

                var self = $(this);

                $("#modal-default").modal('show');

                $("#id").val(self.data('id'));
                $("#nome").val(self.data('nome'));

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
