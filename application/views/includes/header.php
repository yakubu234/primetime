<?php 
if ($this->session->userdata('username') == '' ) {
  redirect(base_url().'/');
}else{
$email = $this->session->userdata('email') ;
$username = $this->session->userdata('username');
$name = $this->session->userdata('name');
$id = $this->session->userdata('id');
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <style type="text/css">
            /*input[type=checkbox] + label {
  display: block;
  margin: 0.4em 0.2em 0.2em 0.2em;
  cursor: pointer;
  padding: 0.2em;
}

input[type=checkbox] {
  display: none;
}

input[type=checkbox] + label:before {
  content: "\2714";
  border: 0.1em solid #000;
  border-radius: 0.2em;
  display: inline-block;
  width: 1.5em;
  height: 1.5em;
  padding-left: 0.2em;
  padding-bottom: 0.3em;
  margin-right: 0.2em;
  margin-top: 0.2em;
  vertical-align: bottom;
  color: transparent;
  transition: .2s;
}

input[type=checkbox] + label:active:before {
  transform: scale(0);
}

input[type=checkbox]:checked + label:before {
  background-color: MediumSeaGreen;
  border-color: MediumSeaGreen;
  color: #fff;
}*/
        </style>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Lariken College - Welcome to official site of Lariken College| no 1 school in Ibadanstate| top 5 school in nigeria|top 10 school in Oyo State|top ten school in nigeria|nigerian british standard curriculum|AOjf|Abayomi Oluwatosin Jiboku Foundation</title>
          <meta name="description" content="Lariken College - Welcome to official site of Lariken College| no 1 school in Ibadanstate| top 5 school in nigeria|top 10 school in Oyo State|top ten school in nigeria|nigerian british standard curriculum|AOjf|Abayomi Oluwatosin Jiboku Foundation">
          <meta name="keywords" content="Lariken College - Welcome to official site of Lariken College| no 1 school in Ibadanstate| top 5 school in nigeria|top 10 school in Oyo State|top ten school in nigeria|nigerian british standard curriculum|AOjf|Abayomi Oluwatosin Jiboku Foundation">
          <meta name="Dc.title" content="Lariken College - Welcome to official site of Lariken College| no 1 school in Ibadanstate| top 5 school in nigeria|top 10 school in Oyo State|top ten school in nigeria|nigerian british standard curriculum|AOjf|Abayomi Oluwatosin Jiboku Foundation">
          <meta name="robots" content="index, follow" />
        <meta content="Yakubu Abiola" name="author" />
        <link rel="shortcut icon" href="<?php echo base_url('logo/school_logo.png') ?>">

         <!-- DataTables -->
        <link href="<?php echo base_url(); ?>plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="<?php echo base_url(); ?>plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Table css -->
        <link href="<?php echo base_url(); ?>plugins/RWD-Table-Patterns/dist/css/rwd-table.min.css" rel="stylesheet" type="text/css" media="screen">
         <!-- Plugins css -->
         <link href="<?php echo base_url(); ?>assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>plugins/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/summernote/summernote-bs4.css">

        <link href="<?php echo base_url(); ?>plugins/bootstrap-md-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />

        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    </head>

    <body>

        <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main">
                <div class="container-fluid">

                    <!-- Logo container-->
                    <div class="logo">
                        
                        <a href="<?php echo base_url('Dashboard_Display'); ?>" class="logo">
                            <img src="<?php echo base_url('logo/school_logo.png') ?>" alt="" class="logo-small">
                            <img src="<?php echo base_url('logo/school_logo.png') ?>" alt="" class="logo-large">
                        </a>

                    </div>

                    <!-- End Logo container-->


                    <div class="menu-extras topbar-custom">

                        <ul class="navbar-right d-flex list-inline float-right mb-0">           <li class="dropdown notification-list">
                                <div class="dropdown notification-list">
                                    <!-- <span></span> -->
                                    <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                        <span class="mdi mdi-account-circle" style="font-size:40px;color:white;" ></span>
                                        <!-- <img src="assets/images/users/user-4.jpg" alt="user" class="rounded-circle"> -->
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                        <!-- item-->
                                        <a class="dropdown-item" data-toggle="modal" data-target=".bs-example-modal-center-profile"><i class="mdi mdi-account-circle m-r-5"></i> Profile</a>
                                        <a class="dropdown-item" href="<?php echo base_url('Unlock_LockScreen') ?>"><i class="mdi mdi-lock-open-outline m-r-5"></i> Lock screen</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" href="<?php echo base_url('Just_say_Logout'); ?>"><i class="mdi mdi-power text-danger"></i> Logout</a>
                                    </div>                                                                    
                                </div>
                            </li>

                              <li class="dropdown notification-list d-none d-sm-block">
                                <a  style="color:white;" href="<?php echo base_url('Just_say_Logout'); ?>"><i class="mdi mdi-power"  style="font-size:40px;color:white;" ></i></a>
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
                                <ul class="submenu">
                                    <li><a href="<?php echo base_url('Setting_in_Exam') ?>">Modify Exam</a></li>
                                    <li><a data-toggle="modal" data-target=".bs-example-modal-center-Drop ">Drop Exam History</a></li>
                                    <li><a href="<?php echo base_url('Add_subject_to_database');?>">Add Subject</a></li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="mdi mdi-account-circle"></i>Users</a>
                                <ul class="submenu">
                                    <li><a href="<?php echo base_url('Add_admin_now_'); ?>">Admin</a></li>
                                    <li><a href="<?php echo base_url('Show_Student_Registered');?>">Students</a></li>
                                    <li><a href="<?php echo base_url('Register_Student'); ?>">Register Student</a></li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="mdi mdi-clipboard"></i>Exams</a>
                                <ul class="submenu">
                                    <li><a href="<?php echo base_url('Create_Exam') ?>">Create New Exam</a></li>
                                    <li><a data-toggle="modal" data-target=".bs-example-modal-center">Add Question to old exam</a></li>
                                    <li><a data-toggle="modal" data-target=".bs-example-modal-center-theory">Add Theory Score</a></li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a data-toggle="modal" data-target=".bs-example-modal-center-remove "><i class="mdi mdi-delete"></i>Remove Exam</a>
                            </li>

                            <li class="has-submenu">
                                <a data-toggle="modal" data-target=".bs-example-modal-center-result"><i class="mdi mdi-google-pages"></i>Generate Result</a>
                            </li>

                            <li class="has-submenu">
                                <a href="<?php echo base_url('Just_say_Logout'); ?>" ><i class="mdi mdi-power"></i>Logout</a>
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


              <!-- enter theory score-->
        <div class="modal fade bs-example-modal-center-theory" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title mt-0">View Candidate for Exam</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>
                                                        <div class="modal-body">
                                                         <form action="<?php echo base_url('send_theory_now') ?>" method="POST" >
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
                                                   Continue
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
        <!-- enter theory score -->

        <!-- delete Exam -->
        <div class="modal fade bs-example-modal-center-remove" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title mt-0">Delete Particular Exam</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>
                                                        <div class="modal-body">
                                                         <form action="<?php echo base_url('Delete_exam_') ?>" method="POST" >
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
                                                    Delete
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
        <!-- Delete Exam -->

        <!-- view Exam result-->
        <div class="modal fade bs-example-modal-center-result" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title mt-0">Generate Exam Result</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>
                                                        <div class="modal-body">
                                                         <form action="<?php echo base_url('BroadSheet') ?>" method="POST" >
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

                                        <div class="form-group col-sm-12">
                                            <label class="control-label">Select Result Type</label>
                                            <select class="form-control select2" name="mode" required="">
                                                <option selected="" disabled="" >Choose Result To Generate</option>
                                                <option value="BroadSheet" >BroadSheet</option>
                                                <option value="Individual" >Individual</option></select>
                                        </div>
                                        <div class="form-group col-sm-12" >
                                            <div style="float:right;">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                    Generate Result
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
        <!-- view Exam result -->

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

        <!-- add admin -->
        <div class="modal fade bs-example-modal-centeraadmin" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title mt-0">Add New Admin</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>
                                                        <div class="modal-body">
                                                         <form action="<?php echo base_url('Add_admin_now_') ?>" method="POST" >
                                        <div class="row">
                                        <div class="form-group col-sm-12">
                                            <label>Full Name</label>
                                            <div>
                                                <input data-parsley-type="alphanum" type="text"
                                                        class="form-control" required name="name" 
                                                        placeholder="Enter Full Name"/>
                                            </div>
                                        </div>

                                         <div class="form-group col-sm-12">
                                            <label>Email</label>
                                            <div>
                                                <input data-parsley-type="alphanum" type="email"
                                                        class="form-control" required name="email" 
                                                        placeholder="Enter Email"/>
                                            </div>
                                        </div>

                                         <div class="form-group col-sm-12">
                                            <label>Username</label>
                                            <div>
                                                <input data-parsley-type="alphanum" type="text"
                                                        class="form-control" required name="username" 
                                                        placeholder="Enter username"/>
                                            </div>
                                        </div>

                                        <div class="form-group col-sm-12">
                                            <label>password</label>
                                            <div>
                                                <input data-parsley-type="alphanum" type="password"
                                                        class="form-control" required name="password" 
                                                        placeholder="Enter password"/>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12" >
                                            <div style="float:right;">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                    Create Admin
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
        <!-- add admin -->
<div class="modal fade bs-example-modal-center-profile" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title mt-0">Admin Profile</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>
                                                        <div class="modal-body">
                                                           <form action="<?php echo base_url('Admin_Update') ?>" method="POST" >
                                        <div class="row">
                                            <input type="hidden" name="id" value="<?php echo $id; ?>" >
                                        <div class="form-group col-sm-12">
                                            <label>Username (Non Editable)</label>
                                            <input type="text" class="form-control" required placeholder="Type something"  value="<?php echo $username; ?>" name="username" readonly />
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label>Full Name</label>
                                            <input type="text" class="form-control" required placeholder="Type something"  value="<?php echo $name; ?>" name="name" />
                                        </div>

                                        <div class="form-group col-sm-12">
                                            <label>Email</label>
                                            <input type="email" class="form-control"  placeholder="Enter Email Here"  value="<?php echo $email; ?>" name="email" />
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label>Existing Password 
                                            (Needed to Update)</label>
                                            <input type="password" class="form-control"  placeholder="Enter Existing Password Here" required="" name="password" />
                                        </div>
                                        <div class="form-group col-sm-12 new_password" style="display:none">
                                            <label>New Password</label>
                                            <input type="password" class="form-control"  placeholder="Enter Existing Password Here" name="newpassword" />
                                        </div>
                                        <div class="form-group col-sm-12" >
                                            <div class="row">
                                                <div class="col-sm-6" >
                                                <input type="checkbox" id="fruit1" name="fruit-1" value="Password-update">
                                                <label for="fruit1">Change Password</label> </div><div class="col-sm-6" >
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                    Update Profile
                                                </button>
                                                <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                                    Cancel
                                                </button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->

                                            <script>
                                                $('#fruit1').click(function() {
                                                $(".new_password").toggle(this.checked);
                                              });
                                            </script>


                                            <!-- add new subject -->
        <div class="modal fade bs-example-modal-centeraadmin_subject" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title mt-0">Add New Subject</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>
                                                        <div class="modal-body">
                                                         <form action="<?php echo base_url('Add_subject_to_database') ?>" method="POST" >
                                        <div class="row">
                                        <div class="form-group col-sm-12">
                                            <label>Subject Title</label>
                                            <div>
                                                <input data-parsley-type="alphanum" type="text"
                                                        class="form-control" required name="subjectname" 
                                                        placeholder="Enter Subject Title"/>
                                            </div>
                                        </div>

                                         
                                        <div class="form-group col-sm-12" >
                                            <div style="float:right;">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                    Add Subject
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
        <!-- add new subject -->



         <!-- Drop Exam History -->
        <div class="modal fade bs-example-modal-center-Drop" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title mt-0">Drop Exam History Panel</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>
                                                        <div class="modal-body">
                                                         <form action="<?php echo base_url('Drop_history') ?>" method="POST" >
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
                                                    Delete
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
        <!-- Drop Exam History-->
