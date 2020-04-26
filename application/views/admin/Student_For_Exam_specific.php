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
                            <div class="card m-b-20">
                                <div class="card-body">    
                                    <h4 class="mt-0 header-title">Exams in the database</h4>
                                <div class="row">
                        <div class="col-12">
                            <div class="card m-b-20">
                                <div class="card-body">
                                    <form>
                                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                    <th>S/N</th>
                                                    <th>Exam Title</th>    
                                                    <th>Reg Num</th>
                                                    <th> Candidate Name</th>
                                                    <th>Theory Score</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                       <?php
                                                     if ($student) {
                                                    foreach($student as $key => $val){
                                               echo ' <tr>
                                                    <td>'.( 1 + $key).'</td> 
                                                    <td>'.$val->exam_name.' </td>
                                                    <td>'.$val->reg_num.' </td>
                                                    <td>'.$val->name.'</td>
                                                    <td>
                                                    <div class="row" >
                                                    <input id="get_id" type="hidden"  value="'.$val->id.'"><input id="eid" type="hidden"  value="'.$val->eid.'"> &nbsp;&nbsp;<input type="text" name="theory" value="'.$val->theory.'" class="col-sm-4 form-control" id="theory_score" />&nbsp;&nbsp;<button type="submit" class="btn btn-success waves-effect waves-light" id="Reg_val"><i class="fas fa-check" ></i></button>&nbsp;&nbsp;<button type="button" class="btn btn-primary waves-effect waves-light"><i class="fas fa-times" ></i></button>
                                                    </div></td>
                                                </tr>';
                                                }
                                               }else{
                                                echo"
                                                    <tr>
                                                    <td colspan='6' class='text-center' class='col-sm-12' > No record Found</td>
                                                    </tr>
                                                ";
                                               } 
                                             ?> 
                                        </tbody>
                                    </table>
                                    
                                    </form>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->

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
    $(document).ready(function(){
        $('#Reg_val').click(function(){
            // e.preventDefault();
            var theory = $("#theory_score").val();;
            var Userid= $("#get_id").val();
            var Userid= $("#eid").val();
            
              $.ajax({
                        
                        method: 'POST',
                        url: '<?php echo base_url() ?>send_theory_now',
                        data: {theory:theory,Userid:Userid,eid:eid},
                        dataType: 'json',
                        success: function(response){
alert('data updated'); 
                        }
                    });
        });
    });
</script>
        <!-- Footer -->