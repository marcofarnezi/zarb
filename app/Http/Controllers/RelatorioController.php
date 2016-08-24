<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Vendas;

class RelatorioController extends Controller
{
	private $vendas;

	public function __construct(Vendas $vendas)
	{
		$this->vendas = $vendas;
	}

    public function index()
    {
    	
    	$vendas = $this->getVendas();
    	$relatorioVendedores = $this->getVendasVendedor($vendas);
    	$produtos = $this->getProdutosVendidos($vendas);
    	
    	return view('relatorio.index', compact('relatorioVendedores', 'produtos', 'vendas'));
    }

    private function getVendas()
    {
    	return $vendas = $this->vendas
    		->select('users.name','vendas.*', 'clientes.nome as cliente_nome',  'produtos.*','item_vendas.*')
			->join('users', 'vendas.user_id', '=', 'users.id')
			->join('clientes', 'vendas.cliente_id', '=', 'clientes.id')
			->join('item_vendas', 'item_vendas.vendas_id', 'vendas.id')			
			->join('produtos', 'item_vendas.produtos_id', 'produtos.id')			
			->get();
    }

    private function getVendasVendedor($vendas)
    {
    	$relatorioVendasVendedor = [];
    	$valorTotal = 0;
    	foreach ($vendas as $venda) {
    		if (! isset($relatorioVendasVendedor[$venda->user_id]['data'])) {
    			$relatorioVendasVendedor[$venda->user_id]['data'] = 0;
    		}    		
    		$relatorioVendasVendedor[$venda->user_id]['data'] += ($venda->quantidade * $venda->valor);
    		$valorTotal += 	($venda->quantidade * $venda->valor);
    		$relatorioVendasVendedor[$venda->user_id]['label'] = $venda->name;
    	}
    	
    	$returnArrayDate = '[';
    	foreach ($relatorioVendasVendedor as $k => $v) {
    		$data = ($relatorioVendasVendedor[$k]['data'] * 100) / $valorTotal;
    		$returnArrayDate .= '{label: "' . $v['label'] . '", data : ' . $data . '},';    		     		
    	}

    	$returnArrayDate = rtrim($returnArrayDate, ',');
    	$returnArrayDate .= ']';
    	
    	return $returnArrayDate;
    }

    private function getProdutosVendidos($vendas)
    {
    	$produtos = [];
    	foreach ($vendas as $venda) {
    		if (! isset($produtos[$venda->produtos_id]['quantidade'])){
    			$produtos[$venda->produtos_id]['quantidade'] = 0;
    		}
    		$produtos[$venda->produtos_id]['quantidade'] += $venda->quantidade;
    		$produtos[$venda->produtos_id]['nome'] = $venda->nome;
    		$produtos[$venda->produtos_id]['valor'] = $venda->valor;
    	}

    	return $produtos;
    }
}
