<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutosRequest;
use App\Http\Requests;
use App\Produtos;
use App\ItemVendas;

class ProdutosController extends Controller
{
    private $produtos;

	public function __construct(Produtos $produtos)
	{
		$this->produtos = $produtos;
	}

    public function index()
    {
    	$produtos = $this->produtos->paginate(10);

    	return view('produtos.index', compact('produtos'));
    }

    public function add()
    {
        
    	return view('produtos.add');	
    }

    public function save(ProdutosRequest $request)
    {
    	$this->produtos->create($request->all());    	

    	return redirect()->route('produtos.index');
    }

    public function edit($id)
    {
    	$produto = $this->produtos->find($id);

    	return view('produtos.edit', compact('produto'));
    }

    public function update($id, ProdutosRequest $request)
    {    	
    	$this->produtos->find($id)->update($request->all());

    	return redirect()->route('produtos.index');
    }

    public function delete($id)
    {
    	$itemVendas = new ItemVendas();
        $totalItemVendas = $itemVendas->where(['produtos_id' => $id])->get();
        if(count($totalItemVendas) == 0) {
           $this->produtos->find($id)->delete();
        }

    	
    	return redirect()->route('produtos.index');
    }
}

