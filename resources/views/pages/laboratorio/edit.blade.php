@extends('layouts.principal')

@section('title','Cadastro')
@section('NomePagina','Laboratório')
@section('BreadcrumbNome','Laboratório - Cadastro')

@section('content')

<link rel="stylesheet" href="../../../../materialize/css/meumaterialize.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">



    <!-- [ sample-page ] start -->
    <div class="col-sm-12">
        <div class="card">

            <div class="card-header">
                <div class="container">
                    <!-- Stack the columns on mobile by making one full-width and the other half-width -->
                    <div class="row">
                      <div class="col-md-1">
                        <form action="{{ route('laboratorio.index') }}" method="POST">
                            <input class="btn btn-primary" type="submit" value="Voltar">
                        </form>
                      </div>
                      <div class="col-6 col-md-11">
                        <div class="col-9">
                            <h3 class="card-title">Editar <strong>{{ $laboratorio->nomeLaboratorio }}</strong> </h3>
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
                <form class="" action="{{ route('laboratorio.update',$laboratorio->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    @if ($laboratorio->active == 'on')
                    <p>
                        <label>
                            <input type="checkbox" checked  name="parceiro" id="parceiro"/>
                            <span>Parceiro</span>
                        </label>
                    </p>
                    @else
                    <p>
                        <label>
                            <input type="checkbox"  name="parceiro" id="parceiro"/>
                            <span>Parceiro</span>
                        </label>
                    </p>
                    @endif

                    <div class="position-relative form-group">





                        <label for="exampleEmail" class="">Nome</label>
                        <input name="nomeLaboratorio" id="nomeLaboratorio" placeholder="Nome do local" type="text" class="form-control @error('nomeLaboratorio') is-invalid @enderror" value="{{ $laboratorio->nomeLaboratorio }}">
                        @error('nomeLaboratorio')
                            <div class="invalid-tooltip">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="position-relative form-group">
                        <label>Contato</label>
                        <input name="telefone1Laboratorio" id="telefone1Laboratorio" placeholder="Telefone principal" type="number" class="form-control" value="{{ $laboratorio->telefone1Laboratorio }}">
                    </div>

                    <div class="position-relative form-group">
                        <label>Contato</label>
                        <input name="telefone2Laboratorio" id="telefone2Laboratorio" placeholder="Telefone secundário" type="number" class="form-control" value="{{ $laboratorio->telefone2Laboratorio }}">
                    </div>

                    <div class="position-relative form-group">
                        <label>Rua</label>
                        <input name="logradouro" id="logradouro" placeholder="Rua, Av." type="text" class="form-control  @error('logradouro') is-invalid @enderror" value="{{ $laboratorio->endereco->logradouro }}">
                        @error('logradouro')
                            <div class="invalid-tooltip">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="position-relative form-group">
                        <label>Numero</label>
                        <input name="numero" id="numero" placeholder="Numero do estabelicmento" type="number" class="form-control" value="{{ $laboratorio->endereco->numero }}">
                    </div>

                    <div class="position-relative form-group">
                        <label>Complemento</label>
                        <input name="complemento" id="complemento" placeholder="Complemento ou indicação do local" type="text" class="form-control" value="{{ $laboratorio->endereco->complemento }}">
                    </div>

                    <div class="position-relative form-group">
                        <label>Bairro</label>
                        <input name="bairro" id="bairro" placeholder="Bairro" type="text" class="form-control" value="{{ $laboratorio->endereco->bairro }}">
                    </div>

                        <!-- For defining autocomplete -->
                    <div class="position-relative form-group">
                        <label>Cidade</label>
                        <input type="text" id='employee_search' placeholder="Cidade" value="{{ $laboratorio->endereco->cidade->nomeCidade }}">
                    </div>

                    <input type="text" id='cidade_id' hidden name="cidade_id" value="{{ $laboratorio->endereco->cidade->id }}">



                    <!-- For displaying selected option value from autocomplete suggestion -->


                    <button class="mt-1 btn btn-primary">Enviar</button>

                </form>
            </div>
        </div>
    </div>
    <!-- [ sample-page ] end -->


@endsection


