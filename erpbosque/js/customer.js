$(document).ready(function(){
	$('#addCustomer').click(function(){
		$('#customerModal').modal('show');
		$('#customerForm')[0].reset();
		$('.modal-title').html("<i class='fa fa-plus'></i> Agregar comprador");
		$('#action').val("Agregar");
		$('#btn_action').val("Agregar");
	});
	var userdataTable = $('#customerList').DataTable({
		"lengthChange": false,
		"processing": true,
		"serverSide": true,
		"order": [],
		"ajax":{
			url:"action.php",
			type:"POST",
			data:{action:'customerList'},
			dataType:"json"
		},
		"columnDefs":[
			{
				"target":[4,5],
				"orderable":false
			}
		],
		"pageLength": 25
	});
	
	$(document).on('submit', '#customerForm', function(event){
		event.preventDefault();
		$('#action').attr('disabled','disabled');
		var formData = $(this).serialize();
		$.ajax({
			url:"action.php",
			method:"POST",
			data:formData,
			success:function(data) {
				$('#customerForm')[0].reset();
				$('#customerModal').modal('hide');
				$('#alert_action').fadeIn().html('<div class="alert alert-success">'+data+'</div>');
				$('#action').attr('disabled', false);
				userdataTable.ajax.reload();
			}
		})
	});
	
	$(document).on('click', '.update', function(){
		var userid = $(this).attr("id");
		var btn_action = 'getCustomer';
		$.ajax({
			url:"action.php",
			method:"POST",
			data:{userid:userid, btn_action:btn_action},
			dataType:"json",
			success:function(data) {
				$('#customerModal').modal('show');
				$('#cname').val(data.name);
				$('#mobile').val(data.mobile);
				$('#balance').val(data.balance);
				$('#address').val(data.address);
				$('.modal-title').html("<i class='fa fa-pencil-square-o'></i> Edit Customer");
				$('#userid').val(userid);
				$('#action').val('customerUpdate');
				$('#btn_action').val('customerUpdate');				
			}
		})
	});
	
	$(document).on('click', '.delete', function(){
		var userid = $(this).attr("id");		
		var btn_action = "customerDelete";
		if(confirm("Are you sure you want to delete this customer?")) {
			$.ajax({
				url:"action.php",
				method:"POST",
				data:{userid:userid, btn_action:btn_action},
				success:function(data) {
					$('#alert_action').fadeIn().html('<div class="alert alert-info">'+data+'</div>');
					userdataTable.ajax.reload();
				}
			})
		} else {
			return false;
		}
	});
	
});