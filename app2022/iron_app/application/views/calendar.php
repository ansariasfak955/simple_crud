<script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
 
   /////////////////// 
     var decodedString = atob("<?= base64_encode($cal_list) ?>");
      var ids =   $.parseJSON(decodedString) ; 
      console.log(ids); 
   //////////////////   
  
    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
      },
         // initialDate: '2022-09-12',
      navLinks: true, // can click day/week names to navigate views
      selectable: true,
      selectMirror: true,
      select: function(arg) {
        var title = prompt('Title:');
        if (title) {
            my_fun(title,arg.startStr);
            console.log(title); 
            console.log('jk fun call - 2  '); 
          console.log(arg); 
            
          calendar.addEvent({
            title: title,
            start: arg.start,
            end: arg.end,
            allDay: arg.allDay
          })
        }
        calendar.unselect()
      },
      eventClick: function(arg) {
        if (confirm('Are you sure you want to delete this event?')) 
        {
          arg.event.remove()
        }
      },
      editable: true,
      dayMaxEvents: true, // allow "more" link when too many events
    //   events: [
    //     {
    //       title: 'Staff Metting',
    //       start: '2022-04-10'
    //     },
    //   ]
   
      events : ids                 
  
      
    });

    calendar.render();
  });
    


</script>




 <style>
.showthis {
  display: none;
}





.fc-view-harness-active
{
    height: 985.926px !important;
}
.fc-col-header 
{
    width: 1166px !important;
}
.fc-scrollgrid-sync-table
{
     width: 100% !important;
      height: 959px !important;
}
.fc-daygrid-body
{
 width: 100% !important;   
}

.fc .fc-scrollgrid-section table {
    height: 1px;
    width: 100% !important;
}
.rowset
{
        align-items: center;
    margin-bottom: 2rem;
    border-bottom: 1px solid #dddddd70;
    padding-bottom: 1rem;
}

 </style>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
     <?php include('header.php');?>
     

     
<link rel="stylesheet" type="text/css" href="https://cws.in.net/iron_gate/admin/assets/calendar/main.css">
<script src="https://cws.in.net/iron_gate/admin/assets/calendar/main.js"></script> 
     
     
   <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Calendar</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>Home">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Calendar</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!--<div class="col-7 align-self-center">-->
                    <!--    <a href="<?php echo base_url();?>Product"><button class="btn btn-info" style="float:right;">View Promocodes</button></a>-->
                    <!--</div>-->
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- row -->
                
             
               
                <div class="row">
                    <div class="col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                
                                   <!-- <from>
                <div class="row rowset">
                   
                        <div class="col-sm-12 col-md-4">
                          <div class="form-group">
                          <label for="inputfname" class="control-label col-form-label">From Date </label>
                        <input type="date" name="tit" class="form-control" id="" placeholder="" required="">
                       </div>
                        </div>
                        
                         <div class="col-sm-12 col-md-4">
                          <div class="form-group">
                          <label for="inputfname" class="control-label col-form-label">To Date </label>
                        <input type="date" name="" class="form-control" id="" placeholder="" required="">
                       </div>
                        </div>
                        
                        <div class="col-lg-4">
                         <button type="submit" name="submit" class="btn btn-info waves-effect waves-light">Submit</button>
                             
                        </div>
                  
                </div>
                  </from>-->
                             <div id='calendar'></div> 
                            </div>
							
                            <hr>
                        
                        </div>
                    </div>
                </div>
                <!-- End row -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
  <?php include('footer.php');?>

</body>
<script>
    function my_fun(title,date){
       // alert( title+ " ==jk my_fun call =="+date);
        
      $.ajax({
	    		type:'post',
	    		url:"<?= base_url("Home/add_calendar_data") ?>",
	    		data:{ title : title, date : date },
	    		async: false,
	    		success : function(data){
	                   console.log(data);
	                     
	                 }
	    	}); 
	    	
	  
    }
</script>

</html>