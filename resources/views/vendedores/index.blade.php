@extends('template')

@section('title')
	Vendedores
@stop

@section('titlePage')
	Cadastro de Vendedores
@stop

@section('content')
	<div class="table-responsive">
        <a href='{{ route('vendedores.add') }}' class="btn btn-info">Novo</a>
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
                @foreach ($vendedores as $vendedor)
                    <tr>
                        <td>{{ $vendedor->id }}</td>
                        <td>{{ $vendedor->nome }}</td>
                        <td>{{ $vendedor->email }}</td>
                        <td>
                            <a href='{{ route('vendedores.edit', ['id' => $vendedor->id]) }}' class="btn btn-primary">Editar</a>
                            <a href='{{ route('vendedores.delete', ['id' => $vendedor->id]) }}' class="btn btn-danger">Excluir</a>
                        </td>
                    </tr>  
                @endforeach              
                @if (count($vendedores) == 0)
                    <tr>
                        <td colspan="4">Nenhum vendedor encontrado</td>                        
                    </tr>
                @endif
            </tbody>
        </table>
        @if (count($vendedores) != 0)
            {!! $vendedores->render() !!}
        @endif
    </div>            
@stop