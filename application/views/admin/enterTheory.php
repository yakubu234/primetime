    <style>
        
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
                                    <div> 
                                     <div class="form-group col-sm-12">
                                            <label class="control-label">Select Exam Number</label>
                                             <select id="myemployee" class="form-control select2">
                                    <option value="">---select Exam Number---</option>
                                    <?php
                                    if ($student_theory) {
                                                    foreach($student_theory as $key => $val){
                                   echo '<option value="'.$val->reg_num.'">'.$val->reg_num.'</option>';
                                         }
                                        }
                                   ?>
                                    
                                    </select>
                                </div>
                                    </div>
                                <div class="row">
                        <div class="col-12">
                            <div class="card m-b-20">
                                <div class="card-body">
                                    <form method="POST" action="<?php echo base_url('Insert_theory_Now') ?>">
                                    <table id="tb" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr> 
                                                    <th>Exam Title</th>    
                                                    <th>Reg Num</th>
                                                    <th> Candidate Name</th>
                                                    <th>Theory Score</th>
                                                    <th></th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                       
                                        </tbody>
                                    </table>
                                    <input type="submit" name="submit" value="Add Theory">
                                </form>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->

                    <script type="text/javascript">
  var arr = {};
       var arr = <?php echo json_encode($student_theory); ?>;
  console.log(arr);

  function removeAndAdd() {
  var employee = $('#myemployee option:selected').detach();
  var detail = employee.val();
  let user = arr.find(item => item.reg_num == detail);
var selName = user.name;
var selTheory = user.theory;
var selExam = user.exam_name;
var selID = user.id;
  var newemployee = '<td>'+selExam+'<input type="hidden" name="userid[]" value="'+selID+'" /></td><td><input type="text" name="reg_Num[]" class="td-employee" data-value="' + employee.val() + '" value="'+ employee.val() +'" readonly></td><td>'+selName+'</td><td><input type="text" value = "'+selTheory+'" required name="theory[]" ></td><td><button class="btn-remove">Remove</button></td>';
  $('#tb').append('<tr>' + newemployee + '</tr>');
}

$('select').on('change', function(e) {
  if ($('#myemployee').val()) {
    removeAndAdd();
  }
});

$('#tb').on('click', '.btn-remove', function(e) {
  var row = $(this).closest('tr');
  var employee = row.find('.td-employee');
  $('#myemployee').append('<option value="' + employee.attr('data-value') + '">' + employee.text() +'</option>');
  row.remove();
});

</script>

                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </div>
                <!-- end container-fluid -->
            </div>
            <!-- end page content-->
        </div>
        <!-- https://javascript.info/array-methods -->