@extends('adminlte::page')

@section('title', 'Serviços - Ordens')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
@stop

@section('content_header')
    <h1>Ordem</h1>
@stop

@section('content')

      @include('flash::message')

      <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Criar Ordem</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">

              <form id="formOrderSelectClient" enctype="multipart/form-data" class="form-horizontal" action="{{ route('order_store') }}" method="post">
                {{csrf_field()}}

                <div class="row">

                    <div class="col-lg-6">
                        <div class="form-group">
                          <label for="cliente" class="col-sm-2 control-label">Cliente</label>
                          <div class="col-sm-10">
                            <input type="hidden" name="cliente" value="{{ $ordem->cliente->id }}">
                            <input type="text" class="form-control" disabled value="{{ $ordem->cliente->nome }}">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="nome" class="col-sm-2 control-label">Produto</label>
                          <div class="col-sm-10">
                            <input type="text" autofocus name="nome" value="{{ $ordem->nome }}" class="form-control" id="nome" placeholder="Nome">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="marca" class="col-sm-2 control-label">Marca</label>
                          <div class="col-sm-10">
                            <select name="marca" id="marca" class="form-control" required>
                                @foreach($marcas as $marca)
                                    <option value="{{ $marca->id }}" {{ $ordem->marca->id == $marca->id ? 'selected' : '' }} >{{ $marca->nome }}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="modelo" class="col-sm-2 control-label">Modelo</label>
                          <div class="col-sm-10">
                            <select name="modelo" id="modelo" class="form-control" required>
                                @foreach($modelos as $modelo)
                                    <option value="{{ $modelo->id }}"  {{ $ordem->modelo->id == $modelo->id ? 'selected' : '' }}>{{ $modelo->nome }}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="cordas" class="col-sm-2 control-label">Cordas</label>
                          <div class="col-sm-10">
                            <select name="cordas" id="cordas" class="form-control" required>
                                @foreach($cordas as $corda)
                                    <option value="{{ $corda->id }}" {{ $ordem->cordas->id == $corda->id ? 'selected' : '' }}>{{ $corda->nome }}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="nos" class="col-sm-2 control-label">Nós</label>
                          <div class="col-sm-10">
                            <select name="nos" id="nos" class="form-control" required>
                                <option value="2" {{ $ordem->nos == "2" ? 'selected' : '' }}>2</option>
                                <option value="4" {{ $ordem->nos == "4" ? 'selected' : '' }}>4</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="cross_poly" class="col-sm-2 control-label">Cross Poly</label>
                          <div class="col-sm-10">
                            <select name="cross_poly" id="cross_poly" class="form-control" required>
                                <option value="6" {{ $ordem->cross_poly == "6" ? 'selected' : '' }}>6 mm</option>
                                <option value="5.5" {{ $ordem->cross_poly == "5.5" ? 'selected' : '' }}>5,5 mm</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="cross_nylon" class="col-sm-2 control-label">Cross Nylon</label>
                          <div class="col-sm-10">
                            <select name="cross_nylon" id="cross_nylon" class="form-control" required>
                                <option value="5.5" {{ $ordem->cross_nylon == "5.5" ? 'selected' : '' }}>5,5 mm</option>
                                <option value="5" {{ $ordem->cross_nylon == "5" ? 'selected' : '' }}>5 mm</option>
                            </select>

                          </div>
                        </div>
                        <div class="form-group">
                            <label for="observacao" class="col-sm-2 control-label">Observação</label>
                            <div class="col-sm-10">
                                <textarea name="observacao" id="observacao" class="form-control">{{ $ordem->observacao }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                          <label for="data_encordoamento" class="col-sm-2 control-label">Data Encordoamento</label>
                          <div class="col-sm-10">
                              <input type="text" id="data_encordoamento" required value="{{ $ordem->data_encordoamento->format('d/m/Y') }}" name="data_encordoamento" class="form-control"/>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="tensao" class="col-sm-2 control-label">Tensão</label>
                          <div class="col-sm-10">
                              <input type="text" name="tensao" id="tensao" class="form-control" value="{{ $ordem->tensao }}"/>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="corda" class="col-sm-2 control-label">Corda</label>
                          <div class="col-sm-10">
                              <input type="text" name="corda" id="corda" class="form-control" value="{{ $ordem->corda }}"/>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="main_cross" class="col-sm-2 control-label">Main Cross</label>
                          <div class="col-sm-10">
                            <select name="main_cross" id="main_cross" class="form-control" required>
                                <option value="5.2" {{ $ordem->main_cross == "5.2" ? 'selected' : '' }}>5,2 mm</option>
                                <option value="4.9" {{ $ordem->main_cross == "4.9" ? 'selected' : '' }}>4,9 mm</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="corda" class="col-sm-2 control-label">Foto </label>
                          <div class="col-sm-10">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                              <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                <img src="{{ $ordem->foto }}" data-src="holder.js/300x200" alt="...">
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>

                </div>

                <a class="btn btn-success" href="{{ route('orders') }}">Voltar</a>
              </form>

          </div>

        </div>

@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/locales/bootstrap-datepicker.pt-BR.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.4/holder.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#data_encordoamento').datepicker({
              format: "dd/mm/yyyy",
              clearBtn: true,
              todayHighlight: true,
              autoclose: true,
              language: "pt-BR"
            });
        });
    </script>

@stop
