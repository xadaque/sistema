@extends('layouts.principal')
@section('title','Criar Papél de Usuário')
@section('NomePagina','Criar Papél de Usuário')
@section('BreadcrumbNome','Criar Papél de Usuário')

@section('content')
 
<!-- [ sample-page ] start -->
<div class="col-sm-12">
    <div class="card">

        <div class="card-header">

            <h5>Cadastro Laboratório</h5>
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
        <div class="card-body">
            <form action="{{route('roles.store')}}"  method="post">
                @csrf
                <div class="form-group">
                    <label>Nome do Papél</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Ex.: Administrador"
                     value="{{old('name')}}">
 
                    @error('name')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
 
                <div class="form-group">
                    <label>Papél (ROLE_*)</label>
                    <input type="text" class="form-control @error('role') is-invalid @enderror" name="role" placeholder="Ex.: ROLE_ADMIN"
                           value="{{old('role')}}">
 
                    @error('role')
                         <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
 
                <div class="form-group">
                    <button class="btn btn-success">Cadastrar Papél</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- [ sample-page ] end -->

@endsection
