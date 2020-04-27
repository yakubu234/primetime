<!-- special css to make a rectanguar radio button  -->
<!-- Show loading image while my controller execute a function -->
      <meta id="viewport" name="viewport">

<script type="text/javascript">
//mobile viewport hack
(function(){

  function apply_viewport(){
    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)   ) {

      var ww = window.screen.width;
      var mw = 800; // min width of site
      var ratio =  ww / mw; //calculate ratio
      var viewport_meta_tag = document.getElementById('viewport');
      if( ww < mw){ //smaller than minimum size
        viewport_meta_tag.setAttribute('content', 'initial-scale=' + ratio + ', maximum-scale=' + ratio + ', minimum-scale=' + ratio + ', user-scalable=no, width=' + mw);
      }
      else { //regular size
        viewport_meta_tag.setAttribute('content', 'initial-scale=1.0, maximum-scale=1, minimum-scale=1.0, user-scalable=yes, width=' + ww);
      }
    }
  }

  //ok, i need to update viewport scale if screen dimentions changed
  window.addEventListener('resize', function(){
    apply_viewport();
  });

  apply_viewport();

}());
</script>
 <style>

#landscape { display:block; }

@media only screen and (orientation:portrait){

  #landscape {

   height: 100vw;

   -webkit-transform: rotate(90deg);

   -moz-transform: rotate(90deg);

   -o-transform: rotate(90deg);

   -ms-transform: rotate(90deg);

   transform: rotate(90deg);

  }

}

@media only screen and (orientation:landscape){

  #landscape {

  -webkit-transform: rotate(0deg);

  -moz-transform: rotate(0deg);

  -o-transform: rotate(0deg);

  -ms-transform: rotate(0deg);

  transform: rotate(0deg);

   }
}

        .rat {
   display: block;
}

.cat {
   display: none;
}


        
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
/*the loading spiner ends below is the rectangular button*/
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

.play button{
    background: green;
    width:20px;
    /*padding: 5px;*/
    margin:3px;
    color: white
}
.danger-now{    background: red;}

.boxed input[type="radio"] {
  display: none;
}

