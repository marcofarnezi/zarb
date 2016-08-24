@extends('template')

@section('script')    
    <script src="/js/vendas.js"></script>
@stop

@section('title')
    Editar dados do venda
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
        
            {!! Form::model($venda, ['route'=> ['vendas.update', $venda->id], 'method' => 'put']) !!}            
                @include('vendas._form')
                <div class="col-lg-12">
                    {!! Form::submit('Salvar', null, ['class' => 'btn btn-default']) !!}                
                </div>      
            {!! Form::close() !!}
        
    </div>      
                
@stop