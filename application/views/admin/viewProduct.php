<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Product List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>               

            <div class="row">
                <div class="col-lg-12">
                    <!-- <p class="page-paragraph" style="color:#0077cc;"><strong style="color: #13233c;">Total Stock Transaction </strong>= Stock In + Stock Out + Damage + Stock Remain</p> -->
                    <p class="page-paragraph" style="color:#0077cc;"><strong style="color: #13233c;">Stock Remain </strong>= Stock In + Damage - Stock Out</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <br>
            <div class="table-responsive">
                  <table class="table tablesorter table-bordered table-hover table-striped sortable">
                     <thead>
                        <tr>
                           <th>Product Name</th>
                           <th>Product Added</th>
                           <th>Cost</th>
                           <th>Added Date</th>
                           <th>Update</th>
                           <th>Delete</th>

                        </tr>
                     </thead>
                     <tbody>
                        <?php $i=1; foreach($posts as $post): ?>
                        <tr <?=($i % 2 == 0) ? 'class="even"' : '' ?>>
                           <td><?=$post->productName?></td>
                           <td><?=$post->stockIn?></td>
                           <td><?=$post->cost?></td>
                           <td><?=$post->date_posted?></td>
                           <td><a href="<?=site_url("inventory/editProduct/".$post->product_id)?>">edit</a> </td>
                           <td> <a href="<?=site_url("inventory/deleteProduct/".$post->product_id)?>">delete</a></td>
                        </tr>
                        <?php $i++; endforeach; ?>
                     </tbody>
                  </table>
               </div>
            </div>