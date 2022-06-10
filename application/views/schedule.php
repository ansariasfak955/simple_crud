 <?php include ('include/header.php'); ?>
 <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets_pages/vendor_components/date-paginator/bootstrap-datepaginator.min.css">
 <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets_pages/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
 <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets_pages/vendor_components/bootstrap-daterangepicker/daterangepicker.css">
 <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets_pages/calendar/main.css">
 <script src="<?= base_url()?>assets_pages/calendar/main.js"></script>
 <div class="content-wrapper">
   <div class="container-full">
     <!-- Content Header (Page header) -->
     <div class="content-header">
       <div class="d-flex align-items-center">
         <div class="w-100s">
           <h4 class="page-title">Schedules</h4>
           <div class="haff-widgets">

           </div>
         </div>
       </div>
     </div>
     <!-- Main content -->
     <!-- Main content -->
     <section class="content room_feed">
       <form>
         <div class="row ">
           <div class="col-lg-12">
             <div class="card">
               <div class="card-body">
                 <div class="row">

                   <div class="col-lg-3 col-md-4 col-sm-6">
                     <div class="form-group">
                       <div class="input-group input--style">
                         <div class="input-group-addon">
                           <i class="fa-regular fa-calendars"></i>
                         </div>
                         <input type="text" class="form-control pull-right" id="datepicker" placeholder="From Date" autocomplete="off">
                       </div>
                     </div>
                   </div>

                   <div class="col-lg-3 col-md-4 col-sm-6">
                     <div class="form-group">
                       <div class="input-group input--style">
                         <div class="input-group-addon">
                           <i class="fa-regular fa-calendars"></i>
                         </div>
                         <input type="text" class="form-control pull-right" id="todatepicker" placeholder="To Date" autocomplete="off">
                       </div>
                     </div>
                   </div>

                   <!--<div class="col-lg-4 col-md-4 col-sm-6" style = "margin-top: -10px;">
                        <label for="addroom">Select Class Name</label>
                        <select name ='class_id' class ='form-control fClass_id'>
                        <?php if(isset($class_list) && count($class_list)>0 ){ 
                                foreach($class_list as $val){ ?>
                                <option value ="<?= $val->class_id ?>"><?= $val->name ?></option>
                          <?php }} ?>  
                    </select>
                   
                   </div>-->
                   <div class="col-lg-2 col-md-4 col-sm-6">
                     <button type="Submit" class="btn btn-primary waves-effect mt-5">Submit</button>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </form>
       <div class="row">
         <div class="col-12">
           <div class="header_staff">
             <div class="row">
               <div class="col-lg-6">

               </div>
               <div class="col-lg-6 text-end">
                 <a href="schedule_student.php" class="btn btn-primary mt-10 mr--1 waves-effect">+ Staff Schedule</a>
                 <a href="schedule_student.php" class="btn btn-primary mt-10  mr--1 waves-effect">+ Student Schedule</a>
                 <a href="#" class="btn btn-light mt-10 waves-effect"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                     <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"></path>
                     <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"></path>
                   </svg> Print</a>
               </div>
             </div>
           </div>
           <div class="box">
             <div class="box-body">
              <div id='calendar'></div>
              
             </div>
           </div>
         </div>
       </div>
     </section>

     <?php include ('include/footer.php'); ?>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
     <script src="<?= base_url()?>assets_pages/js/bootstrap-select.js"></script>
     <script src="<?= base_url()?>assets_pages/vendor_components/datatable/datatables.min.js"></script>
     <script src="<?= base_url()?>assets_pages/src/js/pages/data-table.js"></script>
     <script src="<?= base_url()?>assets_pages/vendor_components/bootstrap-daterangepicker/daterangepicker.js"></script>
     <script src="<?= base_url()?>assets_pages/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

     <script type="text/javascript">
       //Date picker
       $('#datepicker').datepicker({
         autoclose: true
       });
       //Date picker
       $('#todatepicker').datepicker({
         autoclose: true
       });

     </script>

     <script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
     //////////////////////////////
      var decodedString = atob("<?= base64_encode($event_list) ?>");
      var ids =   $.parseJSON(decodedString) ; 
      console.log(ids); 
   //////////////////   
     
     ///////////////////////////////////
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
            console.log(arg); 
            m_fun(title,arg.startStr);
            
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
        {           delete_data(arg.event._def.extendedProps.ss_id);      // arg._def.extendedProps.ss_id
          arg.event.remove();
        }
      },
      editable: true,
      dayMaxEvents: true, // allow "more" link when too many events
    //   events: [
    //     {
    //       title: 'Staff Metting',
    //       start: '2022-05-10'
    //     },
    //   ]
   
     events: ids

    });

    calendar.render();
  });

    function m_fun(title,dates){
      
     
         $.ajax({ 
                    type: "POST",
                    url: "<?= base_url('Staff/add_schedule') ?>",
                    data: {title : title,date :dates},
                    async:false,
                     success: function(data){
                              var res = $.parseJSON(data);
                              console.log(res); 
                              
                     }
                 });
            }
  
   function delete_data(id){
        console.log('delete_data is call '); 
         
        if(id > 0){
                     $.ajax({  type: "POST",
                                url: "<?= base_url('Staff/delete_schedule') ?>",
                                data: {id:id},
                                async:false,
                                 success: function(data){
                                          var res = $.parseJSON(data);
                                    console.log(res); 
                                     }
                              });
                        }   
            }
</script>
