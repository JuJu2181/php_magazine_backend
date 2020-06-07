<?php 
$header = "Message";
include 'inc/header.php'; ?>
<?php include 'inc/checklogin.php'; ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <?php flashMessage(); ?>
            <div class="page-title">
              <div class="title_left">
                <h3>Message</h3>
              </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>List of All Recieved Messages</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <th>S.N</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Time</th>
                        <th>Message ID</th>
                        <th>Message Type</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                        <?php 
                          $Message = new message();
                          $messages = $Message->getAllMessage();
                          // debugger($messages);
                          if ($messages) {
                            foreach ($messages as $key => $message) {
                        ?>
                        <tr>
                          <td><?php echo $key+1; ?></td>
                          <td><?php echo $message->email; ?></td>
                          <td><?php echo $message->subject; ?></td>
                          <td><?php echo html_entity_decode($message->message); ?></td>
                          <td><?php echo date("M d, Y h:i:s a",strtotime($message->created_date)); ?></td>
                          <td><?php echo $message->id;?></td>
                          <td><?php echo $message->state;?></td>
                          <td>
                             <a href="process/message?id=<?php echo($message->id) ?>&amp;act=<?php echo substr(md5("Delete-Message-".$message->id.$_SESSION['token']), 3,15) ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this message?');">
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