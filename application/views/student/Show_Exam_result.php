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
        <?php
                                       $StudentResult;#for information at exam ready
$count_course ; #for listing course answered by subject and total taken either correct or incorrect
$score_per_subject; #for score per subject
$BroadSheet ; ##information of the exam at the exam table ##
foreach ($BroadSheet as $key => $value) {
  # code...
  $examName = $value->title;
  $totalQuestion = $value->total;
  $timeAllocated = $value->time;
  $TimeConducted = $value->start;
  $CummulativePassMark = $value->passmark;
  $ScoreObtainable = ($value->correct * $totalQuestion);

}

foreach ($StudentResult as $key => $examReady) {
  # code...
  $reg_num = $examReady->reg_num;
  $Candidatename = $examReady->name;
  $gender = $examReady->gender;
  $totalQuestionReady = $examReady->totalQuestion;
  $theory = $examReady->theory;
  $score = $examReady->score;
  $correct = $examReady->correct;
  $wrong = $examReady->wrong;
  $Category  = $examReady->Category;
  $img  = $examReady->img;

  if ($score <= 0) {
    $score = 0;
  }
  $totalByGrade = $totalQuestionReady + 30;
  if($score >= 0 && $theory !=""){
    $nowScore = $score + 30;
      $divStyle=''; // show theory row
      $per = round(((($theory+$score)*100)/$totalByGrade),1);
    }else if($score >= 0){
      $nowScore = $score;
      
  $divStyle='style="display:none;"'; //hide theory row
  $per = round((($score*100)/$totalQuestionReady),1);
}
}
$CummulativeCBTScore= round((($score*100)/$totalQuestion),1);

echo '<div class="data">
              <div class="table-head">
                Registration Number: <b>'.$reg_num.'</b>
              </div>
              <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <tbody>
                  <tr>
                    <td>Name</td>
                    <td> <b> '.$Candidatename.' </b></td>
                  </tr>
                  <tr>
                    <td>Gender</td>
                    <td> <b> '.$gender.' </b></td>
                  </tr>
                  <tr>
                    <td>Group</td>
                    <td>'.$Category.'</td>
                  </tr>
               
                  <tr>
                    <td>Test Name:</td>
                    <td>'. $examName. ' </td>
                  </tr>
                  <tr> 
                    <td>Total Question Set</td>
                    <td>'.$totalQuestion.'</td>
                  </tr>
                  <tr>
                    <td>Maximum Score Obtainable</td>
                    <td>'.  $ScoreObtainable.' </td>
                  </tr>
                  <tr>
                    <td>Time Allocated</td>
                    <td>'.$timeAllocated. ' (mins)</td>
                  </tr>
                  <tr>
                    <td>Date/Time Conducted</td>
                    <td>'. $TimeConducted.'</td>
                    <!-- <td>10:02am - Saturday, 21st March, 2020</td> -->
                  </tr>
                  <tr>
                    <td>Time Spent</td>
                    <td>44mins</td>
                  </tr>

                    <tr>
                      <td>Score</td>
                      <td>'.$score.'</td>
                    </tr>
              </table>
            </div>

            ';

echo '<table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
  <tr><th><div class="table-head">
                CBT Score Analysis
              </div></th></tr>';
 foreach ($count_course as $key => $subjects) {
                   foreach ($score_per_subject as $key => $row) {
                   if ($subjects['subject'] == $row['subject']) {
                   echo'<tr> <td>'. $subjects['subject']." &nbsp;&nbsp;</td><td>&nbsp;&nbsp; ".$row['COUNT(*)']." / ".$subjects['COUNT(*)']."</td></tr>"; 
                   } else{
                   echo '<tr> <td>'.$subjects['subject']." &nbsp;&nbsp;</td><td>&nbsp;&nbsp; "." 0/ ".$subjects['COUNT(*)']."</td></tr>"; 
                    }
                  } 
                }
      echo '<table>';
?>
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
