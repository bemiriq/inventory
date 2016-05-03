<div id="page-wrapper">
    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
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
                                        221
                                    </div>
                                    <div>Total Stock</div>
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
                                        <!-- <? $this->post1->dashboard2() ?> -->
                                        1000
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
                                    <!-- <? $this->post->dashboard3() ?> -->
                                        200
                                    </div>
                                    <div>Total Category</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                
                <div class="table-responsive">
                <div class="col-lg-12">
                    <h1 class="page-header">Stock Detail</h1>
                </div>
                  <table class="table tablesorter table-bordered table-hover table-striped sortable">
                     <thead>
                        <tr>
                           <th>Category Name</th>
                           <th>Brand Name</th>
                           <th>Total Stock Transaction</th>
                           <th>Stock Out</th>
                           <th>Damage</th>
                           <th>Stock In</th>
                           <th>Stock Remain</th>
                           <th>Date posted</th>
                        </tr>
                     </thead>
                     <tbody>
                       <!-- <?php $i=1; foreach($posts as $post): ?>
                        <tr <?=($i % 2 == 0) ? 'class="even"' : '' ?>>
                           <td><?=$post->category_name?></td>
                           <td><?=$post->stock_name?></td>
                           <td><?=$post->total_stock?></td>
                           <td><?=$post->stock_out?></td>
                           <td><?=$post->damage?></td>
                           <td><?=$post->stock_in?></td>
                           <td><?=$post->stock_remain?></td>
                           <td><?=$post->date_posted?></td>
                        </tr>
                        <?php $i++; endforeach; ?> -->
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


