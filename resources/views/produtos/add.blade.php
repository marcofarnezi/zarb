@extends('template')

@section('title')
	Novo produto
@stop

@section('titlePage')
	Cadastro de Vendas
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
            {!! Form::open(['route'=> 'produtos.save', 'method' => 'post']) !!}            
                @include('produtos._form')
                {!! Form::submit('Salvar', null, ['class' => 'btn btn-default']) !!}                
            {!! Form::close() !!}
        </div>	    
    </div>	    
	            
@stop