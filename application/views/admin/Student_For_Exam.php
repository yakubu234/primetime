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
                        <div class="col-12">
                            <div class="card m-b-20">
                                <div class="card-body">
                                <form method="POST" action="<?php echo base_url('Add_Student_To_Access_Specific_Exam') ?>">    
                                     <div class="col-sm-12 m-b-20"><div class="row" ><h4 class="mt-0 header-title col-sm-6">Add Student to the Database</h4><span class="col-sm-5" style="float:right;">                <select class="form-control select2" name="exam" required="" id="DropSelect" onchange="styleselect()">
                                    <option selected="" disabled="" >Choose Exam Title</option>
                                                <?php
                                                $get_data=$this->User_Model->get_table_data();
                                                    foreach($get_data as $val){
                                              echo" <option value='".$val->eid."'>". $val->title."</option>";
                                               } 
                                             ?>                                                
                                    </select>
                                    <input type="hidden" id="stylediv" name="Exam_name">
                                     </span> </div></div>
                                     <script type="text/javascript">
                                        function styleselect() {
                                    var gett = $('#DropSelect option:selected').text();
                                     $("#stylediv").val(gett);   };
                                     </script>
                                <div class="row">
                        <div class="col-12">
                            <div class="card m-b-20">
                                <div class="card-body">                                    
                                    <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                    <th>S/N</th>
                                                    <th>&nbsp;&nbsp;&nbsp;</th>
                                                    <th>Image</th>    
                                                    <th>Reg Num</th>
                                                    <th>Name</th>
                                                    <th>Password</th>
                                                    <th>Reg Time</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                       <?php
                                                     if ($student) {
                                                    foreach($student as $val){
                                                        $sn=1;
                                               echo ' <tr>
                                                    <td>'.$sn.'</td>
                                                    <td>
                                                    <input type="hidden" name="id[]" value="'.$val["reg_num"].'"><input type="hidden" name="name[]" value="'.$val["surname"]." ".$val["firstname"]." ".$val["middlename"].'"><input type="checkbox" name="validate[]" value="validated">
                            </td>
                                                    <td><img src="'.base_url().'Student_Pic/'.$val["img"].'" alt="" class="rounded" style="width: 70px;height:60px;"></td>
                                                    <td>'.$val["reg_num"].' </td>
                                                    <td>'.$val["surname"]." ".$val["firstname"]." ".$val["middlename"].'</td>
                                                    <td>'.$val["phone"].'</td>
                                                    <td>'.$val["time"].'</td>
                                                </tr>';$sn++;
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
                                     <div class="form-group col-sm-6" >
                                            <div style="float:right;">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                  Add Student
                                                </button>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </div>
              </form>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </div>
                <!-- end container-fluid -->
            </div>
            <!-- end page content-->

        </div>
        <!-- page wrapper end -->

        <!-- Footer -->