@extends('templates.template')

@section('conteudo')
    <h1 class="text-center">Visualização</h1>
    <hr><br>

    <div class="col-8 m-auto">
        <a href="{{ url('/usuarios') }}"> <button class="btn btn-outline-danger">Voltar</button> </a>
    </div>
    <br>
    <div class="col-8 m-auto">
        <table class="table table-hover text-center">
            <thead class="thead-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Sexo</th>
                <th scope="col">Data de Nascimento</th>
                <th scope="col" width="30%">Data de Cadastro</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{$usuario->id}}</th>
                    <td>{{$usuario->nome}}</td>
                    <td>
                        @if($usuario->sexo=='M')Masculino
                        @elseif($usuario->sexo=='F')Feminino
                        @endif </td>
                    <td>{{$usuario->nascimento}}</td>
                    <td>{{$usuario->created_at}}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
