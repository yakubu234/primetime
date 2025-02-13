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
                                                    <th>Image</th>    
                                                    <th>Reg Num</th>
                                                    <th>Name</th>
                                                    <th>Password</th>
                                                    <th>Reg Time</th>
                                                    <th>&nbsp;&nbsp;</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                       <?php
                                                     if ($student) {
                                                    foreach($student as $key => $val){
                                                        $sn=1;
                                               echo ' <tr>
                                                    <td>'.( 1 + $key).'</td>
                                                    <td><img src="'.base_url().'Student_Pic/'.$val["img"].'" alt="" class="rounded" style="width: 70px;height:60px;"></td>
                                                    <td>'.$val["reg_num"].' </td>
                                                    <td>'.$val["surname"]." ".$val["firstname"]." ".$val["middlename"].'</td>
                                                    <td>'.$val["surname"].'</td>
                                                    <td>'.$val["time"].'</td>
                                                    <td><a title="Delete" style="font-size:30px;text-align:center;color:red;" href=" '.base_url().'Usr/Student_Delete_Now_controller/' . $val["id"] . '/woidmdkwkkoritufdnzxnq120846420"; ><i  class="mdi mdi-delete-forever" onClick="return doconfirm();"></i></a></td>
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

        <!-- Footer -->
        <script>
function doconfirm()
{
    job=confirm("Are you sure to delete the select student permanently?");
    if(job!=true)
    {
        return false;
    }
}
</script>