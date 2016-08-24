@extends('template')

@section('script')    
    <script src="/js/vendas.js"></script>
@stop

@section('title')
	Novo venda
@stop

@section('titlePage')
	Registro de Vendas
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
        
            {!! Form::open(['route'=> 'vendas.save', 'method' => 'post']) !!}            
                @include('vendas._form')
                <div class="col-lg-12">
                {!! Form::submit('Salvar', null, ['class' => 'btn btn-default']) !!}                
                </div>      
            {!! Form::close() !!}
        
    </div>	    
	            
@stop

