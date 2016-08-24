<?php

namespace App\Http\Controllers;

use App\Http\Requests\VendedoresRequest;
use App\Http\Requests;
use App\Vendedores;
use App\Entidade;
use App\User;
       
class VendedoresController extends Controller
{
    private $vendedores;
    private $entidades;
    private $user;

	public function __construct(Vendedores $vendedores, Entidade $entidades, User $user)
	{
		$this->vendedores = $vendedores;
        $this->entidades = $entidades;
        $this->user = $user;
	}

    public function index()
    {
    	$vendedores = $this->vendedores->paginate(10);

    	return view('vendedores.index', compact('vendedores'));
    }

    private function preparaBoxEntidades()
    {
        $entidades = $this->entidades->all();

        $entidadesBox = [];
        $entidadesBox[''] = "Selecione";
        foreach ($entidades as $entidade) {
            $entidadesBox[$entidade->id] = $entidade->nome;
        }

        return $entidadesBox;
    }
    public function add()
    {
        $entidades = $this->preparaBoxEntidades();

    	return view('vendedores.add', compact('entidades'));	
    }

    public function save(VendedoresRequest $request)
    {
    	$userDados = [
            'name' => $request->nome,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ];
        $retorno = $this->user->create($userDados);
        
        $this->vendedores->create($request->all() + ['user_id' => $retorno->id]);    	

    	return redirect()->route('vendedores.index');
    }

    public function edit($id)
    {
    	$vendedor = $this->vendedores->find($id);

        $entidades = $this->preparaBoxEntidades();

    	return view('vendedores.edit', compact('vendedor', 'entidades'));
    }

    public function update($id, VendedoresRequest $request)
    {    	
    	$vendedor = $this->vendedores->find($id);
        $user = $this->user->find($vendedor->user_id);

        $userDados = [
            'name' => $request->nome,
            'email' => $request->email,            
        ];

        if (! empty(trim($request->password))) {
            $userDados['password'] = bcrypt($request->password);
        }

        $user->update($userDados);        
        $vendedor->update($request->all());

    	return redirect()->route('vendedores.index');
    }

    public function delete($id)
    {
    	$vendedor = $this->vendedores->find($id);
        $user = $this->user->find($vendedor->user_id);

        $vendas = new Vendas();
        $totalVendas = $vendas->where(['user_id' => $vendedor->user_id])->get();
        if(count($totalVendas) == 0) {
            $vendedor->delete();
            $user->delete();
        }
        
    	
    	return redirect()->route('vendedores.index');
    }
}
