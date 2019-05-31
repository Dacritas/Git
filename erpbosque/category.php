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
<script src="js/category.js"></script>
<script src="js/common.js"></script>
<meta charset="UTF-8">
<div class="container">		
	<h2>ERP Unbosque</h2>  	
	<?php include("menus.php"); ?> 
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
                <div class="panel-heading">
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                        <div class="row">
                            <h3 class="panel-title">Gestionar categoria</h3>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                        <div class="row" align="right">
                             <button type="button" name="add" id="categoryAdd" data-toggle="modal" data-target="#categoryModal" class="btn btn-success btn-xs">Agregar</button>   		
                        </div>
                    </div>
                    <div style="clear:both"></div>
                </div>
                <div class="panel-body">
                    <div class="row">
                    	<div class="col-sm-12 table-responsive">
                    		<table id="categoryList" class="table table-bordered table-striped">
                    			<thead><tr>
									<th>ID</th>
									<th>Nombre categoria</th>
									<th>Estado</th>
									<th>Editar</th>
									<th>Eliminar</th>
								</tr></thead>
                    		</table>
                    	</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="categoryModal" class="modal fade">
    	<div class="modal-dialog">
    		<form method="post" id="categoryForm">
    			<div class="modal-content">
    				<div class="modal-header">
    					<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><i class="fa fa-plus"></i> Agregar categoria</h4>
    				</div>
    				<div class="modal-body">
    					<label>Nombre categoria</label>
						<input type="text" name="category" id="category" class="form-control" required />
    				</div>
    				<div class="modal-footer">
    					<input type="hidden" name="categoryId" id="categoryId"/>
    					<input type="hidden" name="btn_action" id="btn_action"/>
    					<input type="submit" name="action" id="action" class="btn btn-info" value="Añadir" />
    					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    				</div>
    			</div>
    		</form>
    	</div>
    </div>
</div>	
<?php include('inc/footer.php');?>