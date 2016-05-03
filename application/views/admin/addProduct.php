<!-- <SCRIPT language = JavaScript>

$(document).ready(function() { 
    $('#stock_in').change(function() {
      $('#total_stock').val($('#stock_in').val());
      $('#stock_remain').val($('#stock_in').val());
    });

});

</SCRIPT> -->

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Stock</h1>
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
                            <!-- <div class="form-group">
                                <label for="category_name" style="color:#3fa9f5;" class="col-sm-3 control-label">Stock Category</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="post[category_name]">
                                        <?php foreach($fichas_info as $row){?>
                                            <option value="<?php echo $row['category_name'] ;?>" id="category_name"><?php echo $row['category_name'] ;?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div> -->

                            

                            <!-- <div class="form-group">
                                <div class="col-sm-8">
                                    <input type="hidden" class="form-control" name="post[total_stock]" id="total_stock">
                                </div>
                            </div> -->

                            <div class="form-group">
                                <label for="productName" style="color:#3fa9f5;" class="col-sm-3 control-label">Product Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="post[productName]" id="productName" placeholder="Enter product name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="stockIn" style="color:#3fa9f5;" class="col-sm-3 control-label">Product In</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="post[stockIn]" id="stockIn">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="cost" style="color:#3fa9f5;" class="col-sm-3 control-label">Product Cost</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="post[cost]" id="cost" placeholder="Enter Total Cost">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-6 col-sm-5">
                                    <button type="submit" style="color:white; background:#3fa9f5;" name="add_product" value="Add Product" class="btn btn-default"  onClick = "calculateAdd()">Submit</button>
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
