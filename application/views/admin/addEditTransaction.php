

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $action; ?> Transaction</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <?php if($msg = $this->session->flashdata("message")): ?>

                <p class="success">
                    <?php echo $msg; ?>
                </p>

            <?php endif; ?>

            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                
                    <form name="frmOne" id="contactForm" class="form-horizontal" action="" method="post">

                            <div class="form-group">
                                <label for="name" style="color:#3fa9f5;" class="col-sm-3 control-label">S/B Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="<?php echo isset($post)?$post->detail_id:''; ?>" name="transaction[name]" id="get_names_customer" placeholder="Enter customer full name">
                                </div>
                            </div>

                        <div class="form-group">
                            <label for="stockIn" style="color:#3fa9f5;" class="col-sm-3 control-label">Stock Unit</label>

                            <div class="col-sm-8">
                                <input type="text" class="form-control"
                                       value="<?php echo isset($post) ? $post->unit:''; ?>" name="transaction[unit]"
                                       id="unit" placeholder="Enter product in number">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="cost" style="color:#3fa9f5;" class="col-sm-3 control-label">Product Cost</label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control"
                                       value="<?php echo isset($post) ? $post->cost:''; ?>" name="transaction[cost]"
                                       id="cost" placeholder="Enter Total Cost">
                            </div>
                            <label for="cost" style="color:#3fa9f5;" class="col-sm-1 control-label">Sum</label>

                            <div class="col-sm-2">
                                <input type="checkbox" class="form-control" name="transaction[sum]" value="1">
                            </div>
                        </div>

                            <div class="form-group">
                                <div class="col-sm-offset-7 col-sm-6">
                                    <button type="submit" style="color:white; background:#3fa9f5;" value="Add Transaction" class="btn btn-default" >Submit</button>
                                </div>
                            </div>

                    </form>

                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                
                
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
