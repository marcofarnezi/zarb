@extends('template')

@section('title')
	Clientes
@stop

@section('titlePage')
	Cadastro de Clientes
@stop

@section('content')
	<div class="table-responsive">
        <a href='{{ route('clientes.add') }}' class="btn btn-info">Novo</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>E-mail</th>                    
                    <th width="300"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->id }}</td>
                        <td>{{ $cliente->nome }}</td>
                        <td>{{ $cliente->email }}</td>
                        <td>
                            <a href='{{ route('clientes.edit', ['id' => $cliente->id]) }}' class="btn btn-primary">Editar</a>
                            <a href='{{ route('clientes.delete', ['id' => $cliente->id]) }}' class="btn btn-danger">Excluir</a>
                        </td>
                    </tr>  
                @endforeach              
                @if (count($clientes) == 0)
                    <tr>
                        <td colspan="4">Nenhum cliente encontrado</td>                        
                    </tr>
                @endif
            </tbody>
        </table>
        @if (count($clientes) != 0)
            {!! $clientes->render() !!}
        @endif
    </div>            
@stop