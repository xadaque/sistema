@extends('layouts.principal')

@section('title','Cadastro')
@section('NomePagina','Criar Recurso Sistema')
@section('BreadcrumbNome','Criar Recurso Sistema')


@section('content')


<link rel="stylesheet" href="../../../../materialize/css/meumaterialize.css">


<!-- [ sample-page ] start -->
<div class="col-sm-12">
    <div class="card">

        <div class="card-header">

            <h5>Criar Recurso Sistema</h5>
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
            <form action="{{route('resources.store')}}"  method="post">
                @csrf
                <div class="form-group">
                    <label>Nome do Recurso</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Ex.: Listar Tópicos">

                    @error('name')
                     <div class="invalid-feedback">
                         {{$message}}
                     </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Recurso (recurso.subrecurso)</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="resource" placeholder="Ex.: threads.index">
                    @error('resource')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label> Faz parte do menu?</label>
                    {{-- <div class="custom-control custom-radio">
                        <input type="radio" id="isMenu1" name="is_menu" class="with-gap  @error('is_menu') is-invalid @enderror" value="1">
                        <label class="custom-control-label" for="isMenu1">Sim</label>
                    </div> --}}

                    <p>
                        <label>
                          <input class="with-gap"id="isMenu1" name="is_menu" type="radio"  value="1"/>
                          <span>Sim</span>
                        </label>
                    </p>

                    <p>
                    <label>
                        <input class="with-gap" id="isMenu2" name="is_menu" type="radio"  value="0"/>
                        <span>Não</span>
                    </label>
                    </p>

                    {{-- <div class="custom-control custom-radio">
                        <input type="radio" id="isMenu2" name="is_menu" class="with-gap  @error('is_menu') is-invalid @enderror" value="0">
                        <label class="custom-control-label" for="isMenu2">Não</label>
                    </div> --}}

                </div>

                <div class="form-group">
                    <button class="btn btn-success">Cadastrar Recurso</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- [ sample-page ] end -->





@endsection
