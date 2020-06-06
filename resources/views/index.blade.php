@extends('templates.template')

@section('conteudo')

    <h1 class="text-center">Desafio City 1.0</h1>
    <hr><br>

    <div class="container">
       <div class="row mb-3">
           <div class="col-2" ></div>
           <div class="col-4 ml-5">
                <a href=" {{url('usuarios/create')}} "><button class="btn btn-outline-success">Cadastro</button></a>
                   @if (\Request::is('search'))
                   <a href="{{ url('/usuarios') }}"><button class="btn btn-outline-danger">Voltar</button></a>
                   @endif
            </div>
           <div class="col-4 input-group ml-4">
                <form action="{{route('search')}}" method="POST">
                    @csrf
                    <div class="input-group-append">
                        <input class="form-control " type="search" name="search">
                        <span class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
           </div>
           <div class="col-2"></div>
       </div>

       <div class="col-8 m-auto">
            <table class="table table-hover text-center">
              <thead class="thead-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Data de Nascimento</th>
                    <th scope="col" width="30%">Ações</th>
                </tr>
                </thead>
                <tbody>

              @foreach($usuario as $usuarios)

                <tr>
                    <th scope="row">{{$usuarios->id}}</th>
                        <td>{{$usuarios->nome}}</td>
                        <td>
                            @if($usuarios->sexo=='M')Masculino
                            @elseif($usuarios->sexo=='F')Feminino
                            @endif </td>
                          {{--  <td>{{$usuarios->nascimento}}</td>--}}
                            <td>{{\Carbon\Carbon::createFromFormat('Y-m-d', $usuarios->nascimento)->format('d/m/Y')}}</td>

                        <td>
                            <div class="d-flex justify-content-center">
                                <div class="mr-1"><a href="{{url("usuarios/$usuarios->id")}}">
                                        <button class="btn btn-outline-primary font-weight-bold ">+</button></a>
                                </div>

                                <div class="mr-1"><a href="{{url("usuarios/$usuarios->id/edit")}}">
                                        <button class="btn btn-secondary ">Editar</button> </a>
                                </div>

                                <div>
                                    <form action="{{url("usuarios/$usuarios->id")}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" name="_method" value="Delete" placeholder="Deletar" class="btn btn-danger">
                                    </form>
                                </div>
                            </div>
                        </td>

                </tr>
              @endforeach

                </tbody>
            </table>
              @if (! \Request::is('search'))
                   {{$usuario->render()}}
              @endif
       </div>
    </div>
@endsection
