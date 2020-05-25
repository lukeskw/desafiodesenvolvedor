{{ Form::model($user, [
    'url' => $user->id ? route('users.update', $user) : route('users.store'), 
    'method' => $user->id ? 'put' : 'post',
    'id' => 'users-form'
]) }}

<div class="card my-3">
    <div class="card-body">
        <div class="form-group">
            {{ Form::label('name', 'Nome') }}
            {{ Form::text('name', null, ['class' => 'form-control']) }}
        </div>
        
        <div class="form-row">
            <div class="col-md-6 form-group">
                {{ Form::label('data_nascimento', 'Data de Nascimento') }}
                {{ Form::text('data_nascimento', $user->data_nascimento_string, ['class' => 'form-control']) }}
            </div>
        </div>
        
        <div class="form-row">
            <div class="col-md-6 form-group">
                {{ Form::label('sexo', 'Sexo') }}
                {{ Form::select('sexo', \App\User::$sexo, null, ['placeholder' => '', 'class' => 'form-control']) }}
            </div>
        </div>
    </div>
</div>

<button type="submit" class="btn btn-success btn-lg"><i class="fa fa-check"></i> Salvar</button>

{{ Form::close() }}

@section('js')
    <script>
        $('#data_nascimento').mask('99/99/9999');

        $('#users-form').validate({
            rules: {
                name: 'required',
                data_nascimento: {
                    required: true,
                    dateBR: true
                },
                sexo: 'required'
            }
        })
    </script>
@endsection