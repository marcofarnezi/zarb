@extends('template')

@section('script')    
    <script src="/data/data_rel_vendedores.js"></script>
@stop

@section('title')
	Relatório
@stop

@section('titlePage')
	Relatório de vendas
@stop

@section('content')

	<div class="table-responsive">
        <div class="col-lg-6">
            
                <div class="panel-heading">
                    Vendas por vendedor
                </div>

                <!-- /.panel-heading -->
                <div class="panel-body">
                    <input type="hidden" value='{{ $relatorioVendedores }}' id='data_rel_vendedores'>
                    <div class="flot-chart">
                        <div class="flot-chart-content" id="flot-pie-chart"></div>
                    </div>
                </div>
                <!-- /.panel-body -->
            
        </div>        
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Produtos vendidos
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>                                    
                                    <th>Produto</th>
                                    <th>Quantidade</th>
                                    <th>Valor total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produtos as $produto)
                                    <tr>                                    
                                        <td>{{ $produto['nome'] }}</td>
                                        <td>{{ $produto['quantidade'] }}</td>
                                        <td>R$ {{ $produto['quantidade'] * $produto['valor'] }}</td>
                                    </tr>                                
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Vendas
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>                                    
                                    <th>Vendedor</th>
                                    <th>Cliente</th>
                                    <th>Produto</th>
                                    <th>Quantidade</th>
                                    <th>Data</th>
                                    <th>Valor total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vendas as $venda)                                    
                                    <tr class="info">                                    
                                        <td>{{ $venda->name }}</td>
                                        <td>{{ $venda->cliente_nome}}</td>
                                        <td>{{ $venda->nome }}</td>
                                        <td>{{ $venda->quantidade }}</td>
                                        <td>{{ $venda->updated_at->format('d/m/Y') }}</td>
                                        <td>{{ $venda->quantidade * $venda->valor }}</td>
                                        
                                    </tr>                                
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>            
@stop