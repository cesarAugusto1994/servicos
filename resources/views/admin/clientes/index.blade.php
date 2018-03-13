@extends('adminlte::page')

@section('title', 'Serviços - Clientes')

@section('content_header')
    <h1>Clientes</h1>
@stop

@section('content')

      <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Clientes</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal-default">Adicionar</button>
              <div class="modal fade" id="modal-default" style="display: none;">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                      <h4 class="modal-title">Cadastrar Cliente</h4>
                    </div>

                      <form class="form-horizontal" action="{{ route('client_store') }}" method="post">
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
                              <input type="text" name="telefone" class="form-control" id="telefone" placeholder="Telefone">
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="celular" class="col-sm-2 control-label">Celular</label>
                            <div class="col-sm-10">
                              <input type="text" name="celular" class="form-control" id="celular" placeholder="Celular">
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="whatsapp" class="col-sm-2 control-label">WhatsApp</label>
                            <div class="col-sm-10">
                              <input type="text" name="whatsapp" class="form-control" id="whatsapp" placeholder="WhatsApp">
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
                  @foreach($clientes as $cliente)
                <tr>
                  <td><a href="#">{{ $cliente->nome }}</a></td>
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
