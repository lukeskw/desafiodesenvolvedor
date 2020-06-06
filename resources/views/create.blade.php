@extends('templates.template')

@section('conteudo')
<!-- Utilizando o mesmo form para criação e edição de usuário. Se a var usuario que vem do controller
     estiver vazia, mostra tela de cadastro, senão tela de edição-->

        <h1 class="text-center">@if(isset($usuario))Edição de Usuário @else Cadastro de Usuário @endif</h1>
        <hr><br>

        <div class="col-6 m-auto">
            <a href="{{ url('/usuarios') }}"><button class="btn btn-outline-danger">Voltar</button></a>
        </div>

        <div class="col-6 m-auto">

    {{--Dependendo do valor da variável $usuario, mostra forms diferentes (edit ou cad)--}}
        @if(isset($usuario))
            <form class="mt-3" name="editUser" id="editUser" method="post" action="{{url("usuarios/$usuario->id")}}">
              @method('PUT')
        @else
            <form class="mt-3" name="cadUser" id="cadUser" method="post" action="{{url('usuarios')}}">
        @endif

        @csrf

            <div class="form-row">
                <div class="form-group col-md-8">
                    <input class="form-control" required type="text"
                           name="nome" id="nome" placeholder="Informe o nome:"
                           {{--value="@if($usuario->nome){{$usuario->nome}} @else '' @endif">--}}
                    value="{{$usuario->nome ?? ''}}">
                </div>
                <div class="col">

        {{--If para puxar a option correta cadastrada no banco ou cadastro de novas--}}
                    @if(isset($usuario))
                           <select class="form-control" id="sexo" name="sexo" required>
                               @if($usuario->sexo=='M')
                                   <option value="M" selected>Masculino</option>
                                   <option value="F">Feminino</option>
                               @elseif($usuario->sexo=='F')
                                   <option value="F" selected>Feminino</option>
                                   <option value="M">Masculino</option>
                               @endif
                           </select>
                        @else
                           <select class="form-control" id="sexo" name="sexo" required>
                                <option value="">Selecione...</option>
                                <option value="M">Masculino</option>
                                <option value="F">Feminino</option>
                           </select>
                        @endif
                </div>
            </div>

                  <input class="form-control mb-3" required type="text" name="nascimento" id="nascimento"
                        placeholder="Informe a data de nascimento:" onfocus="(this.type='date')" onblur="(this.type='text')"
                        value="{{$usuario->nascimento ?? ''}}" >
                  <input class="btn btn-success" type="submit"
                        value="@if(isset($usuario))Editar @else Cadastrar @endif">
            </form>
        </div>
@endsection
