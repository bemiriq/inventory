

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Product</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <?php if($data = $this->session->flashdata("message")): ?>
        <p class="success">

            <?php
            $getBatch = $data['batch_id'];
            //                echo $getBatch;
            //                var_dump($getBatch['batch_id']);
            echo "Bill <a href=".'../../inventory/buyingProduct/'.$getBatch.">" . $getBatch . "</a> product added successfully.";

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
