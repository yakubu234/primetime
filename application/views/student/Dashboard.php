<!-- Background -->
        <div class="account-pages"></div>
        
        <style>
        .rat {
   display: inline-block;
}

.cat {
   display: none;
}

@media (max-width: 600px) {
    .rat {
       display: none;
    }

    .cat {
       display: inline-block;
    }
}
table.center {
    margin-left:auto; 
    margin-right:auto;
  }
        </style>

        <!-- Begin page -->
        <div class="m-b-10 m-t-40 col-sm-12">
            <div class="card" style="background-color:#DCDCDC;">
                <div class="card-block">
                    <div class="ex-page-content text-center">
                        <a class="btn btn-primary mb-5 waves-effect waves-light m-t-10" href="<?php echo base_url('Just_say_Logout'); ?>"><i class="mdi mdi-power" style="font-size: 20px;">Log Out</i> </a>                        
                    </div>
                            <div class="col-md-12">
                            <div class="card card-body">                                
                            <div class="row col-sm-12">
                                <div class="col-sm-9">
                                <div class="row" >
                                <div class="5" >
                                   <img class="rounded-circle shadow" alt="200x200" width="120" src="<?php echo base_url('Student_pic/'.$this->session->userdata('img')) ?>" data-holder-rendered="true">
                                </div>
                                <div class="col-sm-7 m-t-40">
                                    <h3 class="card-title font-16 mt-0">&nbsp;&nbsp;&nbsp;<b> Full Name:&nbsp;&nbsp;<?php echo $this->session->userdata('surname')." ".$this->session->userdata('firstname')." ".$this->session->userdata('middlename'); ?></b></h3>
                                <p class="card-text">&nbsp;&nbsp;&nbsp; <b>Registration Number:&nbsp;&nbsp; <?php echo $regNum =  $this->session->userdata('reg_num') ?></b></p>
                                </div>
                                </div>
                                </div>
                                <div class="col-sm-3">                                    
                                <img class="rounded shadow mr-2 mo-mb-2" alt="200x200" width="120" src="<?php echo base_url('logo/school_logo.png'); ?>" data-holder-rendered="true">
                                </div>
                            </div>
                            </div>
                            </div>

                    <!--  -->
                    <div class="col-md-12">
                        <div class="card m-b-10 card-body">
                          <table class="table table-bordered mb-0 rat col-md-8 center">
                            <thead>
                                <tr>
                                  <th>S/N</th>
                                  <th>Name</th>
                                  <th>Total Question</th>
                                  <th>Marks</th>
                                  <th>Duration</th>
                                  <th>Status</th>
                                  <th></th>
                                </tr>
                            </thead>
                            <?php 
                                foreach ($Exams_Available as $key => $value) {
                                    
                                        $duration = $value->duration;
                                        $time_remain = $value->time_remaining;
                                        $startDate = $value->startDate;
                                        $text = str_replace('-', '', $startDate);
                                        $old_date_timestamp = strtotime($text);
                                        $Converted_start_date = date('Y-m-d H:i:s', $old_date_timestamp);
                                        $endDate = str_replace('/', '-', $value->endDate);
                                        $txt = strtotime($endDate);
                                        $Converted_end_date = date('Y-m-d H:i:s', $txt);
                                        $now = strtotime(date("Y-m-d H:i:s"));

                                        if($now >= $Converted_start_date && $now < $Converted_end_date) {
                                         $constraint = "start";
                                        } else {
                                        $constraint = "do not start";
                                        }     
                                        
                                echo'
                                    <tr>
                                    <td>'.($key + 1).'</td>
                                    <td>'.$value->exam_name.'</td>
                                    <td>'.$totalQuestion = $value->totalQuestion.'</td>
                                    <td>'.$value->scoreObtainable.'</td>
                                    <td>'.$value->duration.'</td>
                                    <td>'.$status = $value->status.'</td>';
                                    if ($status == "Finished") {
                                         echo'
                                    <td>Your Time is up Your result will be announced to you</td>
                                ';
                                    }else if($status == "Ongoing"){
                                        $remaining = (($duration * 60) - ((time() - $time_remain)));
                                        if ($remaining >0 && $constraint == "start") {
                                            echo'
                                    <td>
                                    <a class="btn btn-Info waves-effect waves-light" href="Start_Exam_Now"><i class="mdi mdi-arrow-right-bold-box-outline" > &nbsp;Continue Exam</i> </a>
                                    </td>
                                ';
                                        }else{
                                            echo '<td>Your Time is up Your result will be announced to you</td>';
                                        }
                                         
                                    }else{
                                        if ($constraint == "start"||$constraint =="do not start") {
                                     echo'
                                    <td>
                                    <form action="'.base_url("Start_Exam_Now").'" method="POST">
                                    <input type="hidden" name="eid" value="'.$value->eid.'" >
                                    <input type="hidden" name="total" value="'.$value->totalQuestion.'" >
                                    <input type="hidden" name="regNum" value="'.$regNum.'" >
                                    <input type="hidden" name="duration" value="'.$duration.'" >
                                    <input type="hidden" name="start" value="start" >
                                    <input type="submit" class="btn btn-success waves-effect waves-light mdi mdi-arrow-right-bold-box-outline" value="&nbsp;Start Exam" >
                                    </form>  
                                    </td>
                                ';}else{
                                    echo '<td>Start Date has not yet reached or has passed contact the Administrator</td>';
                                }
                                }
                                   
                                }
                            ?>
                          </table>
                          
                          <div class="col-md-12 cat ">
                          <?php 
                                foreach ($Exams_Available as $key => $value) {
                                    
                                        $duration = $value->duration;
                                        $time_remain = $value->time_remaining;
                                        $startDate = $value->startDate;
                                        $text = str_replace('-', '', $startDate);
                                        $old_date_timestamp = strtotime($text);
                                        $Converted_start_date = date('Y-m-d H:i:s', $old_date_timestamp);
                                        $endDate = str_replace('/', '-', $value->endDate);
                                        $txt = strtotime($endDate);
                                        $Converted_end_date = date('Y-m-d H:i:s', $txt);
                                        $now = strtotime(date("Y-m-d H:i:s"));
                                        $status = $value->status;
                                        if($now >= $Converted_start_date && $now < $Converted_end_date) {
                                         $constraint = "start";
                                        } else {
                                        $constraint = "do not start";
                                        }
                                   }     
                                   
                                   echo '<p> Exam-Title: '.$value->exam_name.'</p>
                                    <p> Total Question: '.$totalQuestion = $value->totalQuestion.'</p>
                                    <p> Score Obtainable: '.$value->scoreObtainable.'</p>
                                    <p> Duration: '.$value->duration.'</p>';
                                    if ($status == "Finished") {
                                        # code...
                                        echo "<p>Your Time is up Your result will be announced to you</p>";
                                    }else{
                                        if ($constraint == "start" ) {
                                            echo "<p>Start Date has not yet reached or has passed contact the Administrator</p>";
                                        }else{
                                        echo '<form action="'.base_url("Start_Exam_Now_mobile").'" method="POST">
                                    <input type="hidden" name="eid" value="'.$value->eid.'" >
                                    <input type="hidden" name="total" value="'.$value->totalQuestion.'" >
                                    <input type="hidden" name="regNum" value="'.$regNum.'" >
                                    <input type="hidden" name="duration" value="'.$duration.'" >
                                    <input type="hidden" name="start" value="start" >
                                    <input type="submit" class="btn btn-success waves-effect waves-light mdi mdi-arrow-right-bold-box-outline" value="&nbsp;Start Exam" >
                                    </form>';
                                    }
                                }
                                        ?>
                                        
                                        
                          </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>