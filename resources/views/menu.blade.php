@if (isset(Auth::user()->id))
<div class="sidebar-nav navbar-collapse">
    <ul class="nav" id="side-menu">                        
        <li>
            <a href="{{ route('vendas.add') }}"><i class="fa fa-dashboard fa-fw"></i> Registrar venda </a>
        </li>        
        <li>
            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Cadastros<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{ route('clientes.index') }}">Clientes</a>
                </li>
                <li>
                    <a href="{{ route('produtos.index') }}">Produtos</a>
                </li>                
            </ul>
            <!-- /.nav-second-level -->
        </li>        
        <li>
            <a href="{{ route('vendedores.index') }}"><i class="fa fa-user fa-fw"></i> Vendedores</a>
        </li>
    </ul>
</div>
<!-- /.sidebar-collapse -->
@endif