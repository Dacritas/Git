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
<script src="js/customer.js"></script>
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
							<h3 class="panel-title">Gestion de clientes</h3>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-4 col-xs-6" align="right">
							<button type="button" name="add" id="addCustomer" data-toggle="modal" data-target="#userModal" class="btn btn-success btn-xs">Agregar</button>
						</div>
					</div>					   
					<div class="clear:both"></div>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-12 table-responsive">
							<table id="customerList" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Cedula</th>										
										<th>Nombre</th>
										<th>Dirección</th>
										<th>Celular</th>
										<th>Balance</th>
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
        <div id="customerModal" class="modal fade">
        	<div class="modal-dialog">
        		<form method="post" id="customerForm">
        			<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title"><i class="fa fa-plus"></i> Añadir cliente</h4>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label>Nombre</label>
								<input type="text" name="cname" id="cname" class="form-control" required />
							</div>
							<div class="form-group">
								<label>Celular</label>
								<input type="number" name="mobile" id="mobile" class="form-control" required />
							</div>
							<div class="form-group">
								<label>Total compra</label>
								<input type="number" name="balance" id="balance" class="form-control" required />
							</div>
							<div class="form-group">
								<label>Dirección</label>
								<textarea name="address" id="address" class="form-control" rows="5" required></textarea>
							</div>
						</div>
						<div class="modal-footer">
							<input type="hidden" name="userid" id="userid" />
							<input type="hidden" name="btn_action" id="btn_action" />
							<input type="submit" name="action" id="action" class="btn btn-info" value="customerAdd" />
							<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						</div>
					</div>
        		</form>
        	</div>
        </div>	
	</div>	
</div>	
<?php include('inc/footer.php');?>