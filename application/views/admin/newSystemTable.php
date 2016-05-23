

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $action; ?> Table</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <?php
    $getValue = $this->session->userdata('sessiondata');
    print_r($getValue);
    ?>

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-6">

            <form name="frmOne" class="form-horizontal" action="" method="post">

                <div class="form-group">
                    <label for="customerName" style="color:#3fa9f5;" class="col-sm-3 control-label">Product Name</label>
                    <div class="col-sm-8">
                        <input type="text" value="<?php echo isset($post)?$post->product_name:''; ?>" class="form-control" name="systemProduct[product_name]" id="get_names_product" placeholder="Enter Product Name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="customerName" style="color:#3fa9f5;" class="col-sm-3 control-label">Unit</label>
                    <div class="col-sm-8">
                        <input type="text" value="<?php echo isset($post)?$post->unit:''; ?>" class="form-control" name="systemProduct[unit]" placeholder="Enter Total Unit ">
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
