<!-- <SCRIPT language = JavaScript>

$(document).ready(function() { 
    $('#stock_in').change(function() {
      $('#total_stock').val($('#stock_in').val());
      $('#stock_remain').val($('#stock_in').val());
    });

});

</SCRIPT> -->
<?php
if (isset($_POST['sum'])) {
    echo '<p>This was submitted </p>';
} 
?>

<script type="text/javascript">
    function yourfunction(radioid)
    {
    if(radioid == 1)
    {    
        document.getElementById('one').style.display = '';
        document.getElementById('two').style.display = 'none';
     }
     else if(radioid == 2)
    {  
        document.getElementById('two').style.display = '';
        document.getElementById('one').style.display = 'none';
    }
    }
</script>

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
                                 <STRONG>Cost Range</STRONG></br>
                                    <INPUT TYPE='checkbox' NAME='grp2' VALUE='Sum' onClick="javascript:return yourfunction(1)">Sum</br>
                                    <!-- <INPUT TYPE='checkbox' NAME='grp2' VALUE='Per Unit' onClick="javascript:return yourfunction(2)">Per</br> -->
                                <br/>

                                <div id = "one" style = "display:none"> Sum
                                <select name="school">

                                <option value="school1">school 1</option>;
                                <option value="school2">school 2</option>;
                                <option value="school3">school 3</option>;
                                </select><br/>
                                </div><br/>

                            </div>
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
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="post[cost]" id="cost" placeholder="Enter Total Cost">
                                </div>
                                <label for="cost" style="color:#3fa9f5;" class="col-sm-1 control-label">Sum</label>
                                <div class="col-sm-2">
                                    <input type="checkbox" class="form-control" name="sum">
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
