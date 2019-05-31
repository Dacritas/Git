<nav class="navbar navbar-light" style="background-color:#7BC142;">
	<div class="container-fluid">
		<div class="navbar-header">
			<a href="index.php" class="navbar-brand" id="index_menu">Dashboard</a>
		</div>
		<ul class="nav navbar-nav menus">		
			<li><a href="customer.php" id="customer_menu">Cliente</a></li>
			<li><a href="category.php" id="category_menu">Categoria</a></li>
			<li><a href="brand.php" id="brand_menu">Marca</a></li>
			<li><a href="product.php" id="product_menu">Producto</a></li>
			<li><a href="supplier.php" id="supplier_menu">Proveedor</a></li>
			<li><a href="purchase.php" id="purchase_menu">Compra</a></li>
			<li><a href="order.php" id="order_menu">Pedidos</a></li>			
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count"></span> 
				<?php echo $_SESSION['name']; ?></a>
				<ul class="dropdown-menu">
					<li><a href="account.php">Cuenta</a></li>
					<li><a href="action.php?action=logout">Salir</a></li>
				</ul>
			</li>
		</ul>
	</div>
</nav>