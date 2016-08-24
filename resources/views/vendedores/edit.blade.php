
@extends('template')


@section('title')
    Editar dados do vendedor
@stop

@section('titlePage')
    Cadastro de Vendedores
@stop

@section('content') 
    @if($errors->any())
        <ul class="alert">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        
    @endif
    <div class="row">
        
            {!! Form::model($vendedor, ['route'=> ['vendedores.update', $vendedor->id], 'method' => 'put']) !!}            
                @include('vendedores._form')
                {!! Form::submit('Salvar', null, ['class' => 'btn btn-default']) !!}                
            {!! Form::close() !!}        
    </div>                  
@stop