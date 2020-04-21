<?php 
if ($this->session->userdata('username') == '' ) {
  redirect(base_url().'/');
}else{
$email = $this->session->userdata('email') ;
$username = $this->session->userdata('username');
$fullname = $this->session->userdata('name');
}
?>
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

        <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" type="text/css">
    </head>

    <body>

        <!-- Background -->
        <div class="account-pages"></div>

        <!-- Begin page -->
        <div class="wrapper-page">

            <div class="card">
                <div class="card-body">

                    <h3 class="text-center m-0">
                        <a href="index.html" class="logo logo-admin"><img src="<?php echo base_url('logo/school_logo.png') ?>" height="30" alt="logo"></a>
                    </h3>

                    <div class="p-3">
                        <h4 class="text-muted font-18 m-b-5 text-center">Locked</h4>
                        <p class="text-muted text-center">Hello <?php echo $fullname; ?>, enter your password to unlock the screen!</p>

                        <form class="form-horizontal m-t-10" action="index.html">

                            <div class="user-thumb text-center m-b-30">
                                <span class="mdi mdi-account-circle" style="font-size:60px;color:red;margin-bottom: -20px;" ></span><br>
                                <h6 style="text-transform: uppercase;margin-top: -20px;"><?php echo $username; ?></h6>
                            </div>

                            <div class="form-group">
                                <label for="userpassword">Password</label>
                                <input type="password" class="form-control" id="userpassword" placeholder="Enter password">
                            </div>

                            <div class="form-group row m-t-20">
                                <div class="col-12 text-right">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Unlock</button>
                                </div>
                            </div>

                        </form>
                    </div>
    

                </div>
            </div>

            <div class="m-t-40 text-center">
                <p class="text-muted">Not you ? return <a href="pages-login.html" class=" text-white"> Sign In </a> </p>
                <p class="text-muted"><?php echo date('Y'); ?> <span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i><span><a href="https://github.com/yakubu234">by Yakubu Abiola</a> </span></span></p>
            </div>


        </div>