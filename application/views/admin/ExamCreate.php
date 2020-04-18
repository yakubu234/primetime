
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
                         
                        <div class="col-lg-12">
                            <div class="card m-b-20">
                                <div class="card-body">
    
                                    <h4 class="mt-0 header-title">Add New Exam</h4>
                                    
    
                                    <form action="<?php echo base_url('Create_Exam') ?>" method="POST" >
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                            <label>Exam Name / Title</label>
                                            <div>
                                                <input data-parsley-type="alphanum" name="title" type="text"
                                                        class="form-control" required
                                                        placeholder="Exam Name / Title"/>
                                            </div>
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label>Enter Total Number Question</label>
                                            <div>
                                                <input data-parsley-type="alphanum" type="text"
                                                     class="form-control" required name="total"
                                                        placeholder="Total Number of Question"/>
                                            </div>
                                        </div>

                                         <div class="form-group col-sm-6">
                                            <label>Number of Questions to add now</label>
                                            <div>
                                                <input data-parsley-type="alphanum" type="text"
                                                    class="form-control" required name="num_now"
                                                        placeholder="Number of Question to add now"/>
                                            </div>
                                        </div>


                                        <div class="form-group col-sm-3">
                                            <label class="control-label">Wrigh answer Score</label>
                                            <input id="demo0" type="number" value="1" name="demo0" data-bts-min="0" data-bts-max="10" data-bts-init-val="" data-bts-step="1" data-bts-decimal="0" data-bts-step-interval="100" data-bts-force-step-divisibility="round" data-bts-step-interval-delay="500" data-bts-prefix="" data-bts-postfix="" data-bts-prefix-extra-class="" data-bts-postfix-extra-class="" data-bts-booster="true" data-bts-boostat="10" data-bts-max-boosted-step="false" data-bts-mousewheel="true" data-bts-button-down-class="btn btn-default" data-bts-button-up-class="btn btn-default" required/>
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label class="control-label">Wrong answer Score</label>
                                            <input id="demo0" type="number" value="0" name="demo3" data-bts-min="-2" data-bts-max="10" data-bts-init-val="" data-bts-step="1" data-bts-decimal="0" data-bts-step-interval="100" data-bts-force-step-divisibility="round" data-bts-step-interval-delay="500" data-bts-prefix="" data-bts-postfix="" data-bts-prefix-extra-class="" data-bts-postfix-extra-class="" data-bts-booster="true" data-bts-boostat="10" data-bts-max-boosted-step="false" data-bts-mousewheel="true" data-bts-button-down-class="btn btn-default" data-bts-button-up-class="btn btn-default" required />
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Start and End date</label>
                                            <div>
                                                <div class="input-group">
                                                    <input type="text" id="date-format" name="start" class="form-control floating-label" placeholder="Start Date and Time" required="">
                                                    <input type="text" id="min-date" name="end" class="form-control floating-label" placeholder="End Date"  required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Exam Duration in (Mins)</label>
                                            <div>
                                                 <input id="demo0" type="number" value="1" placeholder="Press Plus or Minus" name="demo3_22" data-bts-min="1" data-bts-max="500" data-bts-init-val="" data-bts-step="1" data-bts-decimal="0" data-bts-step-interval="100" data-bts-force-step-divisibility="round" data-bts-step-interval-delay="500" data-bts-prefix="" data-bts-postfix="" data-bts-prefix-extra-class="" data-bts-postfix-extra-class="" data-bts-booster="true" data-bts-boostat="10" data-bts-max-boosted-step="false" data-bts-mousewheel="true" data-bts-button-down-class="btn btn-default" data-bts-button-up-class="btn btn-default"/>
                                            </div>
                                        </div>
                                            <div class="form-group col-sm-12" >
                                            <div style="float:right;">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                    Submit
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