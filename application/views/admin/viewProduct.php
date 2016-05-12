<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Product List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>               
            <br>
            <div class="table-responsive">
                  <table class="table tablesorter table-bordered table-hover table-striped sortable">
                     <thead>
                        <tr>
                           <th>Product Name</th>
<!--                           <th>Product Added</th>-->
<!--                           <th>Cost</th>-->
                           <th>Added Date</th>
                           <th>Update</th>
                           <th>Delete</th>

                        </tr>
                     </thead>
                     <tbody>
                        <?php $i=1; foreach($posts as $post): ?>
                        <tr <?=($i % 2 == 0) ? 'class="even"' : '' ?>>
                           <td><?=$post->productName?></td>
                           <td><?=$post->date_posted?></td>
                           <td><a href="<?=site_url("inventory/editProduct/".$post->product_id)?>">edit</a> </td>
                           <form action="<?=site_url("inventory/deleteProduct/".$post->product_id)?>" method="post">
                            <input type="hidden" value="1" class="form-control" name="deleteP[deleteProduct]">
                            <td> <button type="submit" style="color:white; background:#3fa9f5;" onclick="return confirm('Do you realy want to delete this product ?'); " class="btn btn-default" >Delete</button> </td>
                              <!-- <td> <a href="<?=site_url("inventory/deleteProduct/".$post->product_id)?>" onclick="return confirm('Do you realy want to delete this product ?'); " value="1" name="deleteP[deleteProduct]">delete</a></td> -->
                            </form>
                        </tr>
                        <?php $i++; endforeach; ?>
                     </tbody>
                  </table>
               </div>
            </div>