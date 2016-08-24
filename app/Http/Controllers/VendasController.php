<?php

namespace App\Http\Controllers;

use App\Http\Requests\VendasRequest;
use App\Http\Requests;
use App\Vendas;
use App\ItemVendas;
use App\Clientes;
use App\Produtos;

class VendasController extends Controller
{
    private $vendas;
    private $clientes;
    private $produtos;
    private $itemVendas;

	public function __construct(Vendas $vendas, ItemVendas $itemVendas, Clientes $clientes, Produtos $produtos)
	{
		$this->vendas = $vendas;
        $this->clientes = $clientes;
        $this->produtos = $produtos;
        $this->itemVendas = $itemVendas;
	}

    public function index()
    {        
    	$vendas = $this->vendas
            ->select('users.name','vendas.*', 'clientes.nome')
            ->join('users', 'vendas.user_id', '=', 'users.id')
            ->join('clientes', 'vendas.cliente_id', '=', 'clientes.id')
            ->paginate(10);        

    	return view('vendas.index', compact('vendas'));
    }

    public function add()
    {        
        $clientes = $this->preparaClientes();
        $produtos = $this->preparaProdutos();
        $produtosValores = json_encode($this->preparaProdutos(true));

    	return view('vendas.add', compact('clientes', 'produtos', 'produtosValores'));	
    }
    
    public function save(VendasRequest $request)
    {        
    	$venda = $this->vendas->create($request->all());    	            
        
        $this->saveItens($venda->id, $request->all()['item']);

    	return redirect()->route('vendas.index');
    }

    public function edit($id)
    {
    	$venda = $this->vendas->find($id);
        $clientes = $this->preparaClientes();
        $produtos = $this->preparaProdutos();
        $produtosValores = json_encode($this->preparaProdutos(true));        

    	return view('vendas.edit', compact('venda', 'clientes', 'produtos', 'produtosValores'));
    }

    public function update($id, VendasRequest $request)
    {    	
    	$this->vendas->find($id)->update($request->all());

        $this->saveItens($id, $request->all()['item']);

    	return redirect()->route('vendas.index');
    }

    public function delete($id)
    {
        $this->itemVendas->where(['vendas_id' => $id])->delete();
    	
        $this->vendas->find($id)->delete();
    	
    	return redirect()->route('vendas.index');
    }

    private function saveItens($vendaId, $itens)
    {
        $this->itemVendas->where(['vendas_id' => $vendaId])->delete();

        foreach ($itens as $item) {
            $itemInsert = [
                'produtos_id' => $item['produto'],
                'quantidade' => $item['quantidade'],
                'vendas_id' => $vendaId
            ];
            $this->itemVendas->create($itemInsert);
        }
    }

    private function preparaProdutos($valores = false)
    {
        $produtos = $this->produtos->all();
        
        $campo = 'nome';        
        $produtosOptions = [];
        if ($valores) {
            $campo = 'valor';            
        } else {
            $produtosOptions[''] = 'Selecione';
        }

        foreach ($produtos as $produto) {
            $produtosOptions[$produto->id] = $produto->$campo;
        }

        return $produtosOptions;
    }

    private function preparaClientes()
    {
        $clientes = $this->clientes->all();
        $clientesOptions[''] = 'Selecione';

        foreach ($clientes as $cliente) {
            $clientesOptions[$cliente->id] = $cliente->nome;
        }

        return $clientesOptions;
    }
}
