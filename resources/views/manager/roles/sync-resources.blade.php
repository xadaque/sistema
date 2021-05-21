@extends('layouts.principal')
@section('title','Sincronizar Papél: ')
@section('NomePagina','Sincronizar Papél:')
@section('BreadcrumbNome','Sincronizar Papél:')

@section('content')
    <div class="row">
        <div class="col-md-12 mt-4 d-flex justify-content-between align-items-center">
           
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <hr>
            
        </div>
    </div>

    <!-- [ sample-page ] start -->
<div class="col-sm-12">
    <div class="card">

        <div class="card-header">

            <h2>Sincronizar Papél: <strong>{{$role->name}}</strong> e Recursos</h2>
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
        <div class="card-body" style="overflow: auto;">
            <form action="{{route('roles.resources.update', $role->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    @foreach($resources as $resource)
                        <div class="col-md-4 pt-4 pb-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox"
                                       name="resources[]"
                                       class="custom-control-input"
                                       id="customCheck{{$resource->id}}"
                                       value="{{$resource->id}}"
                                       @if($role->resources->contains($resource)) checked @endif
                                >
                                <label class="custom-control-label" for="customCheck{{$resource->id}}">{{$resource->resource}}</label>
                            </div>
                        </div>
                    @endforeach

                    <div class="form-group col-md-12">
                        <div class="">
                            <hr>
                            <button class="btn btn-success" type="submit">Adicionar Recursos ao Papél</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- [ sample-page ] end -->

@endsection
