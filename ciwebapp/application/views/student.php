
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
  <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css'?>">
  <style>
        body{
            padding: 0px;
            margin: 0px;
        }
        .register{
            background: #f7f7f7;
        }
        .themetext{
            color: #fbaf0c;
        }
        .sectionTitle{
            margin: 0px auto;
            padding: 0px;
            text-align: center;
            font-weight: 500;
            padding-bottom: 10px;
            position: relative;
        }
        .sectionTitle::after{
            content: '';
            height: 2px;
            width: 100px;
            background: #fbaf0c;
            display: inline-block;
            position: absolute;
            top: 70px;
            left: calc(50% - 50px);
            box-sizing: border-box;
        }
        .sectionText{
            color: #555;
            font-size: 14px;
            display: block;
            width: 100%;
            max-width: 600px;
            margin: 0px auto;
            margin-bottom: 20px;
            text-align: center;
            font-family: 'Verela Round', sans-serif;
        }
        /* .btn{
            color: white;
            height: 40px;
            width: 150px;
            background: #fbaf0c;
            left: calc(50% - 50px);
        } */
        .close{
                margin-left: 70%;
                color: white;
                padding: 10px;
                background-color: red;
                opacity: 1;
     }
    </style>
</head>
<body>

<div class="container-fluid register">
        <div class="row">
            <div class="form1 ">
                <h3 class="sectionTitle py-4">Register <span class="themetext">With Us</span></h3>
                <p class="sectionText">You are just one step behind to join the Techpile. I promise you to give my best if you will ll be a part of Techpile.</p>
            </div>
        </div>
        <!--start form-->
        <form id="form" method="POST">
            <div class="row justify-content-center" style="font-weight: 500;">
                <div class="col-sm-4">
                    Name :
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name" aria-label="Username" aria-describedby="basic-addon1" required>
                      </div>
                    
                </div> 
                <div class="col-sm-4">
                Email :
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                        <input type="text" name="email" id="email" class="form-control" placeholder="Enter Your Email" aria-label="Username" required aria-describedby="basic-addon1">
                      </div>
                </div>  
            </div>

            <div class="row justify-content-center" style="font-weight: 500;">
                <div class="col-sm-4">
                    Contact :
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                        <input type="number" name="contact" id="contact" class="form-control" required placeholder="Enter Your Number" aria-label="Username" aria-describedby="basic-addon1">
                      </div>
                    
                </div> 
                <div class="col-sm-4">
                Password :
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                        <input type="password" required name="password" id="password" class="form-control" placeholder="Enter Your Password" aria-label="Username" aria-describedby="basic-addon1">
                      </div>
                </div>  
            </div>
            
        
            <div class="row">
                  <div class="col-sm-2"></div>
                  <div class="col-sm-4 py-4">
                    <input type="submit" id="butsave" name="save" value="Update" style="background: #fbaf0c; border: none; color: white; width: 30%; height: 40px; border-radius: 3%;"/>
                </div>   
            </div>
                  <div class="col-sm-4"></div>
                  <div class="col-sm-2"></div>
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
        <th>contact</th>
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
					    <label>contact</label>
					</div>
					<div class="col-md-9">
						<input type="text" name="contact_modal" id="contact_modal" class="form-control-sm" required>
					</div>	
				</div>
				<!--4-->
				<div class="row">
					<div class="col-md-3">
					    <label>password</label>
					</div>
					<div class="col-md-9">
						<input type="text" name="password_modal" id="password_modal" class="form-control-sm" required>
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
                url:"<?php echo base_url("Student/viewajax");?>",
                type:"post",
                success : function(data){
                    $("#table").html(data);
                }
            });
        }
       loadTable();
    

	//    //insert record
	$('body').on ('submit' ,'#form',function(e) {
	e.preventDefault();
			$.ajax({
				    url: "<?php echo base_url("Student/savedata");?>",
                    type: "POST",
                    data:  new FormData(this), 
                    async: false,
                    contentType:false,
                    cache:false,
                    processData:false,
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
	});

	// view record

    $.ajax({
		url: "<?php echo base_url("Student/viewajax");?>",
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
			var contact = button.data('contact');
			var password = button.data('password');
			var modal = $(this);
			modal.find('#name_modal').val(name);
			modal.find('#email_modal').val(email);
			modal.find('#contact_modal').val(contact);
			modal.find('#password_modal').val(password);
			modal.find('#id_modal').val(id);
		});
    });
	$(document).on("click", "#update_data", function() { 
		$.ajax({
			url: "<?php echo base_url("Student/updaterecords");?>",
			type: "POST",
			cache: false,
			data:{
				type: 3,
				id: $('#id_modal').val(),
				name: $('#name_modal').val(),
				email: $('#email_modal').val(),
				contact: $('#contact_modal').val(),
				password: $('#password_modal').val()
			},
			success: function(dataResult){
				var dataResult = JSON.parse(dataResult);
				if(dataResult.statusCode==200){
					$('#update_country').modal().hide();
					alert('Data updated successfully !');
					loadTable();					
				}
			}
		});
	});

	//delete record
    $(document).on("click", ".delete", function() { 
	//alert("Success");
		var $ele = $(this).parent().parent();
		$.ajax({
			url: "<?php echo base_url("Student/deleterecords");?>",
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