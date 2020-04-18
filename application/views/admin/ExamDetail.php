

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
                                    <div class="table-rep-plugin">
                                        <div class="table-responsive b-0" data-pattern="priority-columns">
                                            <table id="tech-companies-1" class="table  table-striped col-sm-12">
                                                <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>eid</th>
                                                    <th width="30px" data-priority="1">Exam Name</th>
                                                    <th width="5%" data-priority="3">Question</th>
                                                    <th data-priority="1">Option A</th>
                                                    <th data-priority="3">Option B</th>
                                                    <th data-priority="3">Option C</th>
                                                    <th data-priority="6">Option D</th>
                                                    <th data-priority="6">Correct Answer</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                                                if ($questions) {
                                                    foreach ($questions as $row){
                                               echo' <tr>
                                                    <th>'.$row["sn"].'</th>
                                                    <th>'.$row["eid"].' </th>
                                                    <td>'.$row["eid"].'</td>
                                                    <td>'.$row["question"].'</td>
                                                    <td>'.$row["optionA"].'</td>
                                                    <td>'.$row["optionB"].'</td>
                                                    <td>'.$row["optionC"].'</td>
                                                    <td>'.$row["optionD"].'</td>
                                                    <td>'.$row["correct"].'</td>
                                                </tr>';
                                                  }
                                                }
                                            ?>
                                                </tbody>
                                            </table>
                                        </div>
    
                                    </div>
    
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
      