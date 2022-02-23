<?php 
  include("db_connection.php");
  if (!isset($_SESSION['type'])) {
    header("location:index.php");
  }
  //Total Users
  $query_count = "SELECT COUNT(`user_id`) AS total from user_details";
  $statement = $pdo_conn->prepare($query_count);
  $statement->execute();
  $result = $statement->fetch();
  $total_users = $result['total'];
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
              <h2 class="no-margin-bottom">Dashboard</h2>
            </div>
          </header>
          <!-- Dashboard Counts Section-->
          <section class="dashboard-counts no-padding-bottom">
            <div class="container-fluid">
              <div class="row bg-white has-shadow">
                <!-- Item -->
                <div class="col-xl-4 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-violet"><i class="fa fa-users"></i></div>
                    <div class="title"><span>Total<br>Users</span>
                      <div class="progress">
                        <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
                      </div>
                    </div>
                    <div class="number"><strong><?php echo $total_users;?></strong></div>
                  </div>
                </div> 
                <div class="col-xl-4 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-violet"><i class="fa fa-users"></i></div>
                    <div class="title"><span>Total<br>Donners</span>
                      <div class="progress">
                        <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
                      </div>
                    </div>
                    <div class="number"><strong>2</strong></div>
                  </div>
                </div>  
                <div class="col-xl-4 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-violet"><i class="fas fa-address-card"></i></div>
                    <div class="title"><span>Total<br>Donations</span>
                      <div class="progress">
                        <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
                      </div>
                    </div>
                    <div class="number"><strong>2</strong></div>
                  </div>
                </div>                                                          
              </div>
            </div>
          </section>
          <!-- end Page Side Navbar Content Inner and Page Footer Section-->
    <?php echo $end_page_sidenav_content_footer_section; ?>
    <!-- End Body and HTML TaqJavaScript Section-->
    <?php echo $end_body_html_and_java_script_section; ?>

