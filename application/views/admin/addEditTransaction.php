

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
                            <!-- <div class="form-group">
                                <label for="productName" style="color:#3fa9f5;" class="col-sm-4 control-label">Product Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="<?php echo isset($post)?$post->productName:''; ?>" name="transaction[productName]" id="get_names_product" placeholder="Enter product name">
                                </div>
                            </div> -->

<!--                            <div class="form-group">-->
<!--                                <label for="supplierName" style="color:#3fa9f5;" class="col-sm-4 control-label">Supplier Name</label>-->
<!--                                <div class="col-sm-8">-->
<!--                                    <input type="text" class="form-control" value="--><?php //echo isset($post)?$post->supplierName:''; ?><!--" name="transaction[supplierName]" id="get_names_supplier" placeholder="Enter supplier full name">-->
<!--                                </div>-->
<!--                            </div>-->

<!--                            <div class="form-group">-->
<!--                                <label for="stockSell" style="color:#3fa9f5;" class="col-sm-4 control-label">Stock Sell</label>-->
<!--                                <div class="col-sm-8">-->
<!--                                    <input type="text" class="form-control" value="--><?php //echo isset($post)?$post->stockSell:''; ?><!--" name="transaction[stockSell]" id="stockSell" placeholder="Enter stock sold number">-->
<!--                                </div>-->
<!--                            </div>-->

                            <div class="form-group">
                                <label for="name" style="color:#3fa9f5;" class="col-sm-4 control-label">S/B Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="<?php echo isset($post)?$post->name:''; ?>" name="transaction[name]" id="get_names_customer" placeholder="Enter customer full name">
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
                                <div class="col-sm-offset-9 col-sm-6">
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
