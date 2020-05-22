@extends('layout.app')

@section('content')
    <div class="my-2">
        <a href="{{ route('users.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Novo Usuário</a>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-hover" id="users-list">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Data de Nascimento</th>
                        <th>Sexo</th>
                        <th>Data de Cadastro</th>
                        <th data-orderable="false"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $u)
                        <tr>
                            <td>{{ $u->name }}</td>
                            <td data-order="{{ $u->data_nascimento }}">{{ $u->data_nascimento_string }}</td>
                            <td>{{ \App\User::$sexo[$u->sexo] }}</td>
                            <td data-order="{{ $u->created_at->format('Y-m-d') }}">{{ $u->created_at->format('d/m/Y') }}</td>
                            <td>
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('users.edit', $u) }}" class="btn btn-primary btn-sm mr-1"><i class="fa fa-pencil-alt"></i> Editar</a>
                                    
                                    {{ Form::open(['url' => route('users.destroy', $u), 'method' => 'delete']) }}
    
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Excluir</button>
    
                                    {{ Form::close() }}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('#users-list').DataTable();        
    </script>
@endsection