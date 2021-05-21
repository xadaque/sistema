@extends('layouts.principal')

@section('title','Adicionar Recursos')
@section('NomePagina','Adicionar Recursos')
@section('BreadcrumbNome','Adicionar Recursos')

@section('content')


    <div class="row mt-4">
        <div class="col-md-12">
            <hr>

        </div>
    </div>



<!-- [ sample-page ] start -->
<div class="col-sm-12">
    <div class="card">

        <div class="card-header">
            <div class="container">
                <!-- Stack the columns on mobile by making one full-width and the other half-width -->
                <div class="row">
                  <div class="col-md-1">
                    <form action="{{ route('modules.index') }}" method="get">
                        <input class="btn btn-primary" type="submit" value="Voltar">
                    </form>
                  </div>
                  <div class="col-6 col-md-11">
                    <div class="col-9">
                        <div class="row">
                            <div class="col-md-12 mt-4 d-flex justify-content-between align-items-center">
                                <h2>Adicionar Recursos para o módulo: <strong>{{$module->name}}</strong></h2>
                            </div>
                        </div>
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
            <form action="{{route('modules.resources.update', $module->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    @forelse($resources as $resource)
                        <div class="col-md-4 pt-4 pb-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox"
                                       name="resources[]"
                                       class="custom-control-input"
                                       id="customCheck{{$resource->id}}"
                                       value="{{$resource->id}}"
                                       @if($module->resources->contains($resource)) checked @endif
                                >
                                <label class="custom-control-label" for="customCheck{{$resource->id}}">{{$resource->resource}}</label>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-danger">Nenhum recurso disponível</div>
                        </div>
                    @endforelse

                    <div class="form-group col-md-12">
                        <div class="">
                            <hr>
                            <button class="btn btn-success" type="submit">Adicionar Recursos ao Módulo</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- [ sample-page ] end -->


@endsection
