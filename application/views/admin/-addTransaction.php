

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Transaction</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <?php if($msg = $this->session->flashdata("message")): ?>

                <p class="success">
                    <?=$msg?>
                </p>

            <?php endif; ?>

            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                
                    <form name="frmOne" class="form-horizontal" action="" method="post">
                            <div class="form-group">
                                <label for="productName" style="color:#3fa9f5;" class="col-sm-4 control-label">Product Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="add_transaction[productName]" id="get_names_product" placeholder="Enter product name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="supplierName" style="color:#3fa9f5;" class="col-sm-4 control-label">Supplier Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="add_transaction[supplierName]" id="get_names_supplier" placeholder="Enter supplier full name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="stockSell" style="color:#3fa9f5;" class="col-sm-4 control-label">Stock Sell</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="add_transaction[stockSell]" id="stockSell" placeholder="Enter stock sold number">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="customerName" style="color:#3fa9f5;" class="col-sm-4 control-label">Customer Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="add_transaction[customerName]" id="get_names_customer" placeholder="Enter customer full name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="totalStockBuy" style="color:#3fa9f5;" class="col-sm-4 control-label">Stock Bought</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="add_transaction[totalStockBuy]" id="totalStockBuy" placeholder="Enter stock bought number">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="cost" style="color:#3fa9f5;" class="col-sm-4 control-label">Product Cost</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="add_transaction[cost]" id="cost" placeholder="Enter cost per unit value">
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
