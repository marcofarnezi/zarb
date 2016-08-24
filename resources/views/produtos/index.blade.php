@extends('template')

@section('title')
	Produtos
@stop

@section('titlePage')
	Cadastro de Produtos
@stop

@section('content')
	<div class="table-responsive">
        <a href='{{ route('produtos.add') }}' class="btn btn-info">Novo</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Descrição</th>                    
                    <th>Valor</th>                    
                    <th width="300"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $produto)
                    <tr>
                        <td>{{ $produto->id }}</td>
                        <td>{{ $produto->nome }}</td>
                        <td>{{ $produto->descricao }}</td>
                        <td>{{ $produto->valor }}</td>
                        <td>
                            <a href='{{ route('produtos.edit', ['id' => $produto->id]) }}' class="btn btn-primary">Editar</a>
                            <a href='{{ route('produtos.delete', ['id' => $produto->id]) }}' class="btn btn-danger">Excluir</a>
                        </td>
                    </tr>  
                @endforeach              
                @if (count($produtos) == 0)
                    <tr>
                        <td colspan="4">Nenhum produto encontrado</td>                        
                    </tr>
                @endif
            </tbody>
        </table>
        @if (count($produtos) != 0)
            {!! $produtos->render() !!}
        @endif
    </div>            
@stop