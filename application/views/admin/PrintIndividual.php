
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
    /*print button */
   @media print {
    .hidden-print,
    .hidden-print * {
        display: none !important;
    }
}
    /*print button ended*/
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
                            <?php
                            foreach ($BroadSheet as $key => $value) {
                                $examname = $value->title;
                                $div = $value->passmark;
                            }
                            if ($div == "") {
                               $div = "50";
                            }
                            ?>
                                
                            <div class="card m-b-20">
                                <div class="card-body">
                                    <button id="btnPrint"  type="button" class=" hidden-print btn btn-primary waves-effect waves-light" data-toggle="button" aria-pressed="false"><i class="ion-printer"></i></button>
        <div class="ticket" >
                                    <h4 class="mt-0 header-title" style="text-align: center;">Individual Result of <?=$examname?> Lariken College &nbsp;&nbsp;&nbsp;Print Date : (<?=date("Y-m-d h:i:sa")?>)</h4>
                                    <!-- <p class="text-muted m-b-30">This is an experimental awesome solution for responsive tables with complex data.</p> -->
    
                                    
                                            <table class="table table-bordered mb-0">
                                                <thead>
                                                <tr>
                                                   <th>S/n</th>
                                                    <th>Reg_mun</th>
                                                    <th>Total Cbt Question</th>  
                                                    <th>Correct </th>
                                                    <th>Wrong</th>
                                                    <th>Cbt Score</th>
                                                    <th>Theory Score</th>
                                                    <th>Grade (%)</th>
                                                    <th>Remarks</th>
                                                    <th>&nbsp;&nbsp;</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                     <?php   
                                                     
                                                    foreach($StudentResult as $key => $val){
                                                        $score = $val->score;
                                                     if ($score <= 0) {
                                                         $score = 0;
                                                     }
                                                        $totalCbtQuestion = $val->totalQuestion;
                                                        $total = $totalCbtQuestion + 30;
                                                        $theory = $val->theory;
                                                        if($score >= 0 && $theory !=""){
                                                        $per = round(((($theory+$score)*100)/$total),1);
                                                    }else if($score >= 0){
                                                    $per = round((($score*100)/$totalCbtQuestion),1);
                                                    }                          
                                               echo ' <tr>
                                                    <th>'.(1+$key).'</th>
                                                    <th>'.$val->reg_num.' </th>
                                                    <td>'.$val->totalQuestion.'</td>
                                                    <td>'.$val->correct.'</td>
                                                    <td>'.$val->wrong.'</td>
                                                    <td>'.$score.'</td>
                                                    <td>'.$theory.'</td>
                                                    <td>'.$per.'&nbsp;%</td>
                                                    <td>';if ($per >= $div) {
                                                        $rem = "Passed";
                                                      }else{
                                                        $rem = "Failed";
                                                      }
                                                    echo $rem.'</td>
                                                    <td><a target="_blank" href=" '.base_url().'Usr/Result_Page_Display_controller/' . $val->id . '/' . $val->eid . '/' . rand() . '/ioee20304592knsmcklako" ><button class=" hidden-print btn btn-primary waves-effect waves-light"><i class="ion-printer"></i></button></a></td>
                                                </tr>';
                                                } 
                                            
                                             ?>                                         
                                                
                                                </tbody>
                                            </table>    
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
        <script>
const $btnPrint = document.querySelector("#btnPrint");
$btnPrint.addEventListener("click", () => {
    window.print();
});
</script>
