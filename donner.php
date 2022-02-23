<?php 
  include("db_connection.php");
  if (!isset($_SESSION['type'])) {
    header("location:index.php");
  }
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
              <h2 class="no-margin-bottom">Donner Information</h2>
            </div>
          </header>
          <!-- Dashboard Counts Section-->
          <section class="dashboard-counts no-padding-bottom">
            <div class="container-fluid">
              <!-- Alert Section -->     
              <p id="alert_action" class="mb-0"></p>     
              <!-- Table Section -->
               <div class="row border">
                <div class="col p-1" >Donner List</div>
                <div class="col p-1" align="right">
                  <button class="btn btn-primary btn-sm launch-modal" data-toggle="modal" data-target="#donner_modal" id="add_button"><i class="fas fa-plus-square"></i> Add Donner</button>
                </div>
               </div>
              <div class="row bg-light border border-top-0 p-2">
                  <div class="table-responsive">
                    <table id="donner_data_table" class="table table-bordered table-hover table-striped table-sm" >
                      <thead class="thead-dark">
                        <tr>
                          <th width="5%">SL</th>
                          <th width="12%">Donner ID</th>
                          <th width="15%">Donner Name</th>
                          <th width="10%">Phone Number</th>
                          <th width="17%">Blood Group</th>
                          <th width="18%">Department Name</th>
                          <th width="13%">Reg. Date</th>
                          <th width="10%">Action</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
               </div>
            </div>
            <div class="modal fade" id="donner_modal">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                        <form method="post" id="donner_form" name="donner_form" novalidate>
                            <div class="modal-header">
                              <h6 class="modal-title"></h6>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                               <div class="form-row">
                                 <div class="col">
                                   <label for="donner_id_num"> Donner Id Number</label>
                                   <input type="text" name="donner_id_num" id="donner_id_num" class="form-control form-control-sm">
                                   <div id="invalid_feedback_donner_id_num" class="reset_label"></div>
                                 </div>                               
                               </div>
                               <div class="form-row">
                                  <div class="col">
                                   <label for="donner_name"> Donner Name</label>
                                   <input type="text" name="donner_name" id="donner_name" class="form-control form-control-sm">
                                   <div id="invalid_feedback_donner_name" class="reset_label"></div>
                                 </div>                                 
                               </div>
                               <div class="form-row">
                                 <div class="col">
                                   <label for="mobile_number">Phone Number</label>
                                   <input type="email" name="mobile_number" id="mobile_number" class="form-control form-control-sm">
                                   <div id="invalid_feedback_mobile_number" class="reset_label"></div>
                                 </div>
                                  <div class="col">
                                   <label for="email_address">Email Address</label>
                                   <input type="email" name="email_address" id="email_address" class="form-control form-control-sm">
                                   <div id="invalid_feedback_email_address" class="reset_label"></div>
                                 </div>  
                                  </div> 
                                <div class="form-row">
                                 <div class="col">
                                   <label for="blood_group">Blood Group</label>
                                     <select id="blood_group" name="blood_group" class="form-control form-control-sm">
                                       <option value="">Choose Blood Group</option>
                                       <option value="A+">A+</option>
                                       <option value="A-">A-</option>
                                       <option value="B+">B+</option>
                                       <option value="B-">B-</option>
                                       <option value="AB+">AB+</option>
                                       <option value="AB-">AB-</option>
                                       <option value="O+">O+</option>
                                       <option value="O-">O-</option>
                                     </select>
                                   <div id="invalid_feedback_blood_group" class="reset_label"></div>
                                 </div>  
                               </div>
                               <div class="form-row">
                                  <div class="col">
                                   <label for="department_name">Department</label>
                                   <input type="text" name="department_name" id="department_name" class="form-control form-control-sm">
                                   <div id="invalid_feedback_department" class="reset_label"></div>
                                 </div>                                  
                               </div>
                                <div class="form-row">
                                 <div class="col">
                                   <label for="donner_present_address">Present Address</label>
                                  <textarea id="donner_present_address" name="donner_present_address" class="form-control form-control-sm"></textarea>
                                   <div id="invalid_feedback_present_address" class="reset_label"></div>
                                 </div>
                                  <div class="col">
                                   <label for="donner_parmanent_address">Parmanent Address</label>
                                   <textarea id="donner_parmanent_address" name="donner_parmanent_address" class="form-control form-control-sm"></textarea>
                                   <div id="invalid_feedback_parmanent_address" class="reset_label"></div>
                                 </div>   
                               </div>                                                               
                          
                            </div>                                                                
                              <div class="modal-footer">
                              <input type="hidden" name="donner_id" id="donner_id" >
                              <input type="hidden" name="action_hidden" id="action_hidden" >
                              <input type="submit" name="action_submit" id="action_submit" class="btn btn-primary btn-sm mb-0">
                              <button type="button" class="btn btn-info btn-sm mb-0" class="close" data-dismiss="modal" id="close_btn_category">Close</button>
                              </div>
                            </form>
                        </div>
                    </div>
                </div>
        <!-- Donner View Button Modal -->
         <div id="donner_modal_view" class="modal fade">
          <div class="modal-dialog modal-lg">
              <form method="post" id="donner_view_form">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title">Donner Details Info</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body">
                          <Div id="donner_view_data"></Div>
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
      $('#donner_form')[0].reset();
        $('#alert_action').empty();
          $('.modal-title').html("Add Donner");
           $('#action_hidden').val('Add');
            $('#action_submit').val('Save');                
    });
    //Insert Data into DB
  $(document).on('submit','#donner_form',function(event){
  event.preventDefault();
        var donner_id_num = $('#donner_id_num').val();
        var donner_name = $('#donner_name').val();
        var mobile_number = $('#mobile_number').val();
        var email_address = $('#email_address').val();
        var blood_group = $('#blood_group').val();
        var department_name = $('#department_name').val();
        var donner_present_address = $('#donner_present_address').val();
        var donner_parmanent_address = $('#donner_parmanent_address').val();
        if (donner_id_num == '') {
          $('#invalid_feedback_donner_id_num').html('Please Enter Donner ID Number.').css('color','red');
        }else if(donner_name == ''){
          $('#invalid_feedback_donner_name').html('Please Enter Donner Name.').css('color','red');
          $('#invalid_feedback_donner_id_num').empty();
        }else if (mobile_number == '') {
          $('#invalid_feedback_mobile_number').html('Please Enter Phone Number.').css('color','red');
          $('#invalid_feedback_donner_name').empty();
        }else if (email_address == '') {
          $('#invalid_feedback_email_address').html('Please Enter Email Address.').css('color','red');
          $('#invalid_feedback_mobile_number').empty();
        }else if(blood_group == ''){
          $('#invalid_feedback_blood_group').html('Please Select Blood Group.').css('color','red');
          $('#invalid_feedback_email_address').empty();
        }else if (department_name == '') {
          $('#invalid_feedback_department').html('Please Select Department Name.').css('color','red');
          $('#invalid_feedback_blood_group').empty();
        } else if (donner_present_address == '') {
          $('#invalid_feedback_present_address').html('Please Enter Donner Present Address.').css('color','red');
          $('#invalid_feedback_department').empty();
        } else if (donner_parmanent_address == '') {
          $('#invalid_feedback_parmanent_address').html('Please Enter Donner Parmanent Address.').css('color','red');
          $('#invalid_feedback_present_address').empty();
        } else{
          var form_data = $(this).serialize();
          $.ajax({
            url:"donner_action.php",
            method: "POST",
            data: form_data,
            success:function(data){
            $('#invalid_feedback_parmanent_address').empty(); 
            $('.reset_label').empty();
            $('#donner_modal').modal('hide');
            $('#alert_action').fadeIn().html('<div class="alert alert-success">'+data+'</div>'); 
             dataTable.ajax.reload();      
            } 
          });
        }
  });
    // fetch data from database
     var dataTable = $('#donner_data_table').DataTable({
       "processing" : true,
       "serverSide" : true,
       "order": [[ 0, "desc" ]],
       "ajax" : {
        url:"donner_fetch.php",
        type:"POST"
            
       },
       "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
      });
  // view data from Database 
  $(document).on('click', '.view', function(){
      var donner_id = $(this).attr("id");
      var action_view = 'donner_info_view';
      $.ajax({
          url:"donner_info_view.php",
          method:"POST",
          data:{donner_id:donner_id, action_view:action_view},
          success:function(data){
              $('#donner_modal_view').modal('show');
              $('.modal-title').html('Donner Information');
              $('#donner_view_data').html(data);                 
          }
      })
  });       
// Update Section
 $(document).on('click', '.update', function(){
  var donner_id = $(this).attr("id");
  var action_hidden = 'fetch_single';
  $.ajax({
   url:"donner_action.php",
   method:"POST",
   data:{donner_id:donner_id, action_hidden:action_hidden},
   dataType:"json",
   success:function(data){
    $('#donner_modal').modal('show');
    $('.modal-title').html("Edit Donner Information");    
    $('#donner_id_num').val(data.donner_id_num);
    $('#donner_name').val(data.donner_name);
    $('#mobile_number').val(data.mobile_number);
    $('#email_address').val(data.email_address);
    $('#blood_group').val(data.blood_group);
    $('#department_name').val(data.department_name);
    $('#donner_present_address').val(data.donner_present_address);
    $('#donner_parmanent_address').val(data.donner_parmanent_address);
    $('#donner_id').val(donner_id);
    $('#action_submit').val('Edit');
    $('#action_hidden').val("Edit");
    $('#alert_action').empty();
   }
  });
 });   
});
</script>
