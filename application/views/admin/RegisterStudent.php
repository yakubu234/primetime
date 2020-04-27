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
                                    <div class="col-sm-12 m-b-20"><div class="row" ><h4 class="mt-0 header-title col-sm-4">Add Student to the Database</h4><span class="col-sm-8" style="float:right;"><button class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-centerab">Upload Multiple Images</button>&nbsp;<button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-centerab">Upload Student Data</button>&nbsp;<a data-toggle="modal" data-target=".bs-example-modal-centeraadmin_user_type"><button class="btn btn-info waves-effect waves-light">Add Candidate to Exam</button></a>&nbsp;<button class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-centera" >View Candidate for Exam</button></span> </div></div>  
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
                                                <div class="form-group col-sm-3">
                                            <label>Phone</label>
                                            <div>
                                                <div class="input-group">
                                                    <input type="text" name="phone" class="form-control floating-label" placeholder="Enter Phone number" />
                                                </div>
                                            </div>
                                        </div>
                                           <div class="form-group col-sm-3">
                                            <label>Group / Category</label>
                                            <div>
                                                <div class="input-group">
                                                    <input type="text" name="group" class="form-control floating-label" placeholder="Enter Group I.e. Admission" />
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
      
       <!-- Select user type-->
        <div class="modal fade bs-example-modal-centeraadmin_user_type" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title mt-0">Select Student Categoory</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>
                                                        <div class="modal-body">
                                                         <form action="<?php echo base_url('add_by_category') ?>" method="POST" >
                                        <div class="row">
                                        <div class="form-group col-sm-12">
                                            <label class="control-label">Choose Student Category</label>
                                            <select class="form-control select2" name="Category" required="">
                                                <option selected="" disabled="" >Choose Student Category</option>
                                         <?php $get_data=$this->User_Model->get_category_data();
                                             foreach($get_data as $val){
                                              echo" <option value='".$val['Category']."'>". $val['Category']."</option>";
                                               } ?>
                                           </select>
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
        <!-- Select user type -->
        <!-- href="<?php //echo base_url('Add_Student_To_Access_Specific_Exam'); ?>" -->