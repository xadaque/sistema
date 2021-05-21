@extends('layouts.principal')
@section('title','Papéis de Usuário')
@section('NomePagina','Papéis de Usuário')
@section('BreadcrumbNome','Papéis de Usuário')
@section('content')
    
    
        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
            <div class="card">
    
                <div class="card-header">
    
                    <div class="container">
                        <!-- Stack the columns on mobile by making one full-width and the other half-width -->
                        <div class="row">
                          <div class="col-md-10">
                            
                          </div>
                          <div class="col-6 col-md-2">
                            <form action="{{route('roles.create')}}">
                                <input class="btn btn-primary" type="submit" value="Cadastrar">
                            </form>
    
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
                </div>
                 <div class="card-body">
                    <table class="table table-light table-striped  table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Criado Em</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($roles as $role)
                                <tr>
                                    <td>{{$role->id}}</td>
                                    <td>{{$role->name}}: <span class="badge badge-danger">{{$role->role}}</span></td>
                                    <td>{{$role->created_at->format('d/m/Y H:i:s')}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{route('roles.edit', $role->id)}}" class="btn btn-sm btn-primary">EDITAR</a>
                                            {{-- <form action="{{route('roles.destroy', $role->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger">REMOVER</button>
                                            </form> --}}
                                            <a href="{{route('roles.resources', $role->id)}}" class="btn btn-sm btn-dark">Adicionar Recursos</a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">Nenhum papel cadastrado!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    <div class="pagination justify-content-center">
    
                        @if (isset($filters))
                            {{ $roles->appends($filters)->links() }}
                        @else
                            {{$roles->links()}}
                        @endif
    
                    </div>
                </div>
            </div>
        </div>
        <!-- [ sample-page ] end -->
    
    
    
        
@endsection
