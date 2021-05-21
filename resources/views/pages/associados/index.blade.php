@extends('layouts.principal')
@section('title','Associados')
@section('NomePagina','Associados')
@section('BreadcrumbNome','Associados')

@section('titlepage','Associados')

@section('content')

<!-- [ sample-page ] start -->
<div class="col-sm-12">
    <div class="card">

        <div class="card-header">

            <div class="container">
                <!-- Stack the columns on mobile by making one full-width and the other half-width -->
                <div class="row">
                  <div class="col-md-10">
                    <form action="{{ route('associados.search') }}" method="POST">
                        @csrf
                        <input type="text" name="search" placeholder="Filtrar" >
                        <button type="submit" class="btn btn-warning btn-sm">Filtrar</button>
                    </form>
                  </div>
                  <div class="col-6 col-md-2">
                    <div class="card-header-right">
                        <div class="btn-group card-option">

                        <button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="feather icon-more-horizontal"></i>
                        </button>
                        <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                            <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                            <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                            <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
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
                            <th class="text-center">#</th>
                            <th>Associado</th>
                            <th class="text-center">Subgrupo</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Cobranca</th>
                            <th class="text-center">Detalhes</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        @foreach ($associados as $associado)
                        <td class="text-center text-muted"># {{ $associado->Inscricao}}</td>
                        <td>
                            <div class="widget-content p-0">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left flex2">
                                        <div class="widget-heading text-uppercase"> {{ $associado->Nome }}</div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">{{ $associado->Descricao}}</td>
                        <td class="text-center">
                            @switch($associado->Status)
                                @case($associado->Status ='CANCELADO' )
                                <span class="badge rounded-pill bg-danger">CANCELADO</span>
                                    @break

                                @case($associado->Status ='SUSPENSO')
                                <span class="badge rounded-pill bg-warning text-dark">SUSPENSO</span>
                                    @break

                                @case($associado->Status ='EM CARENCIA')
                                <span class="badge rounded-pill bg-success">EM CARÊNCIA</span>
                                    @break
                                @case($associado->Status ='ATIVO')
                                <span class="badge rounded-pill bg-primary">ATIVO</span>
                                    @break
                                @default
                                <span class="badge rounded-pill bg-info text-dark">SEM STATUS</span>
                            @endswitch

                        </td>
                        <td class="text-center">{{ $associado->Cobranca}} </td>
                        <td class="text-center">
                            <button onclick="window.location.href = '{{ route('associados.show',$associado->Inscricao) }}'" type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm">Detalhes</button>
                            <!--<button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i class="pe-7s-trash btn-icon-wrapper"> </i></button>-->
                        </td>
                        {{-- <td class="text-center">
                            <button onclick="window.location.href = '#'" type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm">Detalhes</button>
                            <!--<button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i class="pe-7s-trash btn-icon-wrapper"> </i></button>-->
                        </td> --}}
                    </tr>


                    @endforeach
                    </tbody>
                </table>
            <div class="pagination justify-content-center">

                @if (isset($filters))
                    {{ $associados->appends($filters)->links() }}
                @else
                    {{ $associados->links() }}
                @endif

            </div>
        </div>
    </div>
</div>
<!-- [ sample-page ] end -->
@endsection

