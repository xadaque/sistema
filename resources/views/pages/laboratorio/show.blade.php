@extends('layouts.principal')
@section('title','Laboratório')
@section('menu','Laboratório')

@section('content')
@section('iconpage','medical-icon:i-laboratory')

@section('titlepage','Laboratório Detalhes')
<div class="container">
    <div class="col-md-12">

        <div class="card text-center">

            <div class="d-block text-center card-footer">
                <div class="row align-items-start">
                    <div class="col-1">
                        <button onclick="window.location.href = '{{ route('laboratorio.index') }}'" type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm">Voltar</button>
                    </div>
                    <div class="col-9">
                        <h5 class="card-title">{{ $laboratorio->nomeLaboratorio }}</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <table class="table table-light table-striped  table-hover" >
                    <thead>

                    </thead>
                    <tbody>
                        <tr>
                            <th>@if ($laboratorio->active == 'on')
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
                        <td class="text-center">{{ $laboratorio->telefone1Laboratorio }}</td>
                      </tr>
                      <tr>
                        <th>Contato</th>
                        <td class="text-center">{{ $laboratorio->telefone1Laboratorio }}</td>
                      </tr>
                      <tr>
                        <th>Logradouro</th>
                        <td class="text-center"> {{ $laboratorio->endereco->logradouro }}</td>
                      </tr>
                      <tr>
                        <th>Numero</th>
                        <td class="text-center">{{ $laboratorio->endereco->numero }}</td>
                      </tr>
                      <tr>
                        <th>Complemento</th>
                        <td class="text-center">{{ $laboratorio->endereco->complemento }}</td>
                      </tr>
                      <tr>
                        <th>Bairro</th>
                        <td class="text-center">{{ $laboratorio->endereco->bairro }}</td>
                      </tr>
                      <tr>
                        <th>Cidade</th>
                        <td class="text-center">{{ $laboratorio->endereco->cidade->nomeCidade }}</td>
                      </tr>
                    </tbody>
                  </table>



            </div>

            <div class="d-block text-center card-footer">
                <button class="btn-wide btn btn-success" onclick="window.location.href = '{{ route('laboratorio.edit',$laboratorio->id) }}'">Editar</button>
            </div>
        </div>
    </div>
</div>

@endsection

