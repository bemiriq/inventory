

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Table</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-6">

            <form name="frmOne" id="newBatch" class="form-horizontal" action="" method="post">

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
                    <label for="cost" style="color:#3fa9f5;" class="col-sm-3 control-label">Product Cost</label>

                    <div class="col-sm-5">
                        <input type="text" class="form-control"
                               value="<?php echo isset($post) ? $post->cost:''; ?>" name="systemProduct[cost]"
                               id="get_prices" placeholder="Enter Total Cost">
                    </div>
                    <label for="cost" style="color:#3fa9f5;" class="col-sm-1 control-label">Sum</label>

                    <div class="col-sm-2">
                        <input type="checkbox" class="form-control" name="systemProduct[sum]" value="1">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-6 col-sm-5">
                        <button type="submit" style="color:white; background:#3fa9f5;" class="btn btn-default" >Submit</button>
                    </div>
                </div>

            </form>

            </div>

        <div class="col-lg-6">

            <?php
            echo "<form method='post' action=''>";
            $getNameValue = $this->session->userdata('nameValue');
            echo '<h3>' .$getNameValue['name'] .' paid Rs ' .$getNameValue['cash_amount']. '</h3>';
            //    echo "<table border='1'><tr><td>" .print_r($getValue) . "</td></tr></table>";

//            $getValue[] = array('product_name'=>'sa','unit'=>'7','cost'=>'90');

//           $getValue[] = $this->session->set_userdata('sessiondata', $getValue);
            $getValue = $this->session->userdata('sessiondata');
            if ($getValue != NULL){
                echo '<input type="hidden" name="newBatch[name]" value="'.$getNameValue['name'].'">';
                echo '<input type="hidden" name="newBatch[cash_amount]" value="'.$getNameValue['cash_amount'].'">';


                echo '<table  class="table table-bordered table-striped">';
                echo '<tr>';
                echo '<td><strong>Product Name</strong></td>';
                echo '<td><strong>Unit</strong></td>';
                echo '<td><strong>Cost</strong></td>';
//                echo "<form method='post' action=''>";
//            print_r($getValue);
//            exit;
                foreach ($getValue as $row)
                {
                    echo '<tr>';
                    echo '<td><input type="hidden" name="allProduct[product_name][]" value="'.$row['product_name'].'">' .$row['product_name']. '</td>';
//                    echo '<input type="hidden" name="allProduct[type][]" value="1">';
                    echo '<td><input type="hidden" name="allProduct[unit][]" value="'.$row['unit'].'">' .$row['unit']* '-1'.'</td>';
                    echo '<td><input type="hidden" name="allProduct[cost][]" value="'.$row['cost'].'">' .$row['cost']* '-1'.'</td>';
                    echo '</tr>';
                }
                echo '<tr><td></td><td><td><button type="submit" class="btn btn-success">POST</button></td></td></tr>';
                echo "</form>";
                echo '</table>';
            }

            //    $getValue = $this->session->userdata('sessiondata');
            //    $getValue[] = array('product_name'=>'sandesh','unit'=>'99');
            //    $this->session->set_userdata('sessiondata', $getValue);

            //    echo '<br><br>';
            //    echo "<table border='1'><tr><td>" .json_encode($getValue) . "</td></tr></table>";

            //    echo json_encode($getValue);
            ?>

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
