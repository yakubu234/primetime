        <!-- page wrapper start -->
        <div class="wrapper">
            <div class="page-title-box">
                <div class="container-fluid">

                </div>
                <!-- end container-fluid -->
            
            </div>
            <!-- page-title-box -->

            <div class="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12" >
                            
                            <?php if ($this->session->flashdata('errors')) { ?>
                              <div class="alert alert-primary">
                                <?=$this->session->flashdata('errors'); ?>
                              </div>
                              
                            <?php } ?>
                            <!-- success -->
                            <?php if ($this->session->flashdata('success')) { ?>
                              <div class="alert alert-success">
                                <?=$this->session->flashdata('success');?>
                              </div>
                              
                            <?php } ?>
                            
                          </div>
                        <div class="col-12">
                            <div class="card m-b-20">
                                <div class="card-body">
    
                                    <div class="col-sm-12 m-b-20"><div class="row" ><h4 class="mt-0 header-title col-sm-4">Add Student to the Database</h4><span class="col-sm-8" style="float:right;"><button class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-centerab">Upload Multiple Images</button>&nbsp;<button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-centerab">Upload Student Data</button>&nbsp;<a href="<?php echo base_url('Add_Student_To_Access_Specific_Exam'); ?>"><button class="btn btn-info waves-effect waves-light">Add Candidate to Exam</button></a>&nbsp;<button class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-centera" >View Candidate for Exam</button></span> </div></div>  
                                    <div class="m-b-30">
                                        <form method="POST" action="<?php echo base_url('Register_Student');?>" enctype="multipart/form-data">
                                           <div class="row" >
                                         <div class="form-group col-sm-6">
                                            <label>Reg Num</label>
                                            <div>
                                                <input data-parsley-type="alphanum" type="text"
                                                    class="form-control" required name="Reg"
                                                        placeholder="Enter Registration Number"/>
                                            </div>
                                        </div>
                                         <div class="form-group col-sm-6">
                                            <label>Surname</label>
                                            <div>
                                                <input data-parsley-type="alphanum" type="text"
                                                    class="form-control" required name="surname"
                                                        placeholder="Enter Surname"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                                <div class="form-group col-sm-6">
                                            <label>Firstname</label>
                                            <div>
                                                <div class="input-group">
                                                    <input type="text" name="firstname" class="form-control floating-label" placeholder="Enter First Name" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>MiddleName</label>
                                            <div>
                                                <input data-parsley-type="alphanum" type="text"
                                                    class="form-control" required name="middlename"
                                                        placeholder=" Enter Middle Name"/>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-2">
                                            <label class="control-label">Gender</label>
                                            <select class="form-control select2" required name="gender">
                                                <option selected="" disabled="" >Select</option>
                                                <option value="Male" >Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                            
                                        </div>
                                 </div>
                                 <div class="row">
                                                <div class="form-group col-sm-6">
                                            <label>Phone</label>
                                            <div>
                                                <div class="input-group">
                                                    <input type="text" name="phone" class="form-control floating-label" placeholder="Enter Phone number" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Choose Picture</label>
                                            <input type="file" class="filestyle" data-buttonname="btn-secondary" name="file">
                                        </div>
                                 </div>             
    
                                    <div class="text-center m-t-15">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Register Student</button>
                                    </div>
                    
                                        </form>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->

                </div>
                <!-- end container-fluid -->
            </div>
            <!-- end page content-->

        </div>
      