

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Product</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <?php
    $getValue = $this->session->userdata('systemProduct');
//    $getValue[] = array('product_name'=> '11','unit'=> '11');
    $this->session->set_userdata($getValue);

//    print_r($getValue);
    ?>

    <?php if($data = $this->session->flashdata("message")): ?>
        <p class="success">
            <?php
//            $getBatch = $data['batch_id'];
//            echo $getBatch;
//            exit;
//            echo "Bill <a href=".'../../inventory/newSystemBatch/'.$getBatch.">" . $getBatch . "</a> product added successfully.";
            echo "Bill <a href='../../inventory/newSystemBatch/1'>". 1 ."</a> product added successfully.";
            ?>
        </p>
    <?php endif; ?>



    <div class="row">


    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
