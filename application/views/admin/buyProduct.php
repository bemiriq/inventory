

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $action; ?> Product</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <?php if($data = $this->session->flashdata("message")): ?>

        <p class="success">
            <?php echo "Bill " . $data['batch_id'] . " product added successfully."; ?>
        </p>

    <?php endif; ?>

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-6">

            <form name="frmOne" id="buyContactForm" class="form-horizontal" action="" method="post">

                <div class="form-group">
                    <label for="name" style="color:#3fa9f5;" class="col-sm-3 control-label">Batch Number</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="<?php echo isset($post)?$post->batch_id:''; ?>" name="buyproduct[batch_id]" placeholder="Enter batch id number">
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" style="color:#3fa9f5;" class="col-sm-3 control-label">Product Name</label>
                    <div class="col-sm-8">
                        <input type="text" onclick="myscript();" class="form-control" value="<?php echo isset($post)?$post->productName:''; ?>" name="buyproduct[productName]" id="get_names_product" placeholder="Enter product full name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" style="color:#3fa9f5;" class="col-sm-3 control-label">Buyer Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="<?php echo isset($post)?$post->name:''; ?>" name="buyproduct[name]" id="get_names_customer" placeholder="Enter customer full name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="stockIn" style="color:#3fa9f5;" class="col-sm-3 control-label">Stock Unit</label>

                    <div class="col-sm-8">
                        <input type="text" class="form-control"
                               value="<?php echo isset($post) ? $post->unit:''; ?>" name="buyproduct[unit]"
                               id="unit" placeholder="Enter product in number">
                    </div>
                </div>

                <div class="form-group">
                    <label for="cost" style="color:#3fa9f5;" class="col-sm-3 control-label">Product Cost</label>

                    <div class="col-sm-5">
                        <input type="text" class="form-control"
                               value="<?php echo isset($post) ? $post->cost:''; ?>" name="buyproduct[cost]"
                               id="get_prices" placeholder="Enter Total Cost">
                    </div>
                    <label for="cost" style="color:#3fa9f5;" class="col-sm-1 control-label">Sum</label>

                    <div class="col-sm-2">
                        <input type="checkbox" class="form-control" name="buyproduct[sum]" value="1">
                    </div>
                </div>

                <div class="form-group">
                    <label for="cost" style="color:#3fa9f5;" class="col-sm-3 control-label">Payment</label>
                    <label class="radio-inline col-sm-offset-1">
                        <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Cash
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Credit
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> Partial
                    </label>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-7 col-sm-6">
                        <button type="submit" style="color:white; background:#3fa9f5;" value="Add Transaction" class="btn btn-default" >Submit</button>

                        <button type="reset" value="Add Transaction" class="btn btn-danger" >Reset</button>
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
