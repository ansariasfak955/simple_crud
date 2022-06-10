
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<h1 align="center" class="bg-light py-3">Student Here</h1>
  <h2>Save Data</h2>
	
    <form id="form">
	<div class="form-group">
      <label for="email">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
    </div>
	<div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email">
    </div>
	<div class="form-group">
      <label for="email">Phone:</label>
      <input type="text" class="form-control" id="phone" placeholder="Enter Phone" name="phone">
    </div>
	<div class="form-group">
      <label for="email">City:</label>
      <input type="text" class="form-control" id="city" placeholder="Enter City" name="city">
    </div>
    <button type="submit" class="btn btn-primary" id="butsave">Submit</button>
    </form>
</div>

<br><br>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-12 bg-light">
                    <h1 class="text-center py-4">View Data</h1>
                </div>
            </div>
        </div>
    </div>
	<table class="table table-bordered table-sm" >
    <thead>
      <tr class="text-center">
		<th>Sl No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
		<th>City</th>
		<th>Edit</th>
		<th>Delete</th>
      </tr>
    </thead>
    <tbody id="table">
      
    </tbody>
  </table>
</div>

<!-- Modal Update-->
<div class="modal fade" id="update_country" role="dialog">
		<div class="modal-dialog modal-sm">
		  <div class="modal-content">
			<div class="modal-header" style="color:#fff;background-color: #e35f14;padding:6px;">
			  <h5 class="modal-title"><i class="fa fa-edit"></i> Update</h5>
			 
			</div>
			<div class="modal-body">
			
				<!--1-->
				<div class="row">
					<div class="col-md-3">
					    <label>Name</label>
					</div>
					<div class="col-md-9">
						<input type="text" name="name_modal" id="name_modal" class="form-control-sm" required>
					</div>	
				</div>
			    <!--2-->
				<div class="row">
					<div class="col-md-3">
					    <label>Email</label>
					</div>
					<div class="col-md-9">
						<input type="text" name="email_modal" id="email_modal" class="form-control-sm" required>
					</div>	
				</div>
			    <!--3-->
				<div class="row">
					<div class="col-md-3">
					    <label>Phone</label>
					</div>
					<div class="col-md-9">
						<input type="text" name="phone_modal" id="phone_modal" class="form-control-sm" required>
					</div>	
				</div>
				<!--4-->
				<div class="row">
					<div class="col-md-3">
					    <label>City</label>
					</div>
					<div class="col-md-9">
						<input type="text" name="city_modal" id="city_modal" class="form-control-sm" required>
					</div>	
				</div>
				<input type="hidden" name="id_modal" id="id_modal" class="form-control-sm">
			</div>
			<div class="modal-footer" style="padding-bottom:0px !important;text-align:center !important;">
			<p style="text-align:center;float:center;"><button type="submit" id="update_data" class="btn btn-default btn-sm" style="background-color: #e35f14;color:#fff;">Save</button>
			<button type="button" class="btn btn-default btn-sm" data-dismiss="modal" style="background-color: #e35f14;color:#fff;">Close</button></p>
			
		  </div>
		  </div>
		</div>
	</div>
<!-- Modal End-->

<script>
$(document).ready(function() {

    //Load Table Records
    function loadTable(){
            $.ajax({
                url:"<?php echo base_url("Crud/viewajax");?>",
                type:"post",
                success : function(data){
                    $("#table").html(data);
                }
            });
        }
       loadTable();
    

	   //insert record
	$('#butsave').on('click', function() {
		var name = $('#name').val();
		var email = $('#email').val();
		var phone = $('#phone').val();
		var city = $('#city').val();
		var password = $('#password').val();
		if(name!="" && email!="" && phone!="" && city!=""){
			$("#butsave").attr("disabled", "disabled");
			$.ajax({
				url: "<?php echo base_url("Crud/savedata");?>",
				type: "POST",
				data: {
					type: 1,
					name: name,
					email: email,
					phone: phone,
					city: city
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.status){
						$("#butsave").removeAttr("disabled");
						$('#fupForm').find('input:text').val('');
						$("#success").show();
						$('#success').html('Data added successfully !'); 	
                       window.location.reload();					
					}
					else {
					   alert(dataResult.msg);
					}
					
				}
			});
		}
		else{
			alert('Please fill all the field !');
		}
	});

	// view record

    $.ajax({
		url: "<?php echo base_url("Crud/viewajax");?>",
		type: "POST",
		cache: false,
		success: function(data){
			//alert(data);
			$('#table').html(data); 
		}
	});

	//update record
    $(function () {
		$('#update_country').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget); 
			var id = button.data('id');
			var name = button.data('name');
			var email = button.data('email');
			var phone = button.data('phone');
			var city = button.data('city');
			var modal = $(this);
			modal.find('#name_modal').val(name);
			modal.find('#email_modal').val(email);
			modal.find('#phone_modal').val(phone);
			modal.find('#city_modal').val(city);
			modal.find('#id_modal').val(id);
		});
    });
	$(document).on("click", "#update_data", function() { 
		$.ajax({
			url: "<?php echo base_url("Crud/updaterecords");?>",
			type: "POST",
			cache: false,
			data:{
				type: 3,
				id: $('#id_modal').val(),
				name: $('#name_modal').val(),
				email: $('#email_modal').val(),
				phone: $('#phone_modal').val(),
				city: $('#city_modal').val()
			},
			success: function(dataResult){
				var dataResult = JSON.parse(dataResult);
				if(dataResult.statusCode==200){
					$('#update_country').modal().hide();
					alert('Data updated successfully !');
					location.reload();					
				}
			}
		});
	});

	//delete record
    $(document).on("click", ".delete", function() { 
	//alert("Success");
		var $ele = $(this).parent().parent();
		$.ajax({
			url: "<?php echo base_url("Crud/deleterecords");?>",
			type: "POST",
			cache: false,
			data:{
				type: 2,
				id: $(this).attr("data-id")
			},
			success: function(dataResult){
				alert(dataResult);
				var dataResult = JSON.parse(dataResult);
				if(dataResult.statusCode==200){
                    alert('are you soure delete data');
					$ele.fadeOut().remove();
				}
			}
		});
	});
});
</script>
</body>
</html>