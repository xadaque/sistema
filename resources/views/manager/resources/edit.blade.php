@extends('layouts.principal')

@section('title','Editar Recurso Sistema')
@section('NomePagina','Editar Recurso Sistema')
@section('BreadcrumbNome','Editar Recurso Sistema')

@section('content')
    <link rel="stylesheet" href="../../../../materialize/css/meumaterialize.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">



    <!-- [ sample-page ] start -->
    <div class="col-sm-12">
        <div class="card">

            <div class="card-header">
                <div class="container">
                    <!-- Stack the columns on mobile by making one full-width and the other half-width -->
                    <div class="row">
                      <div class="col-md-1">
                        <form action="{{ route('resources.index') }}" method="get">
                            <input class="btn btn-primary" type="submit" value="Voltar">
                        </form>
                      </div>
                      <div class="col-6 col-md-11">
                        <div class="col-9">
                            <h3 class="card-title">Editar <strong>{{ $resource->name }}</strong> </h3>
                        </div>

                        <div class="card-header-right">
                            <div class="btn-group card-option">

                            <button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="feather icon-more-horizontal"></i>
                            </button>
                            <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                                <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                                <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                                {{-- <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li> --}}
                            </ul>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="card-body" style="overflow: auto;">
                <form action="{{route('resources.update', $resource->id)}}"  method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Nome do Recurso</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Ex.: Listar Tópicos" value="{{$resource->name}}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Recurso (recurso.subrecurso)</label>
                        <input type="text" class="form-control @error('resource') is-invalid @enderror" name="resource" placeholder="Ex.: threads.index" value="{{$resource->resource}}">
                        @error('resource')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label> Faz parte do menu?</label>
                        {{-- <div class="custom-control custom-radio">
                            <input type="radio" id="isMenu1" name="is_menu" class="custom-control-input" value="1" @if($resource->is_menu) checked @endif>
                            <label class="custom-control-label" for="isMenu1">Sim</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" id="isMenu2" name="is_menu" class="custom-control-input" value="0"  @if(!$resource->is_menu) checked @endif>
                            <label class="custom-control-label" for="isMenu2">Não</label>
                        </div> --}}

                        <p>
                            <label>
                              <input class="with-gap"id="isMenu1" name="is_menu" type="radio"  value="1" @if($resource->is_menu) checked @endif/>
                              <span>Sim</span>
                            </label>
                        </p>

                        <p>
                        <label>
                            <input class="with-gap" id="isMenu2" name="is_menu" type="radio"  value="0"  @if(!$resource->is_menu) checked @endif/>
                            <span>Não</span>
                        </label>
                        </p>

                    </div>

                    <div class="form-group">
                        <button class="btn btn-success">Atualizar Recurso</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- [ sample-page ] end -->

@endsection
