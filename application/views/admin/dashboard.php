
<style type="text/css">
    /*bootswitch*/
    .switch-field {
    display: flex;
    margin-bottom: 36px;
    overflow: hidden;
}

.switch-field input {
    position: absolute !important;
    clip: rect(0, 0, 0, 0);
    height: 1px;
    width: 1px;
    border: 0;
    overflow: hidden;
}

.switch-field label {
    background-color: #e4e4e4;
    color: rgba(0, 0, 0, 0.6);
    font-size: 14px;
    line-height: 1;
    text-align: center;
    padding: 8px 16px;
    margin-right: -1px;
    border: 1px solid rgba(0, 0, 0, 0.2);
    box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.1);
    transition: all 0.1s ease-in-out;
}

.switch-field label:hover {
    cursor: pointer;
}

.switch-field input:checked + label {
    background-color: red;
    box-shadow: none;
}

.switch-field label:first-of-type {
    border-radius: 4px 0 0 4px;
}

.switch-field label:last-of-type {
    border-radius: 0 4px 4px 0;
}
    /*bootswitch*/
</style>
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
                              <div class="alert alert-primary alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                <?=$this->session->flashdata('errors'); ?>
                              </div>
                              
                            <?php } ?>
                            <!-- success -->
                            <?php if ($this->session->flashdata('success')) { ?>
                              <div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                <?=$this->session->flashdata('success');?>
                              </div>
                              
                            <?php } ?>
                            
                          </div>
                        <div class="col-12">
                                <div class="alert alert-warning bg-warning text-white col-sm-12" role="alert">
                                            <strong>Warning!</strong> Please note that exams are automatically disabled at creation. Hence  exams that are not enabled cannot be accessible by the student, Kindly enable using the switch button for student to have access to it
                                </div>
                            <div class="card m-b-20">
                                <div class="card-body">
    
                                    <h4 class="mt-0 header-title">Exams in the database</h4>
                                    <!-- <p class="text-muted m-b-30">This is an experimental awesome solution for responsive tables with complex data.</p> -->
    
                                    
                                            <table id="datatable" class="table table-bordered dt-responsive">
                                                <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Name</th>                                <th>Total Question</th>
                                                    <th>Marks</th>
                                                    <th>Duration (Mins)</th>
                                                    <!-- <th>Date Created</th> -->
                                                    <th>Start Date</th>
                                                    <th>End Date</th>
                                                    <th>Status</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                     <?php
                                                $get_data=$this->User_Model->get_table_data();    
                                                // $sn = is_countable($val->title);
                                                        // for ($sn = 1; $sn <= 10; $sn++) {
                                                    foreach($get_data as $key => $val){
                                               echo ' <tr>
                                                    <th>'.(1+$key).'</th>
                                                    <th>'.$val->title.' </th>
                                                    <td>'.$val->total.'</td>
                                                    <td>'.($val->total * $val->correct).'</td>
                                                    <td>'.$val->time.'</td>
                                                    <td>'.$val->start.'</td>
                                                    <td>'.$val->end.'</td>';
                                                    if ($val->status == "") {
                                                        $status = '<form method="POST" action="'.base_url('Update_Exam_to_Enable?q=quiz&step=2&eid=' . $val->eid .'&t=' . $val->total).'">
                                                        <input type="hidden" name="eid" value="'.$val->eid.'"/>
                                                        <input type="hidden" name="total" value="'.$val->total.'"/>
                                                        <div class="switch-field">
                                                        <input type="radio" id="radio-one" name="switch_one" value="disable" checked onclick="javascript: submit()" />
                                                        <label for="radio-one">Disabled</label>
                                                        <input type="radio" id="radio-two" name="switch_one" value="enable" onclick="javascript: submit()" />
                                                        <label for="radio-two">Enable</label>
                                                    </div></form>';
                                                    }else{
                                                         $status = '<form method="POST" action="'.base_url('Update_Exam_to_Enable?q=quiz&step=2&eid=' . $val->eid .'&t=' . $val->total).'">
                                                        <input type="hidden" name="eid" value="'.$val->eid.'"/>
                                                        <input type="hidden" name="total" value="'.$val->total.'"/>
                                                        <div class="switch-field">
                                                        <input type="radio" id="radio-one" name="switch_one" value="disable"  onclick="javascript: submit()" />
                                                        <label for="radio-one">Disabled</label>
                                                        <input type="radio" id="radio-two" name="switch_one" checked value="enable" onclick="javascript: submit()" />
                                                        <label for="radio-two">Enable</label>
                                                    </div></form>';
                                                    }
                                                    echo'
                                                    <td>'.$status.'</td>
                                                </tr>';
                                                } 
                                            // }

                                             ?>                                         
                                                
                                                </tbody>
                                            </table>    
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
      