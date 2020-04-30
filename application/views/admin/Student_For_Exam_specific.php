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
                                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>    <th>S/N</th>
                                                    <th>Exam Title</th>    
                                                    <th>Reg Num</th>
                                                    <th> Candidate Name</th>
                                                    <th>Theory Score</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                       <?php
                                       $eid = $this->session->userdata('eid');
                                       $usage['student'] =  $this->db->get_where('exam_ready',array('eid'=>$eid))->result();
                                                     if ($student) {
                                                    foreach($student as $key => $val){
                                               echo ' <tr>
                                                    <td>'.( 1 + $key).'</td> 
                                                    <td>'.$val->exam_name.' </td>
                                                    <td>'.$val->reg_num.' </td>
                                                    <td>'.$val->name.'</td>
                                                    <td>'.$val->theory.'</td>
                                                </tr>';
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