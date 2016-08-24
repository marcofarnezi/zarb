<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientesRequest;
use App\Http\Requests;
use App\Clientes;
use App\Vendas;

class ClientesController extends Controller
{
	private $clientes;

	public function __construct(Clientes $clientes)
	{
		$this->clientes = $clientes;
	}

    public function index()
    {
    	$clientes = $this->clientes->paginate(10);

    	return view('clientes.index', compact('clientes'));
    }

    public function add()
    {
    	return view('clientes.add');	
    }

    public function save(ClientesRequest $request)
    {
    	$this->clientes->create($request->all());    	

    	return redirect()->route('clientes.index');
    }

    public function edit($id)
    {
    	$cliente = $this->clientes->find($id);

    	return view('clientes.edit', compact('cliente'));
    }

    public function update($id, ClientesRequest $request)
    {    	
    	$this->clientes->find($id)->update($request->all());

    	return redirect()->route('clientes.index');
    }

    public function delete($id)
    {
        $vendas = new Vendas();
        $totalVendas = $vendas->where(['cliente_id' => $id])->get();
        if(count($totalVendas) == 0) {
    	   $this->clientes->find($id)->delete();
        }

    	return redirect()->route('clientes.index');
    }
}
