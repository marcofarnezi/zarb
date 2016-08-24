@extends('template')

@section('title')
    Editar dados do cliente
@stop

@section('titlePage')
    Cadastro de Clientes
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
        <div class="col-lg-6">
            {!! Form::model($cliente, ['route'=> ['clientes.update', $cliente->id], 'method' => 'put']) !!}            
                @include('clientes._form')
                {!! Form::submit('Salvar', null, ['class' => 'btn btn-default']) !!}                
            {!! Form::close() !!}
        </div>      
    </div>      
                
@stop