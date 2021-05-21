@extends('layouts.principal')

@section('title','Cadastro')
@section('NomePagina','Módulo')
@section('BreadcrumbNome','Módulo - Cadastro')


@section('content')


    <link rel="stylesheet" href="../../../../materialize/css/meumaterialize.css">


    <!-- [ sample-page ] start -->
    <div class="col-sm-12">
        <div class="card">

            <div class="card-header">

                <h5>Módulo - Cadastro</h5>
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
                <form action="{{route('modules.store')}}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label>Nome do Módulo</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Ex.: Configurações" value="{{old('name')}}">

                        @error('name')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button class="btn btn-success">Criar Módulo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- [ sample-page ] end -->





@endsection
