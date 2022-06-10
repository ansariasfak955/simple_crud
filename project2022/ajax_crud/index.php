<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            font-family: arial;
            background: #b2bec3;
            padding: 0;
            margin: 0;
        }
        h1{
            text-align: center;
            margin: 15px;
        }
        #main{
            width: 800px;
            margin: 0 auto;
            background: white;
            font-size: 19px;
        }
        #header{
            background: #f7d794;
        }
        #table-form{
            background: #55efc4;
            padding: 20px 10px;
        }
        #table-data{
            padding: 15px;
            height: 500px;
            vertical-align: top;
        }
        #table-data th{
            background: #74b9ff;
        }
        #table-data tr:nth-child(odd){
            background: #ecf0f1;
        }
        #success-message{
            background: #DEF1D8;
            color: green;
            padding: 10px;
            margin: 10px;
            display: none;
            position: absolute;
            right: 15px;
            top: 15px;
        }
        #error-message{
            background: #EFDCDD;
            color: red;
            padding: 10px;
            margin: 10px;
            display: none;
            position: absolute;
            right: 15px;
            top: 15px;
        }
        .delete-btn{
            background-color: red;
            color: #fff;
            border: 0;
            padding: 4px 10px;
            border-radius: 3px;
            cursor: pointer;
        }
        .edit-btn{
            background-color: red;
            color: #fff;
            border: 0;
            padding: 4px 10px;
            border-radius: 3px;
            cursor: pointer;
        }
        #modal{
            background: rgba(0,0,0,0.7);
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            z-index: 100;
            display: none;
        }
        #modal-form{
            background: #fff;
            width: 40%;
            position: relative;
            top: 20%;
            left: calc(50% - 20%);
            padding: 15px;
            border-radius: 4px;
        }
        #modal-form h2{
            margin: 0 0 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #000;
        }
        #close-btn{
            background: red;
            color: white;
            width: 30px;
            height: 30px;
            line-height: 30px;
            text-align: center;
            border-radius: 50%;
            position: absolute;
            top: -15px;
            right: -15px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <table id="main" border="0" cellspacing="0">
        <tr>
            <td id=header>
                <h1>Add Records with PHP & Ajax</h1>
            </td>
        </tr>
        <tr>
            <td id="table-form">
                <form id="addForm">
                First Name : <input type="text" id="fname">
                Last Name : <input type="text" id="lname"><br>
                Contact : <input type="number" id="num">
                Email : <input type="email" id="userEmail">
                <input type="submit" id="save-button" value="Save">
                </form>
            </td>
        </tr>
        <tr>
            <td id="table-data">
            </td>
        </tr>
    </table>
    <div id="error-message"></div>
    <div id="success-message"></div>
    <div id="modal">
        <div id="modal-form">
            <h2>Edit Form</h2>
            <table cellpadding="10px" width="100%">
                
            
            </table>
            <div id="close-btn">X</div>
        </div>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        // Load Table Records
        function loadTable(){
            $.ajax({
                url:"insert.php",
                type:"post",
                success : function(data){
                    $("#table-data").html(data);
                }
            });
        }
        loadTable();

        // Insert New Records
        $("#save-button").on("click",function(e){


            e.preventDefault();
            var fname = $("#fname").val();
            var lname = $("#lname").val();
            var num = $("#num").val();
            var userEmail = $("#userEmail").val();
            if(fname == "" || lname == "" || num == "" || userEmail == ""){
                $("#error-message").html("All fields are required.").slideDown();
                $("#success-message").slideUp();
            }else{
                $.ajax({
               url : "ajax-insert.php",
               type : "POST",
               data : {first_name:fname, last_name:lname, contact:num, email:userEmail},
               success : function(data){
                   if(data == 1){
                    loadTable();
                    $("#addForm").trigger("reset");
                        $("#success-message").html("Data Inserted Successful").slideDown();
                        $("#error-message").slideUp();
                   }else{
                       alert("");
                       $("#error-message").html("cant save record.").slideDown();
                       $("#success-message").slideUp();
                   }
                
               } 
            });
            }
        
        });
       
        //Delete Records
        $(document).on("click",".delete-btn", function(){
            if(confirm("Do You really want to delete this record ?")){

            var studentId = $(this).data("id");
            var element = this;
            //alert(studentId);
            $.ajax({
                url: "delete.php",
                type: "POST",
                data: {id : studentId},
                success : function(data){
                    if(data == 1){
                        $(element).closest("tr").fadeOut();
                    }else{
                        $("#error-message").html("Can't Delete Record.").slideDown();
                        $("#success-message").slideUp();
                    }
                }
            });
        }
        });

        //Show Modal Box
        $(document).on("click",".edit-btn", function(){
            $("#modal").show();
            var studentId = $(this).data("eid")
            //alert(studentId);

            $.ajax({
                url: "update.phpr",
                type : "POST",
                data: {id : studentId},
                success: function(data){
                    $("#modal-form table").html(data);
                }
            })
        });

        //Hide Modal Box
        $("#close-btn").on("click",function(){
            $("#modal").hide();
        });

        //Save Update From
        $(document).on("click","#edit-submit", function(){
            var stuId = $("#edit-id").val();
            //alert (stuId);
            var fname = $("#edit-fname").val();
            var lname = $("#edit-lname").val();

            $.ajax({
                url: "ajax-update-form.php",
                type: "POST",
                data: {id : stuId, first_name : fname, last_name : lname},
                success: function(data){
                     if(data == 1){
                         $("#modal").hide();
                         loadTable();
                     }
                }
            })
        });
    });
</script>
</body>
</html>