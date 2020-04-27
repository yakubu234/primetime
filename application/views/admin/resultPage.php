<?php
if ($this->session->userdata('username') == '' ) {
  redirect(base_url().'/');
}else{
$email = $this->session->userdata('email') ;
$username = $this->session->userdata('username');
$name = $this->session->userdata('name');
$id = $this->session->userdata('id');
}

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
?>

<!DOCTYPE html>
<!-- resultPage.php -->
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <meta name="viewport" content="user-scalable=yes, shrink-to-fit=yes" />
    <link rel="preconnect" href="fonts.googleapis.com" />
    <link
      rel="prefetch"
      as="style"
      href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700&display=swap"
    />
    <link rel="stylesheet" href="<?php echo base_url(); ?>printDesign/css/taidob.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>printDesign/css/taidob.css" />
    <link
      href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700&display=swap"
      rel="stylesheet"
    />
    <title>Taidob College</title>
  </head>
  <body>
    <div class="doc-top-level">
      <div class="layout">
        <div class="doc w-100" style="overflow-y: auto;">
          <div class="header">
            <header> 
              <h1><?php echo  $examName; ?></h1>
              <h3>Candidate's Result</h3>
              <div class="avatar">
                <img class="avatar-img" onerror="this.src= '<?php echo base_url();?>Student_Pic/dummy.png';" <?php  echo 'src="'.base_url()."Student_Pic/".$img.'"';?>>
              </div>
            </header>
          </div>
          <div>
            <button class="print-button" onclick="window.print()">
              <span class="mr-3">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="-2 -2 24 24" width="20" height="20" preserveAspectRatio="xMinYMin" class="jam jam-printer"><path d='M16 14h1a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h1V9h12v5zM4 4V0h12v4h1a3 3 0 0 1 3 3v6a3 3 0 0 1-3 3h-1v4H4v-4H3a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h1zm2 14h8v-7H6v7zM6 4h8V2H6v2z'/></svg>
              </span>
              <span>Print</span>
            </button>
          </div>
          <div class="candidate-info">
            <h2>Candidate's Information</h2>
            <div class="data">
              <div class="table-head">
                Registration Number: <?php echo $reg_num;?>
              </div>
              <table>
                <tbody>
                  <tr>
                    <td>Name</td>
                    <td><?php echo $Candidatename; ?></td>
                  </tr>
                  <tr>
                    <td>Gender</td>
                    <td><?php echo $gender; ?></td>
                  </tr>
                  <tr>
                    <td>Group</td>
                    <td><?php echo $Category; ?></td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="data">
              <div class="table-head">
                Test Details
              </div>
              <table>
                <tbody>
                  <tr>
                    <td>Test Name:</td>
                    <td><?php echo  $examName; ?></td>
                  </tr>
                  <tr> 
                    <td>Total Question Set</td>
                    <td><?php echo $totalQuestion;  ?></td>
                  </tr>
                  <tr>
                    <td>Maximum Score Obtainable</td>
                    <td><?php echo  $ScoreObtainable; ?></td>
                  </tr>
                  <tr>
                    <td>Time Allocated</td>
                    <td><?php echo $timeAllocated; ?> (mins)</td>
                  </tr>
                  <tr>
                    <td>Date/Time Conducted</td>
                    <td><?php echo  $TimeConducted; ?></td>
                    <!-- <td>10:02am - Saturday, 21st March, 2020</td> -->
                  </tr>
                  <tr>
                    <td>Time Spent</td>
                    <td>44mins</td>
                  </tr>

                  <tr>
                    <td>Cummulative Pass Mark</td>
                    <td><?php echo round($CummulativePassMark,0) ; ?> %</td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="data">
              <div class="table-head">
                CBT Score Analysis
              </div>
              <table>
                <tbody>
                  <tr>
                    <td>Test Name:</td>
                    <td><?php echo  $examName; ?></td>
                  </tr>
                  <?php
                   foreach ($count_course as $key => $subjects) {
                   foreach ($score_per_subject as $key => $row) {
                   if ($subjects['subject'] == $row['subject']) {
                   echo'<tr> <td>'. $subjects['subject']." &nbsp;&nbsp;</td><td>&nbsp;&nbsp; ".$row['COUNT(*)']." / ".$subjects['COUNT(*)']."</td></tr>"; 
                   } else{
                   echo '<tr> <td>'.$subjects['subject']." &nbsp;&nbsp;</td><td>&nbsp;&nbsp; "." 0/ ".$subjects['COUNT(*)']."</td></tr>"; 
                    }
                  } 
                }
                  ?>
                  <tr>
                    <td>Cummulative CBT Score</td>
                    <td>&nbsp;&nbsp;&nbsp;<?php echo $CummulativeCBTScore; ?> %</td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="result">
              <table>
                <tbody>
                  <tr>
                    <td>
                      <span>TOTAL SCORE</span>
                    </td>
                    <td>
                      <span><?php echo  $nowScore.'&nbsp;&nbsp;( '.$per. '% )';?></span>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="data">
              <div class="table-head">
                Score Analysis
              </div>
              <table>
                <tbody>
                  <tr>
                    <td>Computer Based Test</td>
                    <td><?php echo $score.' / '.$totalQuestionReady;?></td>
                  </tr>
                  <?php
                  echo '<tr '.$divStyle.'>
                    <td>Theory</td>
                    <td>'.$theory.'/30</td>
                  </tr>';?>
                </tbody>
              </table>
            </div>
          </div>

          <div class="notice">
            <b>Note:</b>
            <p>
              Please visit
              <a href="//www.larikencollege.com">www.larikencollege.com</a> as
              from Friday, April 24, 2020 for the name of shortlisted candidates
              in the just concluded entrance examination.
            </p>
          </div>
        </div>

        <div class="sidebar">
          <div class="favicon">
            <img class="favicon-img" src="<?php echo base_url(); ?>logo/lariken.png" id="favicon_image_light" />
            <img class="favicon-img print-dark" src="<?php echo base_url(); ?>logo/lariken-black.png" />
          </div>
          <div style="color: honeydew; margin-top: 1.5rem;">
            Harmony Gold Estate, Opp. Olonde Estate, Ologuneru, Ibadan, Oyo
            State.
          </div>
          <div class="footer">
            <div class="group">
              <p>
                For Complaints or Enquires Please call
              </p>
              <span>08034015600</span><br />
              <span>07066063262</span><br />
              <span>09060003940</span>
            </div>
            <div class="group">
              <p>
                E-mail
              </p>
              <a href="mailto:internationalexams@larikencollege.com" style="word-wrap: break-word;word-break: break-all;">internationalexams@larikencollege.com</a>
              <a href="http://www.larikencollege.com/">www.larikencollege.com</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
