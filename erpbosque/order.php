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
<script src="js/order.js"></script>
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
                            	<h3 class="panel-title">Gestionar pedidos</h3>
                            </div>
                        
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6" align='right'>
                                <button type="button" name="add" id="addOrder" class="btn btn-success btn-xs">Agregar</button>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row"><div class="col-sm-12 table-responsive">
                            <table id="orderList" class="table table-bordered table-striped">
                                <thead><tr>
                                    <th>ID</th>      
									<th>Producto</th>	
									<th>Total Item</th> 
									<th>Cliente</th> 									
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </tr></thead>
                            </table>
                        </div></div>
                    </div>
                </div>
			</div>
		</div>

        <div id="orderModal" class="modal fade">
            <div class="modal-dialog">
                <form method="post" id="orderForm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><i class="fa fa-plus"></i> Agregar pedidos</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nombre producto</label>
                                <select name="product" id="product" class="form-control" required>
                                    <option value="">Seleccione un producto</option>
                                    <?php echo $inventory->productDropdownList();?>
                                </select>
                            </div>
							 <div class="form-group">
                                <label>Total Item</label>
                                <div class="input-group">
                                    <input type="text" name="shipped" id="shipped" class="form-control" required />        
                                </div>
                            </div> 
							<div class="form-group">
                                <label>Cliente</label>
                                <select name="customer" id="customer" class="form-control" required>
                                    <option value="">Seleccione cliente</option>
                                    <?php echo $inventory->customerDropdownList();?>
                                </select>
                            </div>	
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="order_id" id="order_id" />
                            <input type="hidden" name="btn_action" id="btn_action" />
                            <input type="submit" name="action" id="action" class="btn btn-info" value="Add" />
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div id="productViewModal" class="modal fade">
            <div class="modal-dialog">
                <form method="post" id="product_form">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><i class="fa fa-plus"></i> Detalles del producto</h4>
                        </div>
                        <div class="modal-body">
                            <Div id="productDetails"></Div>
                        </div>
                        <div class="modal-footer">
                            
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
	
</div>	
<?php include('inc/footer.php');?>