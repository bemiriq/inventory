<div id="page-wrapper">
    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard <?php echo $action; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <!-- <? $this->post1->dashboard1() ?> -->
                                        <?php $this->transaction->dashboard1() ?>
                                    </div>
                                    <div>Total Transaction</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    
                                    <div class="huge">
                                        <?php $this->transaction->dashboard2() ?>
                                    </div>
                                    
                                    <div>Highest Transaction</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                    <?php $this->product->dashboard3() ?>
                                       
                                    </div>
                                    <div>Total Products</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                            <!-- small box -->
                            <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <?php $this->product->dashboard4() ?> 
                                    </div>
                                    <div>Total Users</div>
                                </div>
                            </div>
                        </div>
                    </div>
                        </div><!-- ./col -->
            </div>
            <!-- /.row -->
            <div class="row">
                
                <div class="table-responsive">
                <div class="col-lg-12">
                    <h1 class="page-header">Transaction Detail</h1>
                </div>
                  <table class="table tablesorter table-bordered table-hover table-striped sortable">
                     <thead>
                        <tr>
                           <th>Product Name</th>
                           <th>Supplier Name</th>
                           <th>Stock Sold</th>
                           <th>Customer</th>
                           <th>Stock Bought</th>
                           <th>Cost</th>
                        </tr>
                     </thead>
                     <tbody>
                       <?php $i=1; foreach($posts as $post): ?>
                        <tr <?=($i % 2 == 0) ? 'class="even"' : '' ?> >
                           <td><?=$post->productName?></td>
                           <td><?=$post->supplierName?></td>
                           <td><?=$post->stockSell?></td>
                           <td><?=$post->customerName?></td>
                           <td><?=$post->totalStockBuy?></td>
                           <td><?=$post->cost?></td>
                           <!-- <td><?=$post->stock_remain?></td>
                           <td><?=$post->date_posted?></td> -->
                        </tr>
                        <?php $i++; endforeach; ?>
                     </tbody>
                  </table>
               </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->


