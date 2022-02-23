<?php 
  include("db_connection.php");
  if (!isset($_SESSION['type'])) {
    header("location:index.php");
  }
  //Function
  include("function.php");
?>
<!-- Add Dashboard Parent File -->
<?php require 'dashboard_parent_file.php';?>
 <!-- HTML and Head Taq Section -->
<?php echo $html_and_head_section; ?>
      <!-- Body and Header Section -->
       <?php echo $body_and_header_section_start; ?>
    <!-- Navigation Menu Bar -->
    <?php include("navigation_bar_menu.php"); ?>
    <?php echo $body_and_header_section_end; ?>
      <!-- Side Navbar Section -->
    <?php echo $side_nabar_and_content_inner_section; ?>
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Donation Information</h2>
            </div>
          </header>
          <!-- Dashboard Counts Section-->
          <section class="dashboard-counts no-padding-bottom">
            <div class="container-fluid">
              <!-- Alert Section -->     
              <p id="alert_action" class="mb-0"></p>     
              <!-- Table Section -->
               <div class="row border">
                <div class="col p-1" >Donation List</div>
                <div class="col p-1" align="right">
                  <button class="btn btn-primary btn-sm launch-modal" data-toggle="modal" data-target="#donation_modal" id="add_button"><i class="fas fa-plus-square"></i> Add Donation</button>
                </div>
               </div>
              <div class="row bg-light border border-top-0 p-2">
                  <div class="table-responsive">
                    <table id="donation_data_table" class="table table-bordered table-hover table-striped table-sm" >
                      <thead class="thead-dark">
                        <tr>
                          <th width="5%">SL</th>
                          <th width="15%">Doner ID Num</th>
                          <th width="20%">Donner Name</th>
                          <th width="5%">Bld Grp</th>
                          <th width="15%">Patient Name</th>
                          <th width="15%">Donation Date</th>
                          <th width="15%">Entered By</th>
                          <th width="10%">Action</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
               </div>
            </div>
            <div class="modal fade" id="donation_modal">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                        <form method="post" id="donation_form" name="donation_form" novalidate>
                            <div class="modal-header">
                              <h6 class="modal-title"></h6>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                              <div class="form-row  p-1">
                                <div class="col">
                                  <label for='donner_id'>Donner ID Number<span class="text-red">*</span></label>
                                  <select class="form-control selectpicker border form-control-sm" name="donner_id" id="donner_id" data-live-search="true" data-size="8" data-live-search-style="startsWith" required='1'>
                                    <option value=''selected="selected">Search Donner ID</option>
                                    <?php echo fill_donner_id_list($pdo_conn);?>
                                  </select> 
                                  <div id="invalid_feedback_donner_id" class="reset_label"></div>                           
                                </div>                          
                                <div class="col">
                                  <label for='donner_name'>Donner Name</label>
                                  <div id="display">
                                    <div id="donner_name"></div>
                                    <div id="no_record">Please Select Donner ID to view Donner Name.</div>
                                  </div>                          
                                </div> 
                              </div> 
                              <div class="form-row p-1">
                                <div class="col">
                                  <label for="donation_patient_name">Patient Name</label>
                                  <input type="text" name="donation_patient_name" id="donation_patient_name" class="form-control form-control-sm">
                                  <div id="invalid_feedback_donation_patient_name" class="reset_label"></div>
                                </div>
                              </div>                                                            
                            </div>                                                                
                              <div class="modal-footer">
                              <input type="hidden" name="donation_id" id="donation_id" >
                              <input type="hidden" name="action_hidden" id="action_hidden" >
                              <input type="submit" name="action_submit" id="action_submit" class="btn btn-primary btn-sm mb-0">
                              <button type="button" class="btn btn-info btn-sm mb-0" class="close" data-dismiss="modal">Close</button>
                              </div>
                            </form>
                        </div>
                    </div>
                </div>
         <!-- Donation View Button Modal -->
         <div id="donation_modal_view" class="modal fade">
          <div class="modal-dialog modal-lg">
              <form method="post" id="donation_view_form">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title">Donation Details Info</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body">
                          <Div id="donation_view_data"></Div>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                      </div>
                  </div>
              </form>
          </div>
        </div>                 
          </section>
          <!-- end Page Side Navbar Content Inner and Page Footer Section-->
    <?php echo $end_page_sidenav_content_footer_section; ?>
    <!-- End Body and HTML TaqJavaScript Section-->
    <?php echo $end_body_html_and_java_script_section; ?>
    <script>
  $(document).ready(function(){
    $('#add_button').click(function(){
      $('#donation_form')[0].reset();
        $('#alert_action').empty();
          $('.modal-title').html("Add Donation Information");
           $('#action_hidden').val('Add');
            $('#action_submit').val('Save');                
    });
    //Insert Data into DB
  $(document).on('submit','#donation_form',function(event){
  event.preventDefault();
        var donner_id = $('#donner_id').val();
        var donation_patient_name = $('#donation_patient_name').val();
         if (donner_id == '') {
          $('#invalid_feedback_donner_id').html('Please Enter Donner Id.').css('color','red');
         }else if (donation_patient_name == '') {
          $('#invalid_feedback_donation_patient_name').html('Please Enter Patient Name.').css('color','red');
          $('#invalid_feedback_donner_id').empty();
        }else{
          var form_data = $(this).serialize();
          $.ajax({
            url:"donation_action.php",
            method: "POST",
            data: form_data,
            success:function(data){
            $('.reset_label').empty();
            $('#donation_modal').modal('hide');
            $('#invalid_feedback_donation_patient_name').empty();
            $('#alert_action').fadeIn().html('<div class="alert alert-success">'+data+'</div>'); 
              dataTable.ajax.reload();
            } 
          });
        }
  });
    // fetch data from database
   var dataTable = $('#donation_data_table').DataTable({
     "processing" : true,
     "serverSide" : true,
     "order": [[ 0, "desc" ]],
     "ajax" : {
      url:"donation_fetch.php",
      type:"POST"   
     },
     "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
    });
  // view data from Database 
$(document).on('click', '.view', function(){
      var donation_id = $(this).attr("id");
      var action_view = 'donation_info_view';
      $.ajax({
          url:"donation_info_view.php",
          method:"POST",
          data:{donation_id:donation_id, action_view:action_view},
          success:function(data){
              $('#donation_modal_view').modal('show');
              $('.modal-title').html('Donation Information');
              $('#donation_view_data').html(data);                 
          }
      });
  }); 
// Update Section
 $(document).on('click', '.update', function(){
  var donation_id = $(this).attr("id");
  var action_hidden = 'fetch_single';
  $.ajax({
   url:"donation_action.php",
   method:"POST",
   data:{donation_id:donation_id,action_hidden:action_hidden},
   dataType:"json",
   success:function(data){
    $('#donation_modal').modal('show');
    $('.modal-title').html("Edit Donation Information");    
    $('#donner_id').val(data.donner_id);
    $('#donation_patient_name').val(data.donation_patient_name);
    $('#donation_id').val(donation_id);
    $('#action_submit').val('Edit');
    $('#action_hidden').val("Edit");
    $('#alert_action').empty();
   }
  });
 });  
});
     // get all records from table via select box
  $("#donner_id").change(function() {    
    var id = $(this).find(":selected").val();
    var dataString = 'donner_id='+ id;    
    $.ajax({
      url: 'get_donner_data.php',
      dataType: "json",
      data: dataString,  
      cache: false,
      success: function(donner_data) {
         if(donner_data) {
          $("#display").show();               
          $("#donner_name").text(donner_data.donner_name);
          $('#no_record').hide();  
        }else {
          $("#display").hide();
          $('#no_record').show();
        }
      } 
    });
  }); 
</script>
