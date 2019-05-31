<?php 
session_start();
include('inc/header.php');
include 'Inventory.php';
$inventory = new Inventory();
$inventory->checkLogin();
?>
<title>ERP Universidad el bosque</title>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>		
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
<script src="js/supplier.js"></script>
<script src="js/common.js"></script>
<meta charset="UTF-8">
<div class="container">		
	<h2>ERP Unbosque</h2>		
	<?php include("menus.php"); ?> 
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
							<h3 class="panel-title">Gestion de proveedores</h3>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-4 col-xs-6" align="right">
							<button type="button" name="add" id="addSupplier" data-toggle="modal" data-target="#userModal" class="btn btn-success btn-xs">Agregar</button>
						</div>
					</div>					   
					<div class="clear:both"></div>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-12 table-responsive">
							<table id="supplierList" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>ID</th>										
										<th>Nombre</th>
										<th>Celular</th>
										<th>Dirección</th>
										<th>Estado</th>										
										<th>Editar</th>
										<th>Eliminar</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
        <div id="supplierModal" class="modal fade">
        	<div class="modal-dialog">
        		<form method="post" id="supplierForm">
        			<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title"><i class="fa fa-plus"></i> Agregar proveedor</h4>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label>Nombre</label>
								<input type="text" name="supplier_name" id="supplier_name" class="form-control" required />
							</div>	
							<div class="form-group">
								<label>Celular</label>
								<input type="text" name="mobile" id="mobile" class="form-control" required />
							</div>								
							<div class="form-group">
								<label>Dirección</label>
								<textarea name="address" id="address" class="form-control" rows="5" required></textarea>
							</div>
						</div>
						<div class="modal-footer">
							<input type="hidden" name="supplier_id" id="supplier_id" />
							<input type="hidden" name="btn_action" id="btn_action" />
							<input type="submit" name="action" id="action" class="btn btn-info" value="addSupplier" />
							<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						</div>
					</div>
        		</form>
        	</div>
        </div>	
	</div>	
</div>	
<?php include('inc/footer.php');?>