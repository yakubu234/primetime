<!-- special css to make a rectanguar radio button  -->
 <style>
.boxed:after{
            content: "";
            display: table;
            clear: both;
        }
   .boxed label {
  display: inline-block;
  width: 94%;
  padding: 10px;
  border: solid 2px #ccc;
  transition: all 0.3s;
  cursor: pointer;
}

.boxed input[type="radio"] {
  display: none;
}

.boxed input[type="radio"]:checked + label {
  border: solid 2px green;
}
    </style>
       <!-- special css to make a rectanguar radio button  -->
        <!-- Background -->
        <div class="account-pages"></div>

        <!-- Begin page -->
        <div class="m-b-10 m-t-40 col-sm-12">
            <div class="card" style="background-color:#DCDCDC;">
                <div class="card-block">
                    <div class="alert alert-success alert-dismissible fade show col-sm-12" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <p class="text-center" style="font-size: 20px;"><b><?php 
                                                   echo '<span > Full Name: &nbsp;&nbsp;&nbsp;</span>'.$fullname = $this->session->userdata('surname')." ".$this->session->userdata('firstname')." ".$this->session->userdata('middlename'); echo '<span > &nbsp;&nbsp;&nbsp;Registration Number: &nbsp;&nbsp;&nbsp;</span>'.$reg_num = $this->session->userdata('reg_num');?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-primary" href="<?php echo base_url('Just_say_Logout'); ?>"><i class="mdi mdi-power"></i> </a> </b></p> 
                    </div>
                            <div class="col-md-12">
                            <div class="card card-body">
                                <?php
                                $sn= $this->session->userdata('sn');
                                $eid = $this->session->userdata('eid');
                                $total = $this->session->userdata('Total_Number');
                                 $remaining = (($this->session->userdata('duration')* 60) - ((time() - $this->session->userdata('time_remaining'))));
            echo '<script>
            var seconds = ' . $remaining . ' ;
            function end(){
                data = prompt("Are you sure to submit this exam? Remember, once you have submitted, you wont be able to modify it anymore. If you want to continue then enter \\"yes\\" in the textbox below and press enter");
                if(data=="yes"){
                    window.location ="save_answer.php?q=quiz&step=2&eid=' . $eid . '&n=' . $sn . '&t=' . $total . '&endquiz=end";
                }
            }
            
            function enable(){
                document.getElementById("sbutton").removeAttribute("disabled");

            }

            function secondPassed() {
                var minutes = Math.round((seconds - 30)/60);
                var remainingSeconds = seconds % 60;
                if (remainingSeconds < 10) {
                    remainingSeconds = "0" + remainingSeconds; 
                }
                document.getElementById(\'countdown\').innerHTML = minutes + ":" +    remainingSeconds;
                if (seconds <= 0) {
                    clearInterval(countdownTimer);
                    document.getElementById(\'countdown\').innerHTML = "Time Up...";
                    window.location ="save_answer.php?q=quiz&step=2&eid=' . $eid . '&n=' . $sn . '&t=' . $total . '&endquiz=end";
                    } else {    
                        seconds--;
                    }
                }
                var countdownTimer = setInterval(\'secondPassed()\', 1000);
                </script>';
                ?>
                <button class="btn btn-primary waves-effect waves-light col-sm-2 text-center" style="margin: 0px auto;"> <b>Time Left : <span id="countdown"></span></b></button>                                
                 <div class="row col-sm-12">
                                <?php
                                foreach ($Exams_Questions as $key => $value) {
                    $qns =  html_entity_decode(html_entity_decode($value->question, ENT_QUOTES, "utf-8"), ENT_QUOTES, "utf-8");
                    $optionA =  html_entity_decode(html_entity_decode($value->optionA, ENT_QUOTES, "utf-8"), ENT_QUOTES, "utf-8");
                    $optionB =  html_entity_decode(html_entity_decode($value->optionB, ENT_QUOTES, "utf-8"), ENT_QUOTES, "utf-8");
                    $optionC =  html_entity_decode(html_entity_decode($value->optionC, ENT_QUOTES, "utf-8"), ENT_QUOTES, "utf-8");
                    $optionD =  html_entity_decode(html_entity_decode($value->optionD, ENT_QUOTES, "utf-8"), ENT_QUOTES, "utf-8");
                    $optAid = $value->optAid;
                    $qid = $value->qid;
                    $qid_sn = $value->id;
                    $optBid = $value->optBid;
                    $optCid = $value->optCid;
                    $optDid  = $value->optDid;
                    $correctId  = $value->correctId;
                    $subject = $value->subject;
                                }
                                echo '<div class="mb-5 col-sm-12 question" style="margin-left:65px;margin-top:20px;"><div class="row"><tr><td><div>' . $sn . '</div> : &nbsp;&nbsp;</td><td><div>'.$qns.'</div></td></tr></div></div>';
                                echo '<form action="'.base_url('save_answer_selected?q=quiz&step=2&eid=' . $eid . '&n=' . $sn . '&t=' . $total . '&qid=' . $qid).'" method="POST"> <input type="hidden" value="'.$subject.'" name="subject" />
                                    <input type="hidden" value="'.$total.'" name="total" />
                                    <input type="hidden" value="'.$sn.'" name="current" />
                                    <input type="hidden" value="'.$qid.'" name="qid" />
                                    <input type="hidden" value="'.$qid_sn.'" name="qid_sn" />
                                    <input type="hidden" value="'.$correctId.'" name="correct" />
                                    <br/>
                                    <div class="boxed col-sm-12 row"><tr><td><div style="font-size:18px;">(A)</div></td><td><div>&nbsp;&nbsp;<input type="radio" id="'.$optAid.'" name="ans" value="'.$optAid.'" onclick="enable()"><label for="'.$optAid.'">'.$optionA.'</label></div></td></tr>
                                    </div>

                                    <div class="boxed "><tr><td><span  style="font-size:18px;display:inline-block;">(B)</span></td><td>&nbsp;&nbsp;<input type="radio" id="' . $optBid . '" name="ans" value="'.$optBid.'" onclick="enable()"><label for="'.$optBid.'">'.$optionB.'</label></td></tr>
                                    </div>

                                    <div class="boxed"><span  style="font-size:18px;">(C)</span>&nbsp;&nbsp;<input type="radio" id="'.$optCid.'" name="ans" value="'.$optCid.'" onclick="enable()"><label for="'.$optCid.'">'.$optionC.'</label>
                                    </div>

                                    <div class="boxed"><span  style="font-size:18px;">(D)</span>&nbsp;&nbsp;<input type="radio" id="'.$optDid.'" name="ans" value="'.$optDid.'" onclick="enable()"><label for="'.$optDid.'">'.$optionD.'</label>
                                    </div>

                                        <p class="text-center" style="margin-top:10px;"><input type="submit" class="btn btn-info" disabled="true" id="sbutton" value="Next" > </p></form>
                                    ';
                                ?>
                </div>

                <!-- card button  -->
            <!-- <div class="card"> -->
                <div class="card-block" >
                    <div class="col-md-12">
                            <div class="card card-body" style="background-color:#DCDCDC;">
                                <!-- options button  -->
                                <?php
                                  $q ="SELECT student_history.qid,student_history.sn, student_history.qid_sn, question.qid FROM student_history INNER JOIN question ON student_history.qid_sn = question.id WHERE student_history.eid='$eid' AND student_history.reg_num = '$reg_num'";
                                    $i=1;
                                    // $ret = array();  
                                    $query = $this->db->query($q);
                                    if ($query->num_rows() > 0) {                 
                                    foreach ($query->result() as $key => $value) {
                                          $ret[$i][$key] = $value;
                                            }$i++;
                                        }
                                        $Total_now = 1;
                                    // get all question here
                                    $q ="SELECT * FROM question  WHERE eid='$eid'";
                                     $query = $this->db->query($q);
                                    echo '<div class="row">';
                                     foreach ($query->result_array() as $key => $row) {
                                    echo '<a style="margin:2px;" class="btn btn-';  
                                    foreach($ret as $val){ 
                                    if(is_array($val))
                                    if(in_array($Total_now,array_column($val, 'sn'))){
                                        echo "primary".'" href=" '.base_url().'Welcome/JumpQuestion_Exam/' . $eid . '/' . $Total_now . '/' . $total . '" ';
                                    } 
                                    else {
                                       echo "success".'" href=" '.base_url().'Welcome/JumpQuestion_Exam/' . $eid . '/' . $Total_now . '/' . $total . '" ';
                                    }  
                                    }            
                                     echo '>' . $Total_now . '</a>';
                                     if ($Total_now++ == $total) {
                                     break;
                                    }
                                    } echo "</div>";
                                ?>
                                <!-- options button ended -->
                            </div>
                        </div>
                    </div>
                <!-- </div> -->
                <!-- card button ended -->
                </div>
                </div>
                </div>
            </div>

        </div>

<!-- to disable backspace -->
<script>
                (function (global) { 

    if(typeof (global) === "undefined") {
        throw new Error("window is undefined");
    }

    var _hash = "!";
    var noBackPlease = function () {
        global.location.href += "#";

        // making sure we have the fruit available for juice (^__^)
        global.setTimeout(function () {
            global.location.href += "!";
        }, 50);
    };

    global.onhashchange = function () {
        if (global.location.hash !== _hash) {
            global.location.hash = _hash;
        }
    };

    global.onload = function () {            
        noBackPlease();

        // disables backspace on page except on input fields and textarea..
        document.body.onkeydown = function (e) {
            var elm = e.target.nodeName.toLowerCase();
            if (e.which === 8 && (elm !== 'input' && elm  !== 'textarea')) {
                e.preventDefault();
            }
            // stopping event bubbling up the DOM tree..
            e.stopPropagation();
        };          
    }

})(window);
            </script>
<!-- to disable backspace ended -->
        