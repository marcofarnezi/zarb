@extends('template')

@section('title')
    Editar dados do produto
@stop

@section('titlePage')
    Cadastro de Produtos
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
            {!! Form::model($produto, ['route'=> ['produtos.update', $produto->id], 'method' => 'put']) !!}            
                @include('produtos._form')
                {!! Form::submit('Salvar', null, ['class' => 'btn btn-default']) !!}                
            {!! Form::close() !!}
        </div>      
    </div>      
                
@stop