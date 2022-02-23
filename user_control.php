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
              <h2 class="no-margin-bottom">User Information</h2>
            </div>
          </header>
          <!-- Dashboard Counts Section-->
          <section class="dashboard-counts no-padding-bottom">
            <div class="container-fluid">
              <!-- Alert Section -->     
              <p id="alert_action" class="mb-0"></p>     
              <!-- Table Section -->
               <div class="row border">
                <div class="col p-1" >User List</div>
                <div class="col p-1" align="right">
                  <button class="btn btn-primary btn-sm launch-modal" data-toggle="modal" data-target="#user_modal" id="add_button"><i class="fas fa-plus-square"></i> Add User</button>
                </div>
               </div>
              <div class="row bg-light border border-top-0 p-2">
                  <div class="table-responsive">
                    <table id="user_data_table" class="table table-bordered table-hover table-striped table-sm" >
                      <thead class="thead-dark">
                        <tr>
                          <th width="5%">SL</th>
                          <th width="15%">User ID</th>
                          <th width="20%">User Name</th>
                          <th width="12%">Email</th>
                          <th width="13%">Mobile Number</th>
                          <th width="25%">Department Name</th>
                          <th width="10%">Action</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
               </div>
            </div>
            <div class="modal fade" id="user_modal">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                        <form method="post" id="user_form" name="user_form" novalidate>
                            <div class="modal-header">
                              <h6 class="modal-title"></h6>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                         
                            </div>                            
                              <div class="modal-footer">
                              <input type="hidden" name="user_id" id="user_id" >
                              <input type="hidden" name="action_hidden" id="action_hidden" >
                              <input type="submit" name="action_submit" id="action_submit" value="Save" class="btn btn-primary btn-sm mb-0">
                              <button type="button" class="btn btn-info btn-sm mb-0" class="close" data-dismiss="modal" id="close_btn_category">Close</button>
                              </div>
                            </form>
                        </div>
                    </div>
                </div>
          </section>
          <!-- end Page Side Navbar Content Inner and Page Footer Section-->
    <?php echo $end_page_sidenav_content_footer_section; ?>
    <!-- End Body and HTML TaqJavaScript Section-->
    <?php echo $end_body_html_and_java_script_section; ?>
<script>
  
</script>
