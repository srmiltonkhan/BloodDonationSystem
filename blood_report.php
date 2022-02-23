<?php 
  include("db_connection.php");
  if (!isset($_SESSION['type'])) {
    header("location:index.php");
  }
  //Query from Table
  $query = "SELECT DISTINCT blood_group from donner ORDER BY blood_group";
  $statement = $pdo_conn->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
?>
<!-- Add Dashboard Parent File -->
<?php require 'dashboard_parent_file.php';?>
 <!-- HTML and Head Taq Section -->
<?php echo $html_and_head_section_for_report; ?>
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
              <h2 class="no-margin-bottom">Blood Report</h2>
            </div>
          </header>
                    <!-- Dashboard Counts Section-->
          <section class="dashboard-counts no-padding-bottom">
            <div class="container-fluid">
              <!-- Alert Section -->     
              <p id="alert_action" class="mb-0"></p>     
              <!-- Table Section -->
               <div class="row border">
                  <div class="col p-1" align="center"><h1>Generate Blood Report</h1></div>
               </div>
               <div class="container-fluid border">
                <div class="p-1 mt-1 w-75 mx-auto">
                <div class="form-row input-daterange">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="text" name="start_date" id="start_date" class="form-control form-control-sm" placeholder="Please choose Start Date">
                    </div>
                   </div>
                   <div class="col-sm-6"> 
                    <div class="form-group">
                      <input type="text" name="end_date" id="end_date" class="form-control form-control-sm" placeholder="Please choose End Date">
                    </div>                    
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-sm-6">
                    <select name="blood_group" id="blood_group" class="form-control form-control-sm form-group">
                    <option value="">Search Blood Grouop</option>
                    <?php
                      foreach ($result as $row) {
                       echo'<option value="'.$row['blood_group'].'">'.$row['blood_group'].'</option>';
                      }
                    ?>
                  </select>
                  </div>
                </div>
 
                <div class="form-row">
                   <div class="col-sm-12">
                   <div class="w-50 mx-auto">
                    <div class="form-group">
                      <input type="button" name="search" id="search" value="Search" class="btn btn-info btn-block"/>
                    </div> 
                    </div>                    
                  </div>
                </div>                                 
                </div>
              </div>
              <div class="row bg-light border border-top-0 p-2">
                  <div class="table-responsive">
                    <table id="data_report" class="table table-bordered table-hover table-striped table-sm" >
                      <thead class="thead-dark">
                        <tr>
                          <th width="3%">SL</th>
                          <th width="12%">Donner ID</th>
                          <th width="20%">Donner Name</th>
                          <th width="10%">Mobile Number</th>
                          <th width="5%">Bld Grp</th>
                          <th width="15%">Patient Name</th>
                          <th width="15%">Department</th>
                          <th width="10%">Donation Date</th>
                          <th width="10%">Entered By</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
               </div>
            </div>
          </section>
          <!-- end Page Side Navbar Content Inner and Page Footer Section-->
    <?php echo $end_page_sidenav_content_footer_section; ?>
    <!-- End Body and HTML TaqJavaScript Section-->
    <?php echo $end_body_html_and_java_script_section_for_report; ?>
    <script type="text/javascript">
    $(document).ready(function(){
          $('#form_data').DataTable({
           "processing" : true,
           "serverSide" : true,
           "ajax" : {
            url:"blood_report_fetch.php",
            type:"POST"
           },
           dom: 'lBfrtip',
           buttons: [
            'pdf','excel', 'csv', 'copy','print'
           ],
           "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
          });
      });
    </script>

