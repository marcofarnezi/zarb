<div class="form-group">
    {!! Form::label('nome', 'Nome do produto') !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('descricao', 'Descrição') !!}
    {!! Form::textarea('descricao', null, ['class' => 'form-control']) !!}                    
</div>
<div class="form-group">
    {!! Form::label('valor', 'Valor') !!}
    {!! Form::text('valor', null, ['class' => 'form-control']) !!}                    
</div>