@extends('template')

@section('title')
	Vendas
@stop

@section('titlePage')
	Cadastro de Vendas
@stop

@section('content')
	<div class="table-responsive">
        <a href='{{ route('vendas.add') }}' class="btn btn-info">Novo</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>vendedor</th>
                    <th>Cliente</th>                    
                    <th>Data</th>
                    <th width="300"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vendas as $venda)
                    <tr>
                        <td>{{ $venda->id }}</td>
                        <td>{{ $venda->name }}</td>
                        <td>{{ $venda->nome }}</td>
                        <td>{{ $venda->updated_at->format('d/m/Y') }}</td>
                        <td>
                            <a href='{{ route('vendas.edit', ['id' => $venda->id]) }}' class="btn btn-primary">Editar</a>
                            <a href='{{ route('vendas.delete', ['id' => $venda->id]) }}' class="btn btn-danger">Excluir</a>
                        </td>
                    </tr>  
                @endforeach              
                @if (count($vendas) == 0)
                    <tr>
                        <td colspan="4">Nenhuma venda encontrada</td>                        
                    </tr>
                @endif
            </tbody>
        </table>
        @if (count($vendas) != 0)
            {!! $vendas->render() !!}
        @endif
    </div>            
@stop