<!-- Side Navbar Items Includes -->
<?php require 'side_nav_item_and_brand_name.php';?>
<?php $html_and_head_section = "
<!DOCTYPE html>
<html lang='en'>
<head>
	<title>KYAU BlOOD DONATION CLUB MANAGEMENT SYSTEM</title>
  <link rel='shortcut icon' href='img/favicon/kyausmsfavicon.ico'>
	<meta charset='utf-16'>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' href='vendor/bootstrap/css/bootstrap.min.css'>
  <link rel='stylesheet' href='css/dataTables.bootstrap4.min.css'>
  <link href='vendor/fontawesome/css/font-awesome.min.css' rel='stylesheet'> 
  <link href='vendor/fontawesome/css/all.css' rel='stylesheet'>
  <link rel='stylesheet' href='css/bootstrap-select.min.css'>
  <link rel='stylesheet' href='css/bootstrap-datepicker.css'>
  <link rel='stylesheet' href='css/style.default.css' id='theme-stylesheet'>
  <link rel='stylesheet' href='css/custom.css'>
  <script src='vendor/jquery/jquery.min.js'></script>
  <script src='js/bootstrap-datepicker.js'></script>
</head>
";
?>
<?php $body_and_header_section_start = "
<body>
      <div class='page'>
      <header class='header fixed-top'>
        <nav class='navbar'>      
          <div class='container-fluid'> 
            <div class='row navbar-holder d-flex align-items-center justify-content-between'> 
                <div class='navbar-header col-3'>
                    <a href='dashboard.php' class='navbar-brand d-none d-sm-inline-block'>
                      <div class='brand-text d-none d-lg-inline-block'><span>$brand_name</span></div>
                    </a>
                    <a id='toggle-btn' href='#'' class='menu-btn active'><span></span><span></span><span></span></a>
                </div>
                <div class='col-7'>
                    <marquee>$header_mqrquee_title</marquee>
                </div>
                ";?>
            <?php $body_and_header_section_end="
            </div>
          </div>
        </nav>
      </header>
      ";
      ?>
      <!-- Side Navbar Section -->
      <?php 
      $side_nabar_and_content_inner_section = "
      <div class='page-content d-flex align-items-stretch page-margin'>
        <nav class='side-navbar fixed-nav'>
          <ul class='list-unstyled'>
            <li><a href='dashboard.php'><i class='fas fa-tachometer-alt fa-lg'></i></i>$dashboard</a></li>
            <li><a href='#misDropdownItem' aria-expanded='false' data-toggle='collapse'><i class='fas fa-laptop fa-lg'></i>$mis</a>
              <ul id='misDropdownItem' class='collapse list-unstyled'>
                <li><a href='blood_report.php'><i class='fas fa-warehouse fa-lg'></i>$blood_report</a></li>
              </ul>
            </li>
            <li><a href='donner.php'> <i class='fas fa-user-nurse fa-lg'></i></i>$donner</a></li>
            <li><a href='donation.php'> <i class='fas fa-donate fa-lg'></i></i>$donation</a></li>
            <li><a href='user_control.php'> <i class='fa fa-user-lock fa-lg'></i></i>$user_control</a></li>
          </ul>
        </nav>
        <div class='content-inner'>
              ";?>
          <!-- Start Page Footer Section-->
  <?php $end_page_sidenav_content_footer_section = "
          <footer class='main-footer'>
            <div class='container-fluid'>
              <div class='row'>
                <div class='col-sm-6'>
                  <p>$footer_policy_name</p>
                </div>
                <div class='col-sm-6 text-right'>
                  <p>DESIGN AND DEVELOPED BY <a href='#' class='external'>$developer_and_designer_name</a></p>
                </div>
              </div>
            </div>
          </footer>
        </div>
      </div>
    </div>
  ";?>
 <!-- JavaScript files-->
 <!-- jQuery library -->
 <?php $end_body_html_and_java_script_section = "
  <script src='js/jquery.dataTables.min.js'></script> 
  <script src='js/dataTables.bootstrap4.min.js'></script> 
  <script src='vendor/popper.js/popper.min.js'></script>
  <script src='vendor/bootstrap/js/bootstrap.min.js'></script>
  <script src='js/custom.js'></script>
  <script src='js/bootstrap-select.min.js'></script>
</body>
</html>
  ";
  ?>
 <?php $html_and_head_section_for_report = "
<!DOCTYPE html>
<html lang='en'>
<head>
  <title>KYAU BlOOD DONATION CLUB MANAGEMENT SYSTEM</title>
  <link rel='shortcut icon' href='img/favicon/kyausmsfavicon.ico'>
  <meta charset='utf-16'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' href='vendor/bootstrap/css/bootstrap.min.css'>
  <link rel='stylesheet' type='text/css' href='css/datatables.min.css'/>
  <link rel='stylesheet' href='css/dataTables.bootstrap4.min.css'>
  <link href='vendor/fontawesome/css/font-awesome.min.css' rel='stylesheet'> 
  <link href='vendor/fontawesome/css/all.css' rel='stylesheet'>
  <link rel='stylesheet' href='css/bootstrap-select.min.css'>
  <link rel='stylesheet' href='css/bootstrap-datepicker.css'>
  <link rel='stylesheet' href='css/style.default.css' id='theme-stylesheet'>
  <link rel='stylesheet' href='css/custom.css'>
  <script src='vendor/jquery/jquery.min.js'></script>
  <script src='js/bootstrap-datepicker.js'></script>
</head>
";
?>
<?php $end_body_html_and_java_script_section_for_report = "
  <script type='text/javascript'src='js/datatables.min.js'></script>
  <script src='js/dataTables.bootstrap4.min.js'></script> 
  <script src='vendor/popper.js/popper.min.js'></script>
  <script src='vendor/bootstrap/js/bootstrap.min.js'></script>
  <script src='js/custom.js'></script>
  <script src='js/bootstrap-select.min.js'></script>
  </body>
  </html>
"?>
 
