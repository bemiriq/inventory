<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Report</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <br>
            <form method="post">
                <div class="row">
                    <?php foreach($posts as $post){?>

                        <div class="form-group col-md-3">
                            <label for="exampleInputDate1" style="color:#337AB7">From</label>
                            <input type="date" value="" class="form-control" name=date_posted" id="datepicker">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="exampleInputDate1" style="color:#337AB7">To</label>
                            <input type="date" value="" name="date_posted" class="form-control" id="datepicker">
                        </div>
                        <br>
                        <div class="form-group col-md-3">
                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                        <?php }?>
                </div>
                <br>
                  <div class="table-responsive">
                      <table class="table tablesorter table-bordered table-hover table-striped sortable">
                         <thead>
                            <tr>
                                <th>S/B Name</th>
                               <th>Type</th>
                                <th>Product Name</th>
                               <th>Unit</th>
                               <th>Cost</th>
                               <th>Date Posted</th>
                            </tr>
                         </thead>
                         <tbody>

                         <?php $this->transactionLog->reporttable() ?>

                            <?php $i=1; foreach($posts as $post): ?>
                            <tr <?=($i % 2 == 0) ? 'class="even"' : '' ?>>
                                <td><?=$post->sam?></td>
                                <!-- <td><?=$post->type?></td> -->
                                <td><?php
                                  if($post->type === '1'){
                                    echo 'Seller';
                                  }
                                  else{
                                    echo 'Buyer';
                                  }
                                  ?>
                                </td>
                                <td><?=$post->pam?></td>
                              <td><?=$post->unt?></td>
                               <td><?=$post->cst?></td>
                               <!-- <td><?=$post->sam?></td> -->
                               <td><?=$post->date_posted?></td>
                            </tr>
                            <?php $i++; endforeach; ?>
                         </tbody>
                      </table>
                   </div>
                   <div class="row">
                      <div class="col-md-12 text-center">
                          <p><?php echo $pagination; ?></p>
                      </div>
                  </div>
                </div>
            </form>
