<div class="form-group">
    {!! Form::label('nome', 'Nome do vendedor') !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('email', 'E-mail') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}                    
</div>
<div class="form-group">
    {!! Form::label('entidade_id', 'Trabalha em') !!}
    {!! Form::select('entidade_id', $entidades, null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('password', 'Senha') !!}<br>
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>