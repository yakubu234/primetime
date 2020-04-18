        <?php
           $total = $this->session->userdata('Total_Number');
           $Count_Number = $this->session->userdata('Count_Number')+1;
           $eid = $this->session->userdata('Exam_id');
           $Exam_name = $this->session->userdata('Exam_name');
        ?>
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
                        <div class="col-12">    
                                <div class="card">
                                    <div class="card-body">
                                    <h4>Enter Question Details</h4>
                                        <form method="POST" action="<?php echo base_url('You_Are_Adding_Question_Old_Exam?q='.$eid.'&snw='.$Count_Number.'&sessions=val1=1234567& al2=abcdef al3=ABCDEF'); ?>" enctype="multipart/form-data">
                                     <div class="form-group col-sm-3">
                                        <input type="hidden" name="Exam_name" value="<?php echo $Exam_name; ?>">
                                            <label class="control-label">Single Select</label>
                                            <select class="form-control select2" name="subject" required="">
                                                <option selected="" disabled="" >Choose Subject</option>
                                                <?php
                                                var_dump($subjects);
                                                if ($subjects) {
                                                    foreach ($subjects as $row){
                                              echo" <option>". $row['name']."</option>";
                                             }
                                                    } 
                                                    ?>                         
                                            </select>
                                        </div>
                                <?php 
                                // $i = 1; while($i <= $number){
                                 for ($i = $Count_Number; $i <= $total; $i++){
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
                                                    <button type="button" class="btn btn-success waves-effect waves-light m-r-5"><i class="far fa-trash-alt"></i></button>
                                                    <button class="btn btn-primary waves-effect waves-light"> <span>Send</span> <i class="fab fa-telegram-plane m-l-10"></i> </button>
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
