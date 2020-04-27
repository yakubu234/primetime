
<!DOCTYPE html>
<html lang="en">

    <head>
             <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Lariken College - Welcome to official site of Lariken College| no 1 school in Ibadanstate| top 5 school in nigeria|top 10 school in Oyo State|top ten school in nigeria|nigerian british standard curriculum|AOjf|Abayomi Oluwatosin Jiboku Foundation</title>
          <meta name="description" content="Lariken College - Welcome to official site of Lariken College| no 1 school in Ibadanstate| top 5 school in nigeria|top 10 school in Oyo State|top ten school in nigeria|nigerian british standard curriculum|AOjf|Abayomi Oluwatosin Jiboku Foundation">
          <meta name="keywords" content="Lariken College - Welcome to official site of Lariken College| no 1 school in Ibadanstate| top 5 school in nigeria|top 10 school in Oyo State|top ten school in nigeria|nigerian british standard curriculum|AOjf|Abayomi Oluwatosin Jiboku Foundation">
          <meta name="Dc.title" content="Lariken College - Welcome to official site of Lariken College| no 1 school in Ibadanstate| top 5 school in nigeria|top 10 school in Oyo State|top ten school in nigeria|nigerian british standard curriculum|AOjf|Abayomi Oluwatosin Jiboku Foundation">
          <meta name="robots" content="index, follow" />
        <meta content="Yakubu Abiola" name="author" />
        <link rel="shortcut icon" href="<?php echo base_url('logo/school_logo.png') ?>">

        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css">
    </head>

    <body>

        <!-- Background -->
        <div class="account-pages"></div>
        <!-- Begin page -->
        <div class="wrapper-page">

            <div class="card">
                <div class="card-body" style="background-color: #6B8E23;">

                    <h3 class="text-center m-0">
                        <a href="index.html" class="logo logo-admin"><img src="<?php echo base_url() ?>logo/school_logo.png" height="100" alt="logo"></a>
                    </h3>

                    <div class="p-3">

                        <h4 class="text-muted font-18 m-b-5 text-center"><span style="color:white;" >Computerized Aptitude Test</span></h4>
                        <p class="text-muted text-center"><span style="color:white;">Please this portal should be strictly accessed with a computer</span><br><span style="color:white;">Administrator Panel</span></p>
                        <div class="col-sm-12" >
                            
                            <?php if ($this->session->flashdata('errors')) { ?>
                              <div class="alert alert-primary">
                                <?=$this->session->flashdata('errors'); ?>
                              </div>
                              
                            <?php } ?>
                            <!-- success -->
                            <?php if ($this->session->flashdata('suc')) { ?>
                              <div class="alert alert-success">
                                <?=$this->session->flashdata('suc'); ?>
                              </div>
                              
                            <?php } ?>
                            
                          </div>

                        <form class="form-horizontal m-t-20" action="<?php echo base_url('Login');?>" method="POST" >

                            <div class="form-group">
                                <label for="username" style="color:white;">Username</label>
                                <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" required="username is required">
                            </div>

                            <div class="form-group">
                                <label for="userpassword" style="color:white;">Password</label>
                                <input type="password" class="form-control" id="userpassword" placeholder="Enter password" name="password" required="Password is required" >
                            </div>

                            <div class="form-group row m-t-20">
                                <div class="col-6">
                                    <a href="<?php echo base_url('Fpass'); ?>" class="text-muted" style="color:white;"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                </div>
                                <div class="col-6 text-right">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                                </div>
                            </div>

                            <div class="form-group m-t-10 mb-0 row">
                                <div class="col-12">
                                	<div style="text-align:center;">
                                    <a href="<?php echo base_url('/');?>" class="text-muted" style="float:center;color:white;"><span style="color:white;" ><i class="fa fa-user-alt"></i>&nbsp; Student Signin</span></a>
                                	</div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <!-- END wrapper -->

        <!-- jQuery  -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/waves.min.js"></script>

        <script src="<?php echo base_url(); ?>plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

        <!-- App js -->
        <script src="<?php echo base_url(); ?>assets/js/app.js"></script>

    </body>

</html>