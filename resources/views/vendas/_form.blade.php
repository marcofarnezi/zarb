<div class="form-group">
	<div class="col-lg-6">
		<div class="panel panel-default">
	        <div class="panel-heading">
	            Comprador
	        </div>
	        <!-- /.panel-heading -->
	        <div class="panel-body">			    
			    {!! Form::select('cliente_id', $clientes, null, ['class' => 'form-control', 'required' => 'required']) !!}
			</div>
	    </div>
    </div>
    <div class="col-lg-6">
		<div class="panel panel-default">
	        <div class="panel-heading">
	            Vendedor
	        </div>
	        <!-- /.panel-heading -->
	        <div class="panel-body">			    
			    <input type="text" readonly="readonly" class='form-control' value='{{ Auth::user()->name }}'>
                <input type="hidden" name='user_id' value='{{ Auth::user()->id }}'>
			</div>
	    </div>
    </div>
</div>

<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Itens da venda <input type="button" id='moreItem' value="Novo item">
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">            
                <input type="hidden" id="produtosValores" value="{{ $produtosValores }}">
                <table class="table">
                    <thead>
                        <tr>                                                                        
                            <th>Produto</th>
                            <th>Quantidade</th>
                            <th>Valor unitário</th>
                            <th>Valor total</th>                                    
                            <th></th>                                    
                        </tr>
                    </thead>
                    <tbody>
                        @if (! isset($venda))
                            <tr class="itemvenda itemvenda0">                                
                                <td>
                                    {!! Form::select('item[0][produto]', $produtos, null, ['class' => 'form-control produto', 'id' => 'itemproduto0', 'onchange' => 'valorUnitario(this);' ,'required' => 'required']) !!}
                                </td>
                                <td><input type='number' name='item[0][quantidade]' id='itemquantidade0' onblur='valorUnitario(this);' class='form-control quantidade'></td>
                                <td><input readonly="readonly" id='itemvalor0' class='form-control unitario'></td>
                                <td><input readonly="readonly" id='itemtotal0' class='form-control total'></td>
                                <td><button onclick="deleteElement(this)" type="button" class='elementItem btn-danger'><i class='fa fa-times '></i></button></td>                                    
                            </tr>                              
                        @else
                            @foreach($venda->itemVendas as $id => $item)

                            <tr class="itemvenda itemvenda{{ $id }}">                                
                                <td>
                                    {!! Form::select('item['.$id.'][produto]', $produtos, $item->produtos_id, ['class' => 'form-control produto', 'id' => 'itemproduto'.$id, 'onchange' => 'valorUnitario(this);', 'required' => 'required']) !!}
                                </td>
                                <td><input type='number' name='item[{{ $id }}][quantidade]' id='itemquantidade{{ $id }}' onblur='valorUnitario(this);' class='form-control quantidade' value='{{$item->quantidade}}'></td>
                                <td><input readonly="readonly" id='itemvalor{{ $id }}' class='form-control unitario'></td>
                                <td><input readonly="readonly" id='itemtotal{{ $id }}' class='form-control total'></td>
                                <td><button onclick="deleteElement(this)" type="button" class='elementItem btn-danger'><i class='fa fa-times '></i></button></td>                                    
                            </tr>
                            @endforeach
                        @endif                                  
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>