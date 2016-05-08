
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Update Transaction</h1>
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
                <!-- <p>
                    <label for="date_posted">Date post</label>
                    <textarea name="post[date_posted]" id="date_posted" rows="5" cols="40"></textarea>
                </p> -->

                <div class="form-group">
                    <label for="productName" style="color:#3fa9f5;" class="col-sm-3 control-label">Product Name</label>
                    <div class="col-sm-8">
                        <input type="text" value="<?=$post->productName?>" class="form-control" name="post[productName]" id="productName" placeholder="Enter product name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="supplierName" style="color:#3fa9f5;" class="col-sm-3 control-label">Supplier Name</label>
                    <div class="col-sm-8">
                        <input type="text" value="<?=$post->supplierName?>" class="form-control" name="post[supplierName]" id="supplierName" placeholder="Enter supplier name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="stockSell" style="color:#3fa9f5;" class="col-sm-3 control-label">Stock Sell</label>
                    <div class="col-sm-8">
                        <input type="text" value="<?=$post->stockSell?>" class="form-control" name="post[stockSell]" id="stockSell">
                    </div>
                </div>

                <div class="form-group">
                    <label for="customerName" style="color:#3fa9f5;" class="col-sm-3 control-label">Customer Name</label>
                    <div class="col-sm-8">
                        <input type="text" value="<?=$post->customerName?>" class="form-control" name="post[customerName]" id="customerName">
                    </div>
                </div>

                <div class="form-group">
                    <label for="totalStockBuy" style="color:#3fa9f5;" class="col-sm-3 control-label">Total Product</label>
                    <div class="col-sm-8">
                        <input type="text" value="<?=$post->totalStockBuy?>" class="form-control" name="post[totalStockBuy]" id="totalStockBuy">
                    </div>
                </div>

                <div class="form-group">
                    <label for="cost" style="color:#3fa9f5;" class="col-sm-3 control-label">Product Cost</label>
                    <div class="col-sm-8">
                        <input type="text" value="<?=$post->cost?>" class="form-control" name="post[cost]" id="cost">
                    </div>
                </div>

                <div class="form-group">
                    <label for="date_posted" style="color:#3fa9f5;" class="col-sm-3 control-label">Date Posted</label>
                    <div class="col-sm-8">
                        <input type="date" value="<?=$post->date_posted?>" class="form-control" name="post[date_posted]" id="date_posted" placeholder="Enter category name">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-6 col-sm-5">
                        <button type="submit" style="color:white; background:#3fa9f5;" name="update_transaction" value="Update Transaction" class="btn btn-default">Submit</button>
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
