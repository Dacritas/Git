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
<script src="js/product.js"></script>
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
                            	<h3 class="panel-title">Gestion de producto</h3>
                            </div>
                        
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6" align='right'>
                                <button type="button" name="add" id="addProduct" class="btn btn-success btn-xs">Agregar</button>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row"><div class="col-sm-12 table-responsive">
                            <table id="productList" class="table table-bordered table-striped">
                                <thead><tr>
                                    <th>ID</th>      
									<th>Categoria</th>	
									<th>Marca</th>									
                                    <th>Nombre del producto</th>
									<th>Modelo del producto</th>
                                    <th>Cantidad</th>
                                    <th>Proveedor</th>
                                    <th>Estado</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr></thead>
                            </table>
                        </div></div>
                    </div>
                </div>
			</div>
		</div>

        <div id="productModal" class="modal fade">
            <div class="modal-dialog">
                <form method="post" id="productForm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><i class="fa fa-plus"></i> Agregar producto</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Seleccione una categoria</label>
                                <select name="categoryid" id="categoryid" class="form-control" required>
                                    <option value="">Seleccione una categoria</option>
                                    <?php echo $inventory->categoryDropdownList();?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Seleccione marca</label>
                                <select name="brandid" id="brandid" class="form-control" required>
                                    <option value="">Seleccione marca</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nombre del producto</label>
                                <input type="text" name="pname" id="pname" class="form-control" required />
                            </div>
							<div class="form-group">
                                <label>Modelo del producto</label>
                                <input type="text" name="pmodel" id="pmodel" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label>Descripcion del producto</label>
                                <textarea name="description" id="description" class="form-control" rows="5" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Cantidad de productos</label>
                                <div class="input-group">
                                    <input type="text" name="quantity" id="quantity" class="form-control" required pattern="[+-]?([0-9]*[.])?[0-9]+" /> 
                                    <span class="input-group-addon">
                                        <select name="unit" id="unit" required>
                                            <option value="">Seleccione una unidad</option>
                                            <option value="Bags">Bolsa</option>
                                            <option value="Bottles">Botellas</option>
                                            <option value="Box">Cajas</option>
                                            <option value="Dozens">Docenas</option>
                                            <option value="Feet">Pies</option>
                                            <option value="Gallon">Galones</option>
                                            <option value="Grams">Gramos</option>
                                            <option value="Inch">Pulgadas</option>
                                            <option value="Kg">Kg</option>
                                            <option value="Liters">Litros</option>
                                            <option value="Meter">Metros</option>
                                            <option value="Nos">Nos</option>
                                            <option value="Packet">Paquetes</option>
                                            <option value="Rolls">Fajos</option>
                                        </select>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Precio base</label>
                                <input type="text" name="base_price" id="base_price" class="form-control" required pattern="[+-]?([0-9]*[.])?[0-9]+" />
                            </div>
                            <div class="form-group">
                                <label>Impuesto (%)</label>
                                <input type="text" name="tax" id="tax" class="form-control" required pattern="[+-]?([0-9]*[.])?[0-9]+" />
                            </div>
							<div class="form-group">
                                <label>Proveedor</label>
                                <select name="supplierid" id="supplierid" class="form-control" required>
                                    <option value="">Seleccione un proveedor</option>
                                    <?php echo $inventory->supplierDropdownList();?>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="pid" id="pid" />
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