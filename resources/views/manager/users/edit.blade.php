@extends('layouts.principal')
@section('title','Editar')
@section('NomePagina','Usuário')
@section('BreadcrumbNome','Usuário - Editar')

@section('content')
<!-- [ sample-page ] start -->
    <div class="col-sm-12">
        <div class="card">

            <div class="card-header">
                <div class="container">
                    <!-- Stack the columns on mobile by making one full-width and the other half-width -->
                    <div class="row">
                      <div class="col-md-1">
                        {{-- <form action="{{ route('users.index') }}" method="POST">
                            <input class="btn btn-primary" type="submit" value="Voltar">
                        </form> --}}
                      </div>
                      <div class="col-6 col-md-11">
                        <div class="col-9">
                            <h3 class="card-title">Editar <strong>{{ $user->name }}</strong> </h3>
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
            <div class="card-body">
                <form action="{{route('users.update', $user->id)}}"  method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Nome Completo</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nome" value="{{$user->name}}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Nick</label>
                        <input type="text" class="form-control @error('nick') is-invalid @enderror" name="nick" placeholder="Nick" value="{{$user->nick}}">
                        @error('nick')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}">
                        @error('email')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Senha</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                        @error('password')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Confirmar Senha</label>
                        <input type="password" class="form-control" name="password_confirmation">
                    </div>

                    <div class="form-group">
                        <label>Papéis</label>
                        <select name="role" class="form-control">
                            <option value="">Selecionar o Papél do Usuário</option>

                            @foreach($roles as $role)
                                <option value="{{$role->id}}"
                                        @if($user->role()->count() && $user->role->id == $role->id) selected @endif
                                >{{$role->name}}</option>
                            @endforeach

                        </select>
                    </div>


                    <div class="form-group">
                        <button class="btn btn-success">Atualizar Usuário</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- [ sample-page ] end -->
@endsection
