@extends('layouts.principal')
@section('title','Usuários')
@section('NomePagina','Usuários')
@section('BreadcrumbNome','Usuários')
@section('content')
    <!-- [ sample-page ] start -->
    <div class="col-sm-12">
        <div class="card">

            <div class="card-header">

                <div class="container">
                    <!-- Stack the columns on mobile by making one full-width and the other half-width -->
                    <div class="row">
                      <div class="col-md-10">
                        {{-- <form action="{{ route('laboratorio.search') }}" method="POST">
                            @csrf
                            <input type="text" name="search" placeholder="Filtrar" >
                            <button type="submit" class="btn btn-warning btn-sm">Filtrar</button>
                        </form> --}}
                      </div>
                      <div class="col-6 col-md-2">
                        {{-- <form action="{{ route('laboratorio.create') }}">
                            <input class="btn btn-primary" type="submit" value="Cadastrar">
                        </form> --}}

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
                 {{-- <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                            <li class="nav-item">
                                <a role="tab" class="nav-link" id="tab-0"  href="{{ route('laboratorio.create') }}">
                                    <span>Cadastrar</span>
                                </a>
                            </li>
                        </ul> --}}
                </div>
            </div>
             <div class="card-body">
                <table class="table table-light table-striped  table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Nick</th>
                            <th>Papél</th>
                            <th>Criado Em</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->nick}}</td>
                            <td>
                                {{$user->role()->count() ? $user->role->name : 'Sem papél associado!'}}
                            </td>
                            <td>{{$user->created_at}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('users.edit', $user->id)}}" class="btn btn-sm btn-primary">EDITAR</a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">Nenhum usuário cadastrado!</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <div class="pagination justify-content-center">

                    @if (isset($filters))
                        {{ $users->appends($filters)->links() }}
                    @else
                    {{$users->links()}}
                    @endif

                </div>
            </div>
        </div>
    </div>
    <!-- [ sample-page ] end -->
@endsection
