<?php 
$header = "Subscriber";
include 'inc/header.php'; ?>
<?php include 'inc/checklogin.php'; ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <?php flashMessage(); ?>
            <div class="page-title">
              <div class="title_left">
                <h3>Subscriber</h3>
              </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>List of All Recieved Subscribers</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <th>S.N</th>
                        <th>Email</th>
                        <th>Time</th>
                        <th>Subscriber ID</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                        <?php 
                          $Newsletter = new newsletter();
                          $newsletters = $Newsletter->getAllNewsletter();
                          // debugger($newsletters);
                          if ($newsletters) {
                            foreach ($newsletters as $key => $newsletter) {
                        ?>
                        <tr>
                          <td><?php echo $key+1; ?></td>
                          <td><?php echo $newsletter->email; ?></td>
                          <td><?php echo date("M d, Y h:i:s a",strtotime($newsletter->created_date)); ?></td>
                          <td><?php echo $newsletter->id;?></td>
                          <td>
                             <a href="process/newsletter?id=<?php echo($newsletter->id) ?>&amp;act=<?php echo substr(md5("Delete-Newsletter-".$newsletter->id.$_SESSION['token']), 3,15) ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this newsletter?');">
                              <i class="fa fa-trash"></i>
                            </a>
                          </td>
                        
                        </tr>
                        <?php
                            }
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
  <?php include 'inc/footer.php'; ?>
  <script src="assets/js/datatable.js"></script>