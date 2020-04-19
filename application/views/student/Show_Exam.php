<!-- special css to make a rectanguar radio button  -->
 <style>
  /* [THE LOADING SPINNER] */
#spinner-front, #spinner-back{
  position: fixed;
  visibility: visible;
  opacity: 0;
  width: 100%;
  transition: all 1s;
}
#spinner-front{
  z-index: 9999;
  margin-top: 45vh;
  color: #fff;
  text-align: center;
}
#spinner-back{
  z-index: 9998;
  height: 100vh;
  background: #000;
}
#spinner-front.show{
  visibility: visible;
  opacity: 1;
}
#spinner-back.show{
  visibility: visible;
  opacity: 0.7;
}

#hideMe {
    -webkit-animation: cssAnimation 5s forwards; 
    animation: cssAnimation 5s forwards;
}
@keyframes cssAnimation {
    0%   {opacity: 1;}
    90%  {opacity: 1;}
    100% {opacity: 0;}
}
@-webkit-keyframes cssAnimation {
    0%   {opacity: 1;}
    90%  {opacity: 1;}
    100% {opacity: 0;}
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
    width:40px;
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
        <div class="account-pages"></div>
   
        <!-- Begin page -->
        <div class="m-t-10 col-sm-12">
                  <!-- [THE SPINNER - THIS IS ALL YOU NEED] -->
    <div id="hideMe" >
        <div id="spinner-front" class="show">
            <img src="ajax-loader.gif"/><br>
            Question loading...
            </div>
        <div id="spinner-back" class="show"></div>
    </div>
            <div class="card" style="background-color:#DCDCDC;">
                <div class="card-block">
                    <div class="alert alert-success alert-dismissible fade show col-sm-12" role="alert" style="margin-bottom: -15px;">
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
                <button class="btn btn-primary waves-effect waves-light col-sm-3 text-center" style="margin: 0px auto;"> <b>Time Left : <span id="countdown"></span></b></button>                                
                 <div class="row col-sm-12">
                                <?php
                                echo '<form action="'.base_url('save_answer_selected?q=quiz&step=2&eid=' . $eid . '&n=' . $sn . '&t=' . $total).'" method="POST" id="form">';
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
                                echo '<div class="col-sm-12 cont" id="question'.$Total_now.'"style="margin-left:65px;margin-top:20px;">
                                <p class="questions" id="qname'.$Total_now.'"></p>
                                <div class="row"><tr><td><div>' . $Total_now . '</div> : &nbsp;&nbsp;</td><td><div>'.$qns.'</div></td></tr></div>';
                                echo '<div class="col-sm-12" ><input type="hidden" value="'.$subject.'" name="subject" />
                                    <input type="hidden" value="'.$total.'" name="total" />
                                    <input type="hidden" value="'.$Total_now.'" name="current" />
                                    <input type="hidden" value="'.$qid.'" name="qid" />
                                    <input type="hidden" value="'.$qid_sn.'" name="qid_sn" />
                                    <input type="hidden" value="'.$correctId.'" name="correct" />
                                    <br/>
                                    <div class="boxed"><tr><td><span  style="font-size:18px;display:inline-block;">(A)</span></td><td>&nbsp;&nbsp;<input type="radio" id="'.$optAid.'" name="ans'.$Total_now.'" value="'.$optAid.'" onclick="enable()"><label for="'.$optAid.'">'.$optionA.'</label></td></tr></div>
                                    
                                    <div class="boxed "><tr><td><span  style="font-size:18px;display:inline-block;">(B)</span></td><td>&nbsp;&nbsp;<input type="radio" id="' . $optBid . '" name="ans'.$Total_now.'" value="'.$optBid.'" onclick="enable()"><label for="'.$optBid.'">'.$optionB.'</label></td></tr>
                                    </div>

                                    <div class="boxed"><span  style="font-size:18px;">(C)</span>&nbsp;&nbsp;<input type="radio" id="'.$optCid.'" name="ans'.$Total_now.'" value="'.$optCid.'" onclick="enable()"><label for="'.$optCid.'">'.$optionC.'</label>
                                    </div>

                                    <div class="boxed"><span  style="font-size:18px;">(D)</span>&nbsp;&nbsp;<input type="radio" id="'.$optDid.'" name="ans'.$Total_now.'" value="'.$optDid.'" onclick="enable()"><label for="'.$optDid.'">'.$optionD.'</label>
                                    </div> <button id="'.$Total_now.'" class="next btn btn-success" type="button" >Next</button></div></div>';}else if($Total_now > 1 && $Total_now  < $total){
            echo '<div class="col-sm-12 cont" id="question'.$Total_now.'"style="margin-left:65px;margin-top:20px;">
                                <p class="questions" id="qname'.$Total_now.'"></p>
                                <div class="row"><tr><td><div>' . $Total_now . '</div> : &nbsp;&nbsp;</td><td><div>'.$qns.'</div></td></tr></div>';
                                echo '<div class="col-sm-12" ><input type="hidden" value="'.$subject.'" name="subject" />
                                    <input type="hidden" value="'.$total.'" name="total" />
                                    <input type="hidden" value="'.$Total_now.'" name="current" />
                                    <input type="hidden" value="'.$qid.'" name="qid" />
                                    <input type="hidden" value="'.$qid_sn.'" name="qid_sn" />
                                    <input type="hidden" value="'.$correctId.'" name="correct" />
                                    <br/>
                                    <div class="boxed"><tr><td><span  style="font-size:18px;display:inline-block;">(A)</span></td><td>&nbsp;&nbsp;<input type="radio" id="'.$optAid.'" name="ans'.$Total_now.'" value="'.$optAid.'" onclick="enable()"><label for="'.$optAid.'">'.$optionA.'</label></td></tr></div>
                                    
                                    <div class="boxed "><tr><td><span  style="font-size:18px;display:inline-block;">(B)</span></td><td>&nbsp;&nbsp;<input type="radio" id="' . $optBid . '" name="ans'.$Total_now.'" value="'.$optBid.'" onclick="enable()"><label for="'.$optBid.'">'.$optionB.'</label></td></tr>
                                    </div>

                                    <div class="boxed"><span  style="font-size:18px;">(C)</span>&nbsp;&nbsp;<input type="radio" id="'.$optCid.'" name="ans'.$Total_now.'" value="'.$optCid.'" onclick="enable()"><label for="'.$optCid.'">'.$optionC.'</label>
                                    </div>

                                    <div class="boxed"><span  style="font-size:18px;">(D)</span>&nbsp;&nbsp;<input type="radio" id="'.$optDid.'" name="ans'.$Total_now.'" value="'.$optDid.'" onclick="enable()"><label for="'.$optDid.'">'.$optionD.'</label>
                                    </div>';
                                    echo '<button id="'.$Total_now.'" class="previous btn btn-success" type="button">Previous</button>                    
        <button id="'.$Total_now.'" class="next btn btn-success" type="button" >Next</button></div></div>';
        }elseif ($Total_now == $total) {
            echo '<div class="col-sm-12 cont" id="question'.$Total_now.'" style="margin-left:65px;margin-top:20px;">
                                <p class="questions" id="qname'.$Total_now.'"></p>
                                <div class="row"><tr><td><div>' . $Total_now . '</div> : &nbsp;&nbsp;</td><td><div>'.$qns.'</div></td></tr></div>';
                                echo '<div class="col-sm-12" ><input type="hidden" value="'.$subject.'" name="subject" />
                                    <input type="hidden" value="'.$total.'" name="total" />
                                    <input type="hidden" value="'.$Total_now.'" name="current" />
                                    <input type="hidden" value="'.$qid.'" name="qid" />
                                    <input type="hidden" value="'.$qid_sn.'" name="qid_sn" />
                                    <input type="hidden" value="'.$correctId.'" name="correct" />
                                    <br/>
                                    <div class="boxed"><tr><td><span  style="font-size:18px;display:inline-block;">(A)</span></td><td>&nbsp;&nbsp;<input type="radio" id="'.$optAid.'" name="ans'.$Total_now.'" value="'.$optAid.'" onclick="enable()"><label for="'.$optAid.'">'.$optionA.'</label></td></tr></div>
                                    
                                    <div class="boxed "><tr><td><span  style="font-size:18px;display:inline-block;">(B)</span></td><td>&nbsp;&nbsp;<input type="radio" id="' . $optBid . '" name="ans'.$Total_now.'" value="'.$optBid.'" onclick="enable()"><label for="'.$optBid.'">'.$optionB.'</label></td></tr>
                                    </div>

                                    <div class="boxed"><span  style="font-size:18px;">(C)</span>&nbsp;&nbsp;<input type="radio" id="'.$optCid.'" name="ans'.$Total_now.'" value="'.$optCid.'" onclick="enable()"><label for="'.$optCid.'">'.$optionC.'</label>
                                    </div>

                                    <div class="boxed"><span  style="font-size:18px;">(D)</span>&nbsp;&nbsp;<input type="radio" id="'.$optDid.'" name="ans'.$Total_now.'" value="'.$optDid.'" onclick="enable()"><label for="'.$optDid.'">'.$optionD.'</label>
                                    </div>';
                                    echo '<button id="'.$Total_now.'" class="previous btn btn-success" type="button">Previous</button><p class="text-center" style="margin-top:10px;"><input type="submit" class="btn btn-info" disabled="true" id="sbutton" value="Submit" > </p></div></div>';
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
                <div class="card-block" >
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
// alert before reload or refresh of page
 $(function()
        {
            // Prevent accidental navigation away
            $(':input').bind(
                'change', function() { setConfirmUnload(true); });
            $('.noprompt-required').click(
                function() { setConfirmUnload(false); });

            function setConfirmUnload(on)
            {
                window.onbeforeunload = on ? unloadMessage : null;
            }
            function unloadMessage()
            {
                return ('You have entered new data on this page. ' +
                        'If you navigate away from this page without ' +
                        'first saving your data, the changes will be lost.');
            }

            window.onerror = UnspecifiedErrorHandler;
            function UnspecifiedErrorHandler()
            {
                return true;
            }

        }); 
 // alert on page refresh or close tab 

            window.onbeforeunload = function () {
               return ('You have started the Exam, please ensure you submit before leaving this page');
            }
            </script>
<!-- to disable backspace ended -->
        