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
                                    <div class="col-sm-12 m-b-20"><div class="row" ><h4 class="mt-0 header-title col-sm-6">Admin details from Database</h4><span class="col-sm-6" ><button style="float:right;" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-centeraadmin">Add New Admin</button></span> </div></div>
                                <div class="row">
                        <div class="col-12">
                            <div class="card m-b-20">
                                <div class="card-body">
                                    <form>
                                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                    <th>S/N</th>
                                                    <th>Name</th>    
                                                    <th>Email</th>
                                                    <th> Username</th>
                                                    <th>Password</th>
                                                    <th></th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                       <?php
                                                     if ($admin) {
                                                    foreach($admin as $key => $val){
                                               echo ' <tr>
                                                    <td>'.( 1 + $key).'</td> 
                                                    <td>'.$val->name.' </td>
                                                    <td>'.$val->email.' </td>
                                                    <td>'.$val->username.'</td>
                                                    <td>'.$val->password.'</td>
                                                    <td><a title="Delete" style="font-size:30px;text-align:center;color:red;" href=" '.base_url().'Usr/JumpQuestion_Admin_delete/' . $val->id . '/woidmdkwkkoritufdnzxnq120846420"; ><i  class="mdi mdi-delete-forever" onClick="return doconfirm();"></i></a></td>
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

        <!-- Footer -->

<script>
function doconfirm()
{
    job=confirm("Are you sure to delete admin permanently?");
    if(job!=true)
    {
        return false;
    }
}
</script>