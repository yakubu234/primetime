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
                                    <h4 class="mt-0 header-title">Exams in the database</h4>
                                <div class="row">
                        <div class="col-12">
                            <div class="card m-b-20">
                                <div class="card-body">
                                    <form>
                                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                    <th>S/N</th>
                                                    <th>Image</th>    
                                                    <th>Reg Num</th>
                                                    <th>Name</th>
                                                    <th>Password</th>
                                                    <th>Reg Time</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                       <?php
                                                     if ($student) {
                                                    foreach($student as $val){
                                                        $sn=1;
                                               echo ' <tr>
                                                    <td>'.$sn.'</td>
                                                    <td><img src="'.base_url().'Student_Pic/'.$val["img"].'" alt="" class="rounded" style="width: 70px;height:60px;"></td>
                                                    <td>'.$val["reg_num"].' </td>
                                                    <td>'.$val["surname"]." ".$val["middlename"]." ".$val["middlename"].'</td>
                                                    <td>'.$val["phone"].'</td>
                                                    <td>'.$val["time"].'</td>
                                                </tr>';$sn++;
                                                }
                                               }else{
                                                echo"
                                                    <tr>
                                                    <td colspan='6' class='text-center' class='col-sm-12' > No record Found</td>
                                                    </tr>
                                                ";
                                               } 
                                             ?> 
                                        </tbody>
                                    </table>
                                    
                                    </form>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->

                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </div>
                <!-- end container-fluid -->
            </div>
            <!-- end page content-->

        </div>
        <!-- page wrapper end -->

        <!-- Footer -->