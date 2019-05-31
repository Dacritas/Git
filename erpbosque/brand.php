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
<script src="js/brand.js"></script>
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
                		<div class="col-md-10">
                			<h3 class="panel-title">Gestionar marca</h3>
                		</div>
                		<div class="col-md-2" align="right">
                			<button type="button" name="add" id="addBrand" class="btn btn-success btn-xs">Agregar</button>
                		</div>
                	</div>
                </div>
                <div class="panel-body">
                	<table id="brandList" class="table table-bordered table-striped">
                		<thead>
							<tr>
								<th>ID</th>
								<th>Marca</th>
								<th>Categoria</th>
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
    <div id="brandModal" class="modal fade">
    	<div class="modal-dialog">
    		<form method="post" id="brandForm">
    			<div class="modal-content">
    				<div class="modal-header">
    					<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><i class="fa fa-plus"></i> Agregar marca</h4>
    				</div>
    				<div class="modal-body">
    					<div class="form-group">
    						<select name="categoryid" id="categoryid" class="form-control" required>
								<option value="">Seleccione una categoria</option>
								<?php echo $inventory->categoryDropdownList(); ?>
							</select>
    					</div>
    					<div class="form-group">
							<label>Marca</label>
							<input type="text" name="bname" id="bname" class="form-control" required />
						</div>
    				</div>
    				<div class="modal-footer">
    					<input type="hidden" name="id" id="id" />
    					<input type="hidden" name="btn_action" id="btn_action" />
    					<input type="submit" name="action" id="action" class="btn btn-info" value="Add" />
    					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    				</div>
    			</div>
    		</form>
    	</div>
    </div>
</div>	
<?php include('inc/footer.php');?>