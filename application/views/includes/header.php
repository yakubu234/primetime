<?php 
if ($this->session->userdata('username') == '' ) {
  redirect(base_url().'/');
}else{
$email = $this->session->userdata('email') ;
$username = $this->session->userdata('username');
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Agroxa - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <link rel="shortcut icon" href="assets/images/favicon.ico">

         <!-- DataTables -->
        <link href="<?php echo base_url(); ?>plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="<?php echo base_url(); ?>plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Table css -->
        <link href="<?php echo base_url(); ?>plugins/RWD-Table-Patterns/dist/css/rwd-table.min.css" rel="stylesheet" type="text/css" media="screen">
         <!-- Plugins css -->
        <link href="<?php echo base_url(); ?>plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>plugins/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/summernote/summernote-bs4.css">

        <link href="<?php echo base_url(); ?>plugins/bootstrap-md-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />

        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css">

    </head>

    <body>

        <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main">
                <div class="container-fluid">

                    <!-- Logo container-->
                    <div class="logo">
                        
                        <a href="index.html" class="logo">
                            <img src="assets/images/logo-sm-light.png" alt="" class="logo-small">
                            <img src="assets/images/logo-light.png" alt="" class="logo-large">
                        </a>

                    </div>

                    <!-- End Logo container-->


                    <div class="menu-extras topbar-custom">

                        <ul class="navbar-right d-flex list-inline float-right mb-0">           <li class="dropdown notification-list">
                                <div class="dropdown notification-list">
                                    <span><?php echo $username; ?></span>
                                    <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                        <span class="mdi mdi-account-circle" style="font-size:40px;color:white;" ></span>
                                        <!-- <img src="assets/images/users/user-4.jpg" alt="user" class="rounded-circle"> -->
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                        <!-- item-->
                                        <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle m-r-5"></i> Profile</a>
                                        <a class="dropdown-item" href="#"><i class="mdi mdi-lock-open-outline m-r-5"></i> Lock screen</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" href="<?php echo base_url('Just_say_Logout'); ?>"><i class="mdi mdi-power text-danger"></i> Logout</a>
                                    </div>                                                                    
                                </div>
                            </li>
                            
                            <li class="menu-item list-inline-item">
                                <!-- Mobile menu toggle-->
                                <a class="navbar-toggle nav-link">
                                    <div class="lines">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </a>
                                <!-- End mobile menu toggle-->
                            </li>

                        </ul>
    
    
    
                    </div>
                    <!-- end menu-extras -->

                    <div class="clearfix"></div>

                </div> <!-- end container -->
            </div>
            <!-- end topbar-main -->

            <!-- MENU Start -->
            <div class="navbar-custom">
                <div class="container-fluid">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">

                            <li class="has-submenu">
                                <a href="<?php echo base_url('Dashboard_Display');?>"><i class="mdi mdi-home"></i>Dashboard</a>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="mdi mdi-settings"></i>Settings</a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>
                                            <li><a href="ui-alerts.html">Alerts</a></li>
                                            <li><a href="ui-buttons.html">Buttons</a></li>
                                            <li><a href="ui-badge.html">Badge</a></li>
                                            <li><a href="ui-cards.html">Cards</a></li>
                                            <li><a href="ui-carousel.html">Carousel</a></li>
                                            <li><a href="ui-dropdowns.html">Dropdowns</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="mdi mdi-account-circle"></i>Users</a>
                                <ul class="submenu">
                                    <li><a href="components-lightbox.html">Admin</a></li>
                                    <li><a href="<?php echo base_url('Show_Student_Registered');?>">Students</a></li>
                                    <li><a href="<?php echo base_url('Register_Student'); ?>">Register Student</a></li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="mdi mdi-clipboard"></i>Exams</a>
                                <ul class="submenu">
                                    <li><a href="<?php echo base_url('Create_Exam') ?>">Create New Exam</a></li>
                                    <li><a data-toggle="modal" data-target=".bs-example-modal-center">Add Question to old exam</a></li>
                                    <li><a href="form-advanced.html">Form Advanced</a></li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="mdi mdi-delete"></i>Remove Exam</a>
                                <ul class="submenu">
                                    <li><a href="charts-chartist.html">Chartist Chart</a></li>
                                    <li><a href="charts-chartjs.html">Chartjs Chart</a></li>
                                    <li><a href="charts-flot.html">Flot Chart</a></li>
                                    <li><a href="charts-c3.html">C3 Chart</a></li>
                                    <li><a href="charts-morris.html">Morris Chart</a></li>
                                    <li><a href="charts-other.html">Jquery Knob Chart</a></li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="mdi mdi-google-pages"></i>Generate Result</a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>
                                            <li><a href="pages-login.html">Login</a></li>
                                            <li><a href="pages-register.html">Register</a></li>
                                            <li><a href="pages-recoverpw.html">Recover Password</a></li>
                                            <li><a href="pages-lock-screen.html">Lock Screen</a></li>
                                            <li><a href="pages-timeline.html">Timeline</a></li>
                                            <li><a href="pages-invoice.html">Invoice</a></li>
                                        </ul>
                                    </li>                                    
                                </ul>
                            </li>
                        </ul>
                        <!-- End navigation menu -->
                    </div> <!-- end #navigation -->
                </div> <!-- end container -->
            </div> <!-- end navbar-custom -->
        </header>
        <!-- End Navigation Bar-->

        <!-- old exam -->
        <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title mt-0">Add Question to Old Exam</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>
                                                        <div class="modal-body">
                                                         <form action="<?php echo base_url('Create_Question_Old') ?>" method="POST" >
                                        <div class="row">
                                        <div class="form-group col-sm-12">
                                            <label class="control-label">Select Exam Title</label>
                                            <select class="form-control select2" name="exam" required="" id="DropSelect" onchange="styleselect()">
                                                <option selected="" disabled="" >Choose Exam Title</option>
                                                <?php
                                                $get_data=$this->User_Model->get_table_data();
                                                    foreach($get_data as $val){
                                              echo" <option value='".$val->eid."'>". $val->title."</option>";
                                               } 
                                             ?>                                                
                                            </select>
                                        </div>
                                    <input type="hidden" id="stylediv" name="Exam_name">
                                     </span> </div></div>
                                     <script type="text/javascript">
                                        function styleselect() {
                                    var gett = $('#DropSelect option:selected').text();
                                     $("#stylediv").val(gett);   };
                                     </script>
                                        <div class="form-group col-sm-12">
                                            <label>Enter Total Number Question</label>
                                            <div>
                                                <input data-parsley-type="alphanum" type="text"
                                                     class="form-control" required name="total"
                                                        placeholder="Total Number of Question"/>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12" >
                                            <div style="float:right;">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                    Submit
                                                </button>
                                                <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                                    Cancel
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
        <!-- old exam ended -->

        <!-- check student -->
        <div class="modal fade bs-example-modal-centera" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title mt-0">View Candidate for Exam</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>
                                                        <div class="modal-body">
                                                         <form action="<?php echo base_url('View_Candidate_For_Exam_Search') ?>" method="POST" >
                                        <div class="row">
                                        <div class="form-group col-sm-12">
                                            <label class="control-label">Select Exam Title</label>
                                            <select class="form-control select2" name="exam" required="">
                                                <option selected="" disabled="" >Choose Exam Title</option>
                                                <?php
                                                $get_data=$this->User_Model->get_table_data();
                                                    foreach($get_data as $val){
                                              echo" <option value='".$val->eid."'>". $val->title."</option>";
                                               } 
                                             ?>                                                
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12" >
                                            <div style="float:right;">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                    View
                                                </button>
                                                <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                                    Cancel
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
        <!-- check student -->

        <!-- check student -->
        <div class="modal fade bs-example-modal-centerab" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title mt-0"> Upload Student Data</h5>

                                                        <div class="col-sm-4" style="float: right;" ><a href="<?php echo base_url() ?>SampleCsv/Sample student data format.csv" download><button class="mdi mdi-arrow-down-bold-hexagon-outline btn btn-primary waves-effect waves-light" > Download Format</button></a></div>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>
                                                        <div class="modal-body">
                                                         <form action="<?php echo base_url('Upload_Student_CSV') ?>" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                        <div class="form-group col-sm-12">
                                            <label>Choose Excel</label>
                                            <input type="file" class="filestyle" data-buttonname="btn-secondary" name="file">
                                        </div>
                                        
                                        <div class="form-group col-sm-12" >
                                            <div style="float:right;">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                    Upload
                                                </button>
                                                <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                                    Cancel
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
        <!-- check student -->