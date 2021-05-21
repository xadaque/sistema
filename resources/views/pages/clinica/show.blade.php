@extends('layouts.principal')
@section('title','Clinica')
@section('menu','Clinica')



@section('titlepage','Clinica Detalhes')
@section('content')
    

<div class="container">
    <div class="col-md-12">

        <div class="card text-center">

            <div class="d-block text-center card-footer">
                <div class="row align-items-start">
                    <div class="col-1">
                        {{-- <button onclick="window.location.href = '{{ route('clinica.index') }}'" type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm">Voltar</button> --}}
                    </div>
                    <div class="col-9">
                        <h5 class="card-title">{{ $clinicas->name }}</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <table class="table table-light table-striped  table-hover" >
                    <thead>

                    </thead>
                    <tbody>
                        <tr>
                            <th>@if ($clinicas->active == 'on')
                                <p>
                                    <label>
                                        <h4><span class="badge rounded-pill bg-primary">Parceiro</span></h4>
                                    </label>
                                </p>
                                @else
                                <p>
                                    <label>
                                        <h5><span class="badge rounded-pill bg-danger">Não Parceiro</span></h5>
                                    </label>
                                </p>
                                @endif</th>
                          </tr>
                      <tr>
                        <th>Contato</th>
                        <td class="text-center">{{ $clinicas->telefone1 }}</td>
                      </tr>
                      <tr>
                        <th>Contato</th>
                        <td class="text-center">{{ $clinicas->telefone1 }}</td>
                      </tr>
                      <tr>
                        <th>Logradouro</th>
                        <td class="text-center"> {{ $clinicas->endereco->logradouro }}</td>
                      </tr>
                      <tr>
                        <th>Numero</th>
                        <td class="text-center">{{ $clinicas->endereco->numero }}</td>
                      </tr>
                      <tr>
                        <th>Complemento</th>
                        <td class="text-center">{{ $clinicas->endereco->complemento }}</td>
                      </tr>
                      <tr>
                        <th>Bairro</th>
                        <td class="text-center">{{ $clinicas->endereco->bairro }}</td>
                      </tr>
                      <tr>
                        <th>Cidade</th>
                        <td class="text-center">{{ $clinicas->endereco->cidade->nomeCidade }}</td>
                      </tr>
                    </tbody>
                  </table>



            </div>

            {{-- <div class="d-block text-center card-footer">
                <button class="btn-wide btn btn-success" onclick="window.location.href = '{{ route('clinicas.edit',$clinicas->id) }}'">Editar</button>
            </div> --}}
        </div>
    </div>
</div>

@endsection

