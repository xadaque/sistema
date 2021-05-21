@extends('layouts.principal')
@section('title','Laboratório')
@section('NomePagina','Laboratório')
@section('BreadcrumbNome','Laboratorio')

@section('content')


    <!-- [ sample-page ] start -->
    <div class="col-sm-12">
        <div class="card">

            <div class="card-header">

                <div class="container">
                    <!-- Stack the columns on mobile by making one full-width and the other half-width -->
                    <div class="row">
                      <div class="col-md-10">
                        <form action="{{ route('laboratorio.search') }}" method="POST">
                            @csrf
                            <input type="text" name="search" placeholder="Filtrar" >
                            <button type="submit" class="btn btn-warning btn-sm">Filtrar</button>
                        </form>
                      </div>
                      <div class="col-6 col-md-2">
                        <form action="{{ route('laboratorio.create') }}">
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
             <div class="card-body" style="overflow: auto;">
                <table class="table table-light table-striped  table-hover">
                    <thead>
                    <tr>

                        <th>Laboratório</th>
                        <th class="text-center">Telefone</th>
                        <th class="text-center">Telefone</th>
                        <th class="text-center">Parceiro</th>
                        <th class="text-center">Detalhes</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        @foreach ($lab as $laboratorio)

                                <td>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading text-uppercase"> {{ $laboratorio->nomeLaboratorio }}</div>
                                                <div class="widget-subheading opacity-7 text-uppercase">{{ $laboratorio->endereco->cidade->nomeCidade }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">{{ $laboratorio->telefone1Laboratorio}}</td>
                                <td class="text-center">{{ $laboratorio->telefone2Laboratorio}} </td>
                                <td class="text-center">
                                    @if ($laboratorio->active == 'on')
                                <p>
                                    <label>
                                        <h5><span class="badge rounded-pill bg-primary">Parceiro</span></h5>
                                    </label>
                                </p>
                                @else
                                <p>
                                    <label>
                                        <h5><span class="badge rounded-pill bg-danger">Não Parceiro</span></h5>
                                    </label>
                                </p>
                                @endif
                                </td>
                                <td class="text-center">
                                    <button onclick="window.location.href = '{{ route('laboratorio.show',$laboratorio->id) }}'" type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm">Detalhes</button>
                                    <!--<button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i class="pe-7s-trash btn-icon-wrapper"> </i></button>-->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination justify-content-center">

                    @if (isset($filters))
                        {{ $lab->appends($filters)->links() }}
                    @else
                        {{ $lab->links() }}
                    @endif

                </div>
            </div>
        </div>
    </div>
    <!-- [ sample-page ] end -->

@endsection

