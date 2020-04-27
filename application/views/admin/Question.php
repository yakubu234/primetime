        <?php
           $total = $this->session->userdata('Total_Number');
           $number = $this->session->userdata('Number_now');
           $eid = $this->session->userdata('Exam_id');
           $exam_name = $this->session->userdata('Exam_name');
        ?>
        <!-- page wrapper start -->
         <style>
  /* [THE LOADING SPINNER] */

#overlay {
  background-color: black;
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
<div id="overlay">
            <div class="spinner"></div>
            <br/>
            <p>Question Interface <span id="countdown_by_me"></span> <br>Loading...</p>
        </div>
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
                                <div class="card">
                                    <div class="card-body">
                                    <h4>Enter Question Details</h4>
                                        <form method="POST" onsubmit="return validate(this);" action="<?php echo base_url('You_Are_Adding_Question?q='.$eid.'&sessions=val1=1234567 al2=abcdef al3=ABCDEF'); ?>" enctype="multipart/form-data" >
                                     <div class="form-group col-sm-3">
                                        <input type="hidden" name="eid" value="<?php echo $eid; ?>" >
                                        <input type="hidden" name="exam_name" value="<?php echo $exam_name; ?>" >
                                        <div id="errorInPopup" class="error displayInlineBlock"></div>
                                            <label class="control-label">Single Select</label>
                                            <select class="form-control select2" name="subject" required="" id="subject_entered">
                                                <option selected="" disabled="" value="0" >Choose Subject</option>
                                                <?php
                                                if ($subjects) {
                                                    foreach ($subjects as $row){
                                              echo" <option value='". $row['name']."'>". $row['name']."</option>";
                                             }
                                                    } 
                                                    ?>                         
                                            </select>
                                        </div>
                                <?php 
                                // $i = 1; while($i <= $number){
                                 for ($i = 1; $i <= $number; $i++){
                                        echo'<div class="row" >
                                        <div class="form-group col-sm-9">
                                                <textarea rows="5" class="summernote form-control" style="max-height:130px;" placeholder="Question 1" name="question[]" required="">
                                                    Write question number ' . $i . ' here...
                                                </textarea>
                                            </div>
                                            <div class="form-group col-sm-3">
                                            <select class="form-control select2" name="answer[]" required="">
                                                <option>Select answer for question ' . $i . '</option>
                                                <option value="a">option a</option>
                                                <option value="b">option b</option>
                                                <option value="c">option c</option>
                                                <option value="d">option d</option> 
                                            </select>
                                        </div>
                                        </div>
                                        <div class="row" >
                                            <div class="form-group col-sm-6">
                                                <textarea rows="5" class="summernote form-control" style="max-height:130px;" placeholder="Question 1" name="optionA[]" required="">
                                                    Enter option A 
                                                </textarea>
                                            </div>

                                            <div class="form-group col-sm-6">
                                                <textarea rows="5" class="summernote form-control" placeholder="Question 1" name="optionB[]" required="">
                                                    Enter option B
                                                </textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="row" >
                                            <div class="form-group col-sm-6">
                                                <textarea rows="5" class="summernote form-control" placeholder="Question 1" name="optionC[]" required="">
                                                    Enter option C
                                                </textarea>
                                            </div>

                                            <div class="form-group col-sm-6">
                                                <textarea rows="5" class="summernote form-control" placeholder="Question 1" name="optionD[]" required="">
                                                    Enter option D
                                                </textarea>
                                            </div>
                                        </div>
                                         ';
                                        // $i++;
                                    } ?>
                                                                    
    
                                            <div class="btn-toolbar form-group mb-0">
                                                <div class="">
                                                    <button type="button" class="btn btn-success waves-effect waves-light m-r-5"><i class="far fa-save"></i></button>
                                                    <button class="btn btn-primary waves-effect waves-light" type="submit" onclick="Process_form();"> <span>Add Questions</span> <i class="fab fa-telegram-plane m-l-10"></i> </button>
                                                </div>
                                            </div>    
                                        </form>
                                    </div>    
                                </div>    
                        </div>
    
                    </div><!-- End row -->

                </div>
                <!-- end container-fluid -->
            </div>
            <!-- end page content-->

        </div>
        <!-- page wrapper end -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
        <script>            
var validate = function(form) {
  var selectedVal = $('#subject_entered').val();
  if (selectedVal == 0) {
    alert('Agency has to numeric !');
    return false;
  } else {
    return true;
  }
};
// autoload form
    var timeleft = 10;
var downloadTimer = setInterval(function(){
  if(timeleft <= 0){
    clearInterval(downloadTimer);
    document.getElementById("countdown_by_me").innerHTML = " ";
  } else {
    document.getElementById("countdown_by_me").innerHTML = timeleft + " seconds";
  }
  timeleft -= 1;
}, 1000);
    // diplay the loader for 5 seconds 
    $('#overlay').fadeIn().delay(10000).fadeOut();
        </script>