.boxed input[type="radio"]:checked + label {
  border: solid 2px green;
}
    </style>
       <!-- special css to make a rectanguar radio button  -->
        <!-- Background -->
         <div id="overlay" style="display:none;">
            <div class="spinner"></div>
            <br/>
            <p>Exam is Starting in <span id="countdown_by_me"></span> <br>Question Loading...</p>
        </div>
   
        <!-- Begin page -->
        <div class="m-t-10 col-sm-12" id="landscape">
                  <!-- [THE SPINNER - THIS IS ALL YOU NEED] -->
            <div class="card" style="background-color:#DCDCDC;">
                <div class="card-block">
                  <br>
                            <div class="col-md-12">
                            <div class="card card-body">
                                <?php
                                $sn= $this->session->userdata('sn');
                                $eid = $this->session->userdata('eid');
                                $total = $this->session->userdata('Total_Number');
                                 $remaining = (((0.05 + $this->session->userdata('duration'))* 60) - ((time() - $this->session->userdata('time_remaining'))));
            echo '<script>
            var seconds = ' . $remaining . ' ;
            function end(){
                data = prompt("Are you sure to submit this exam? Remember, once you have submitted, you wont be able to modify it anymore. If you want to continue then enter \\"yes\\" in the textbox below and press enter");
                if(data=="yes"){
                    document.getElementById("form").submit();
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
                    document.getElementById("form").submit();
                    } else {    
                        seconds--;
                    }
                }
                var countdownTimer = setInterval(\'secondPassed()\', 1000);
                </script>';
                ?>
                <div class="row" style="margin: 0px auto;">
                <button class="btn btn-primary waves-effect waves-light col-sm-9 text-center" > <b>Time Left : <span id="countdown"></span></b></button>    &nbsp;&nbsp;<a class="btn btn-primary" href="<?php echo base_url('Just_say_Logout'); ?>"><i class="mdi mdi-power"></i> </a></div>                            
                 <div class="row col-sm-12">
                                <?php
                                echo '<form action="'.base_url('save_answer_selected?q=quiz&step=2&eid=' . $eid . '&n=12xooiei29&t=' . $total).'"  method="POST" id="form">
                                    <input type="hidden" value="'.$total.'" name="total" />';
                             shuffle($Exams_Questions);
                             $Total_now = 1;   
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
                                if($Total_now==1){
                                    $sn = $Total_now-1;
                                echo '<div class="col-sm-12 cont" id="question'.$Total_now.'"style="margin-left:65px;margin-top:20px;">
                                <p class="questions" id="qname'.$Total_now.'"></p>
                                <div class="row"><tr><td><div class="col-sm-1">' . $Total_now . '</div> : &nbsp;&nbsp;</td><td><div class="col-sm-11">'.$qns.'</div></td></tr></div>';
                                echo '<div class="col-sm-12" ><input type="hidden" value="'.$subject.'" name="subject[]" />
                                    <input type="hidden" value="'.$Total_now.'" name="current[]" />
                                    <input type="hidden" value="'.$qid.'" name="qid[]" />
                                    <input type="hidden" value="'.$qid_sn.'" name="qid_sn[]" />
                                    <input type="hidden" value="'.$correctId.'" name="correct[]" />
                                    <br/>
                                    <div class="row" >
                                    <div class="boxed col-sm-12"><tr><td><span  style="font-size:18px;display:inline-block;">(A)</span></td><td>&nbsp;&nbsp;<input type="radio" id="'.$optAid.'" name="ans['.$sn.']" value="'.$optAid.'" onclick="enable()"><label for="'.$optAid.'">'.$optionA.'</label></td></tr></div>
                                    
                                    <div class="boxed col-sm-12"><tr><td><span  style="font-size:18px;display:inline-block;">(B)</span></td><td>&nbsp;&nbsp;<input type="radio" id="' . $optBid . '" name="ans['.$sn.']" value="'.$optBid.'" onclick="enable()"><label for="'.$optBid.'">'.$optionB.'</label></td></tr>
                                    </div>

                                    <div class="boxed col-sm-12"><span  style="font-size:18px;">(C)</span>&nbsp;&nbsp;<input type="radio" id="'.$optCid.'" name="ans['.$sn.']" value="'.$optCid.'" onclick="enable()"><label for="'.$optCid.'">'.$optionC.'</label>
                                    </div>

                                    <div class="boxed col-sm-12"><span  style="font-size:18px;">(D)</span>&nbsp;&nbsp;<input type="radio" id="'.$optDid.'" name="ans['.$sn.']" value="'.$optDid.'" onclick="enable()"><label for="'.$optDid.'">'.$optionD.'</label>
                                    </div> <div class="col-sm-12" ><p class="text-center" style="margin-top:10px;"><button id="'.$Total_now.'" class="next btn btn-success" type="button" >Next</button></p></div></div></div></div>';}else if($Total_now > 1 && $Total_now  < $total){
                                         $sn = $Total_now-1;
            echo '<div class="col-sm-12 cont" id="question'.$Total_now.'"style="margin-left:65px;margin-top:20px;">
                                <p class="questions" id="qname'.$Total_now.'"></p>
                                <div class="row"><tr><td><div class="col-sm-1">' . $Total_now . '</div> : &nbsp;&nbsp;</td><td><div class="col-sm-11">'.$qns.'</div></td></tr></div>';
                                echo '<div class="col-sm-12" ><input type="hidden" value="'.$subject.'" name="subject[]" />
                                    <input type="hidden" value="'.$Total_now.'" name="current[]" />
                                    <input type="hidden" value="'.$qid.'" name="qid[]" />
                                    <input type="hidden" value="'.$qid_sn.'" name="qid_sn[]" />
                                    <input type="hidden" value="'.$correctId.'" name="correct[]" />
                                    <br/>
                                    <div class="row" >
                                    <div class="boxed col-sm-12"><tr><td><span  style="font-size:18px;display:inline-block;">(A)</span></td><td>&nbsp;&nbsp;<input type="radio" id="'.$optAid.'" name="ans['.$sn.']" value="'.$optAid.'" onclick="enable()"><label for="'.$optAid.'">'.$optionA.'</label></td></tr></div>
                                    
                                    <div class="boxed col-sm-12"><tr><td><span  style="font-size:18px;display:inline-block;">(B)</span></td><td>&nbsp;&nbsp;<input type="radio" id="' . $optBid . '" name="ans['.$sn.']" value="'.$optBid.'" onclick="enable()"><label for="'.$optBid.'">'.$optionB.'</label></td></tr>
                                    </div>

                                    <div class="boxed col-sm-12"><span  style="font-size:18px;">(C)</span>&nbsp;&nbsp;<input type="radio" id="'.$optCid.'" name="ans['.$sn.']" value="'.$optCid.'" onclick="enable()"><label for="'.$optCid.'">'.$optionC.'</label>
                                    </div>

                                    <div class="boxed col-sm-12"><span  style="font-size:18px;">(D)</span>&nbsp;&nbsp;<input type="radio" id="'.$optDid.'" name="ans['.$sn.']" value="'.$optDid.'" onclick="enable()"><label for="'.$optDid.'">'.$optionD.'</label>
                                    </div>';
                                    echo '<div class="col-sm-12" ><p class="text-center" style="margin-top:10px;"><button id="'.$Total_now.'" class="previous btn btn-success" type="button">Previous</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                 <button id="'.$Total_now.'" class="next btn btn-success" type="button" >Next</button></p></div></div></div></div>';
        }elseif ($Total_now == $total) {
             $sn = $Total_now-1;
            echo '<div class="col-sm-12 cont" id="question'.$Total_now.'" style="margin-left:65px;margin-top:20px;">
                                <p class="questions" id="qname'.$Total_now.'"></p>
                                <div class="row"><tr><td><div class="col-sm-1" >' . $Total_now . '</div> : &nbsp;&nbsp;</td><td><div  class="col-sm-11">'.$qns.'</div></td></tr></div>';
                                echo '<div class="col-sm-12" ><input type="hidden" value="'.$subject.'" name="subject[]" />
                                    <input type="hidden" value="'.$Total_now.'" name="current[]" />
                                    <input type="hidden" value="'.$qid.'" name="qid[]" />
                                    <input type="hidden" value="'.$qid_sn.'" name="qid_sn[]" />
                                    <input type="hidden" value="'.$correctId.'" name="correct[]" />
                                    <br/>
                                    <div class="row">
                                    <div class="boxed col-sm-12"><tr><td><span  style="font-size:18px;display:inline-block;">(A)</span></td><td>&nbsp;&nbsp;<input type="radio" id="'.$optAid.'" name="ans['.$sn.']" value="'.$optAid.'" onclick="enable()"><label for="'.$optAid.'">'.$optionA.'</label></td></tr></div>
                                    
                                    <div class="boxed col-sm-12"><tr><td><span  style="font-size:18px;display:inline-block;">(B)</span></td><td>&nbsp;&nbsp;<input type="radio" id="' . $optBid . '" name="ans['.$sn.']" value="'.$optBid.'" onclick="enable()"><label for="'.$optBid.'">'.$optionB.'</label></td></tr>
                                    </div>

                                    <div class="boxed col-sm-12"><span  style="font-size:18px;">(C)</span>&nbsp;&nbsp;<input type="radio" id="'.$optCid.'" name="ans['.$sn.']" value="'.$optCid.'" onclick="enable()"><label for="'.$optCid.'">'.$optionC.'</label>
                                    </div>

                                    <div class="boxed col-sm-12"><span  style="font-size:18px;">(D)</span>&nbsp;&nbsp;<input type="radio" id="'.$optDid.'" name="ans['.$sn.']" value="'.$optDid.'" onclick="enable()"><label for="'.$optDid.'">'.$optionD.'</label>
                                    </div>';
                                    echo '<div class="col-sm-12" ><p class="text-center" style="margin-top:10px;"><button id="'.$Total_now.'" class="previous btn btn-success" type="button">Previous</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-info" disabled="true" id="sbutton" value="" >Submit</button> </p></div></div></div></div>';
            # code...
        }
                                    if ($Total_now++ == $total) {
                                     break;
                                    }
                                }
                                    ?>

                                </form></div>
                                    
                                
                </div>

                <!-- card button  -->
            <!-- <div class="card"> -->
                <div class="card-block cat" >
                    <div class="col-md-12">
                            <div class="card card-body" style="background-color:#DCDCDC;">
                                <!-- options button  -->
                                <?php
                                echo "<div class='row play' >";
                                for ($x = 1; $x <= $total; $x++) {
                                echo '<button id="'.$x.'" type="button" class="jump current'.$x.'">' . $x . '</button>';
                                }  echo "</div>";
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
    var timeleft = 5;
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
    $('#overlay').fadeIn().delay(5000).fadeOut();
//divs to show by qquestion
$('.cont').css('display','none');
$('#question'+1).css('display','block');
// get the next button pressed
$('.next').on('click', function(){
   var  last=parseInt($(this).attr('id'));     
         nex=last+1;   
    $('.current'+last).css("background-color", "blue");
    $('#question'+last).hide();
    $("html").animate({ scrollTop: 0 }, "slow");
    $('#question'+nex).css('display','block');
    $('#question'+nex).show();
});

// get the previous button pressed
$('.previous').on('click', function(){
     var  last=parseInt($(this).attr('id'));     
         prev=last-1;             
    $('#question'+last).hide();
    $("html").animate({ scrollTop: 0 }, "slow");
    $('#question'+prev).css('display','block');
    $('#question'+prev).show();
});

// get the when jump to number button pressed
$('.jump').on('click', function(){
     var  value = parseInt($(this).attr('id'));      
     $("html").animate({ scrollTop: 0 }, "slow");        
     $(".cont:visible").hide();;//find current div here?
    $('#question'+value).css('display','block');
    $('#question'+value).show();
});
//ende of next jump and previous button  
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