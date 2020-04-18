

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
                                    <!-- <p class="text-muted m-b-30">This is an experimental awesome solution for responsive tables with complex data.</p> -->
    
                                    <div class="table-rep-plugin">
                                        <div class="table-responsive b-0" data-pattern="priority-columns">
                                            <table id="tech-companies-1" class="table  table-striped">
                                                <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Name</th>                                <th data-priority="1">Total Question</th>
                                                    <th data-priority="3">Marks</th>
                                                    <th data-priority="1">Duration (Mins)</th>
                                                    <th data-priority="3">Date Created</th>
                                                    <th data-priority="3">Start Date</th>
                                                    <th data-priority="6">End Date</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                     <?php
                                                $get_data=$this->User_Model->get_table_data();    
                                                // $sn = is_countable($val->title);
                                                        // for ($sn = 1; $sn <= 10; $sn++) {
                                                    foreach($get_data as $key => $val){
                                               echo ' <tr width="100%">
                                                    <th>'.(1+$key).'</th>
                                                    <th>'.$val->title.' </th>
                                                    <td>'.$val->total.'</td>
                                                    <td>'.($val->total * $val->correct).'</td>
                                                    <td>'.$val->time.'</td>
                                                    <td>'.$val->reg_time.'</td>
                                                    <td>'.$val->start.'</td>
                                                    <td>'.$val->end.'</td>
                                                </tr>';
                                                } 
                                            // }

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
      