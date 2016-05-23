<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $action; ?> Product</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-6">

            <form name="frmOne" class="form-horizontal" action="" method="post">

                <div class="form-group">
                    <label for="customerName" style="color:#3fa9f5;" class="col-sm-3 control-label">Seller Name</label>
                    <div class="col-sm-8">
                        <input type="text" value="<?php echo isset($post)?$post->name:''; ?>" class="form-control" name="batch[name]" id="get_names_product" placeholder="Enter S/C Name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="customerName" style="color:#3fa9f5;" class="col-sm-3 control-label">Paid</label>
                    <div class="col-sm-8">
                        <input type="text" value="<?php echo isset($post)?$post->cash_amount:''; ?>" class="form-control" name="batch[cash_amount]" placeholder="Enter Amount Received">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-6 col-sm-5">
                        <button type="submit" style="color:white; background:#3fa9f5;" class="btn btn-default" >Submit</button>
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
