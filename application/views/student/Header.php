<?php 
if ($this->session->userdata('reg_num') == '' ) {
  redirect(base_url().'/');
}else{
$firstname = $this->session->userdata('firstname') ;
$reg_num = $this->session->userdata('reg_num');
$fullname = $this->session->userdata('surname')." ".$this->session->userdata('firstname')." ".$this->session->userdata('middlename'); 
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

         <!-- DataTables -->
              <link href="<?php echo base_url(); ?>plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">
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

        <!-- jQuery  -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/waves.min.js"></script>
        <!-- summernote --> 

    </head>

    <body>