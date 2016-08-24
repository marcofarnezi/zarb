<div class="form-group">
    {!! Form::label('nome', 'Nome do cliente') !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('email', 'E-mail') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}                    
</div>
<div class="form-group">
    {!! Form::label('endereco', 'Endereço') !!}
    {!! Form::textarea('endereco', null, ['class' => 'form-control']) !!}                    
</div>