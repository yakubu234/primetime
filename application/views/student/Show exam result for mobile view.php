<!-- special css to make a rectanguar radio button  -->
 <style>
  /* [THE LOADING SPINNER] */

#overlay {
  background: black;
  color: #666666;
  position: fixed;
  height: 100%;
  width: 100%;
  z-index: 5000;
  top: 0;
  left: 0;
  float: left;
  text-align: center;
  padding-top: 18%;
  /*opacity: .80;*/
}

#overlay p{
	color:white;
	font-size: 20px;
}


.spinner {
    margin: 0 auto;
    height: 64px;
    width: 64px;
    animation: rotate 0.8s infinite linear;
    border: 5px solid firebrick;
    border-right-color: transparent;
    border-radius: 50%;
}
@keyframes rotate {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}

@media only screen and (max-width: 800px) {
  
#overlay {
  background: black;
  color: #666666;
  position: fixed;
  height: 100%;
  width: 100%;
  z-index: 5000;
  top: 0;
  left: 0;
  float: left;
  text-align: center;
  padding-top: 30%;
  /*opacity: .80;*/
}
}
    </style>
       <!-- special css to make a rectanguar radio button  -->
        <!-- Background -->

        <div id="overlay">
		    <div class="spinner"></div>
		    <br/>
		    <p>Exam Submitted Successfully <br>Result Loading...</p>
		</div>
        <div class="account-pages"></div>
      
        <div class="alert alert-success alert-dismissible fade show col-sm-12" role="alert" style="margin-bottom: -15px;">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <p class="text-center" style="font-size: 20px;"><b><a class="btn btn-primary" href="<?php echo base_url('Just_say_Logout'); ?>"><i class="mdi mdi-power">Log Out</i> </a> </b></p> 
                    </div>
        <!-- Begin page -->
        <div class="m-t-10 col-sm-12">
                  <!-- [THE SPINNER - THIS IS ALL YOU NEED] -->
		   
            <div class="card" style="background-color:#DCDCDC;width: 100%;">
                <div class="card-block">
                	<div class="row " style="padding: 20px 10px;" >
                		<div class="col-sm-12" >
                		<table id="datatable" class="table table-bordered dt-responsive col-sm-12">
                                        <thead>
                                        <tr><div class="row" >
                                            <th><div class="col-sm-1" >S/N</div></th>
                                            <th><div class="col-sm-5" >QUESTION</div></th>
                                            <th> <div class="col-sm-3" >YOUR ANSWER</div></th>
                                            <th><div class="col-sm-3" >RIGHT ANSWER</div></th>
                                        </div>
                                        </tr>
                                        </thead>


                                        <tbody>
                                        <?php
                                        $reg_num = $this->session->userdata('reg_num');
                                        $eid = $this->session->userdata('eid');
                                        $sel = "SELECT  student_history.qid,student_history.sn,student_history.user_answer_id, student_history.qid_sn, question.question, question.id, question.exam_name, question.subject, question.optionA, question.optAid, question.optionB, question.optBid, question.optionC,question.optCid,question.optionD,question.optDid, question.correct FROM student_history INNER JOIN question ON student_history.qid = question.qid WHERE student_history.reg_num = '$reg_num' AND student_history.eid = '$eid' AND user_answer_id<>correct_id";
                                        $query = $this->db->query($sel);
                                     foreach ($query->result_array() as $key => $row) {
                                     	// echo $row['optionA'];
                                     	$question = $row['question'];
							        $correct_view = $row['correct'];
							        $idA= $row['optAid'];
							        $idB= $row['optBid'];
							        $idC= $row['optCid'];
							        $idD= $row['optDid'];
							        $student_ans = $row['user_answer_id'];
							        switch ($correct_view) {
							                case 'a':
							                  $correct_view = $row['optionA'];
							                  break;
							                case 'b':
							                  $correct_view = $row['optionB'];
							                  break;
							                case 'c':
							                  $correct_view = $row['optionC'];
							                  break;
							                case 'd':
							                  $correct_view = $row['optionD'];
							                  break;
							            }
							        $User_View = '';
							        switch ($student_ans) {
							                case $idA:
							                  $User_View = $row['optionA'];
							                  break;
							                case $idB:
							                  $User_View = $row['optionB'];
							                  break;
							                case $idC:
							                  $User_View = $row['optionC'];
							                  break;
							                case $idD:
							                  $User_View = $row['optionD'];
							                  break;
							            } 

							          echo'  <tr>
							          <div class="row">
                                            <td ><div class="col-sm-1" >'.(1+$key).'</div></td>
                                            <td><div class="col-sm-5" >'.$question.'</div></td>
                                            <td><div class="col-sm-3" >'.$User_View.'</div></td>
                                            <td><div class="col-sm-3" >'.$correct_view.'</div></td>
                                            </div>
                                        </tr>';                                    
                                     }
                                        ?>
                                        </tbody>
                                    </table>
                	</div>
                </div>
                </div>
            </div>
        </div>


<!-- to disable backspace -->
<script>
$('#overlay').fadeIn().delay(5000).fadeOut();
//divs to show by qquestion

            </script>
<!-- to disable backspace ended -->
        