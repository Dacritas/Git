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
<script src="js/purchase.js"></script>
<script src="js/common.js"></script>
<div class="container">		
	<h2>ERP Unbosque</h2>  
	<?php include("menus.php"); ?> 
	<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
                    <div class="panel-heading">
                    	<div class="row">
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                            	<h3 class="panel-title">Gestionar compra</h3>
                            </div>
                        
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6" align='right'>
                                <button type="button" name="addPurchase" id="addPurchase" class="btn btn-success btn-xs">Agregar</button>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row"><div class="col-sm-12 table-responsive">
                            <table id="purchaseList" class="table table-bordered table-striped">
                                <thead><tr>
                                    <th>ID</th> 									
									<th>Producto</th>	
									<th>Cantidad</th>	
									<th>Proveedor</th>                                           
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </tr></thead>
                            </table>
                        </div></div>
                    </div>
                </div>
			</div>
		</div>

        <div id="purchaseModal" class="modal fade">
            <div class="modal-dialog">
                <form method="post" id="purchaseForm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><i class="fa fa-plus"></i> Agregar compra</h4>
                        </div>
                        <div class="modal-body">                           
                            <div class="form-group">
                                <label>Nombre del producto</label>
                                <select name="product" id="product" class="form-control" required>
                                    <option value="">Seleccione producto</option>
                                    <?php echo $inventory->productDropdownList();?>
                                </select>
                            </div>	                           
                            <div class="form-group">
                                <label>Cantidad de productos</label>
                                <div class="input-group">
                                    <input type="text" name="quantity" id="quantity" class="form-control" required pattern="[+-]?([0-9]*[.])?[0-9]+" />        
                                </div>
                            </div>                           
							<div class="form-group">
                                <label>Proveedor</label>
                                <select name="supplierid" id="supplierid" class="form-control" required>
                                    <option value="">Seleccione proveedor</option>
                                    <?php echo $inventory->supplierDropdownList();?>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="purchase_id" id="purchase_id" />
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