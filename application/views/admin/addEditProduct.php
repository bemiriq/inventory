<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $action; ?> Stock</h1>
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
                
                    <form name="contactForm" id="contactForm" class="form-horizontal" action="" method="post">
                    
                            <div class="form-group">
                                <label for="productName" style="color:#3fa9f5;" class="col-sm-3 control-label">Product Name</label>
                                <div class="col-sm-8">
                                    <input type="text" value="<?php echo isset($post)?$post->productName:''; ?>" class="form-control" name="product[productName]" id="get_names_product" placeholder="Enter product name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="stockIn" style="color:#3fa9f5;" class="col-sm-3 control-label">Product In</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="<?php echo isset($post)?$post->stockIn:''; ?>" name="product[stockIn]" id="stockIn" placeholder="Enter product in number">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="cost" style="color:#3fa9f5;" class="col-sm-3 control-label">Product Cost</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" value="<?php echo isset($post)?$post->cost:''; ?>" name="product[cost]" id="cost" placeholder="Enter Total Cost">
                                </div>
                                <label for="cost" style="color:#3fa9f5;" class="col-sm-1 control-label">Sum</label>
                                <div class="col-sm-2">
                                    <input type="checkbox" class="form-control" name="product[sum]" value="1">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-6 col-sm-5">
                                    <button type="submit" style="color:white; background:#3fa9f5;" value="Add Product" class="btn btn-default" >Submit</button>
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
