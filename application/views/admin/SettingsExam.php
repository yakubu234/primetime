<!-- SettingsExam.php -->
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
                         
                        <div class="col-lg-12">
                            <div class="card m-b-20">
                                <div class="card-body">
                                    <div class="row" >
                                    <h4 class="mt-0 header-title col-sm-6">You are About to edit Exam</h4>
                                    <div class="col-sm-6" >
                                    <form method="POST" action="<?php echo base_url('Setting_in_Exam'); ?>" >
    <div class="form-group col-sm-12">
                                            <label class="control-label">Select Exam Name to Edit another Exam</label>
                                            <select class="form-control select2" name="exam" required="" id="DropSelect" onchange="javascript:this.form.submit()">
                                                <option selected="" disabled="" >Choose Exam Title</option>
                                                <?php
                                                $get_data=$this->User_Model->get_table_data();
                                                    foreach($get_data as $val){
                                              echo" <option value='".$val->eid."'>". $val->title."</option>";
                                               } 
                                             ?>                                                
                                            </select>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                <hr>
                                    <?php 
                                        foreach ($Exam_random as $key => $value) {
                                            $examEid = $value['eid'];
                                            $examTitle = $value['title'];
                                            $right = $value['correct'];
                                            $wrong = $value['wrong'];
                                            $total = $value['total'];
                                            $time = $value['time'];
                                            $passmark = $value['passmark'];
                                            $start = $value['start'];
                                            $end = $value['end'];
                                        }
                                     ?>
                                    <form action="<?php echo base_url('Update_exam_Now') ?>" method="POST" >
                                        <input type="hidden" name="eid" value="<?php echo $examEid; ?>" >
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                            <label>Exam Name / Title</label>
                                            <div>
                                                <input data-parsley-type="alphanum" name="title" type="text" value="<?php echo $examTitle ?>" 
                                                        class="form-control" required
                                                        placeholder="Exam Name / Title"/>
                                            </div>
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label>Enter Total Number Question</label>
                                            <div>
                                                <input data-parsley-type="alphanum" type="text"
                                                     class="form-control" value="<?php echo $total ?>" required name="total"
                                                        placeholder="Total Number of Question"/>
                                            </div>
                                        </div>

                                         <!-- <div class="form-group col-sm-6">
                                            <label>Number of Questions to add now</label>
                                            <div>
                                                <input data-parsley-type="alphanum" type="text"
                                                    class="form-control" required name="num_now"
                                                        placeholder="Number of Question to add now"/>
                                            </div>
                                        </div> -->


                                        <div class="form-group col-sm-6">
                                            <label class="control-label">Right answer Score</label>
                                            <input id="demo0" type="number" value="<?php echo $right; ?>" name="demo0" data-bts-min="0" data-bts-max="10" data-bts-init-val="" data-bts-step="1" data-bts-decimal="0" data-bts-step-interval="100" data-bts-force-step-divisibility="round" data-bts-step-interval-delay="500" data-bts-prefix="" data-bts-postfix="" data-bts-prefix-extra-class="" data-bts-postfix-extra-class="" data-bts-booster="true" data-bts-boostat="10" data-bts-max-boosted-step="false" data-bts-mousewheel="true" data-bts-button-down-class="btn btn-default" data-bts-button-up-class="btn btn-default" required/>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label class="control-label">Wrong answer Score</label>
                                            <input id="demo0" type="number" value="<?php echo $wrong; ?>" name="demo3" data-bts-min="-2" data-bts-max="10" data-bts-init-val="" data-bts-step="1" data-bts-decimal="0" data-bts-step-interval="100" data-bts-force-step-divisibility="round" data-bts-step-interval-delay="500" data-bts-prefix="" data-bts-postfix="" data-bts-prefix-extra-class="" data-bts-postfix-extra-class="" data-bts-booster="true" data-bts-boostat="10" data-bts-max-boosted-step="false" data-bts-mousewheel="true" data-bts-button-down-class="btn btn-default" data-bts-button-up-class="btn btn-default" required />
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Start and End date</label>
                                            <div>
                                                <div class="input-group">
                                                    <input type="text" id="date-format" name="start" value="<?php echo $start ?>" class="form-control floating-label" placeholder="Start Date and Time" required="">
                                                    <input type="text" value="<?php echo $end; ?>" id="min-date" name="end" class="form-control floating-label" placeholder="End Date"  required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label>Exam Duration in (Mins)</label>
                                            <div>
                                                 <input id="demo0" type="number" value="<?php echo $time; ?>" placeholder="Press Plus or Minus" name="demo3_22" data-bts-min="1" data-bts-max="500" data-bts-init-val="" data-bts-step="1" data-bts-decimal="0" data-bts-step-interval="100" data-bts-force-step-divisibility="round" data-bts-step-interval-delay="500" data-bts-prefix="" data-bts-postfix="" data-bts-prefix-extra-class="" data-bts-postfix-extra-class="" data-bts-booster="true" data-bts-boostat="10" data-bts-max-boosted-step="false" data-bts-mousewheel="true" data-bts-button-down-class="btn btn-default" data-bts-button-up-class="btn btn-default"/>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label>Pass Mark</label>
                                            <div>
                                                 <input id="demo1" type="text" value="<?php echo $passmark ?>" name="demo1" required="">
                                            </div>
                                        </div>
                                            <div class="form-group col-sm-12" >
                                            <div style="float:right;">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                    Update
                                                </button>
                                                <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                                    Cancel
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
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