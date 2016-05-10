<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Transaction List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <br>
            <div class="table-responsive">
                  <table class="table tablesorter table-bordered table-hover table-striped sortable">
                     <thead>
                        <tr>
                           <th>Type</th>
                           <th>Unit</th>
                           <th>Cost</th>
                           <th>Date Posted</th>
                           <th>Update</th>
                           <th>Delete</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php $i=1; foreach($posts as $post): ?>
                        <tr <?=($i % 2 == 0) ? 'class="even"' : '' ?>>
                           <td><?=$post->name?></td>
                           <td><?=$post->unit?></td>
                           <td><?=$post->cost?></td>
                           <td><?=$post->date_posted?></td>
                           <td><a href="<?=site_url("inventory/editTransaction/".$post->transaction_id)?>">edit</a> </td>
                           <td> <a href="<?=site_url("inventory/deleteTransaction/".$post->transaction_id)?>" onclick="return confirm('Do you realy want to delete this transaction ?');">delete</a></td>
                        </tr>
                        <?php $i++; endforeach; ?>
                     </tbody>
                  </table>
               </div>
            </div>