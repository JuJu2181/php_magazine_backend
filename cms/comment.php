<?php 
$header = "Comment";
include 'inc/header.php'; ?>
<?php include 'inc/checklogin.php'; ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <?php flashMessage(); ?>
            <div class="page-title">
              <div class="title_left">
                <h3>Comment</h3>
              </div>

              <!-- <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div> -->
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>List of Comments</h2>
                    <!-- <ul class="nav navbar-right panel_toolbox">
                      <a href="javascript:;" class="btn btn-primary" onclick="addComment();">Add Comment</a>
                    </ul> -->
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <th>S.N</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Website</th>
                        <th>Message</th>
                        <th>Time</th>
                        <th>Comment Type</th>
                        <th>Comment ID</th>
                        <th>Blog ID</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                        <?php 
                          $Comment = new comment();
                          $comments = $Comment->getAllWaitingComment();
                          // debugger($comments);
                          if ($comments) {
                            foreach ($comments as $key => $comment) {
                        ?>
                        <tr>
                          <td><?php echo $key+1; ?></td>
                          <td><?php echo $comment->name; ?></td>
                          <td><?php echo $comment->email; ?></td>
                          <td><?php echo $comment->website; ?></td>
                          <td><?php echo html_entity_decode($comment->message); ?></td>
                          <td><?php echo date("M d, Y h:i:s a",strtotime($comment->created_date)); ?></td>
                          <td><?php echo $comment->commentType; ?></td>
                          <td><?php echo (isset($comment->commentid) && !empty($comment->commentid))?$comment->commentid:"0"; ?></td>
                          <td><?php echo $comment->blogid; ?></td>
                          <td>
                            <a href="process/comment?id=<?php echo($comment->id) ?>&amp;act=<?php echo substr(md5("Accept-Comment-".$comment->id.$_SESSION['token']), 3,15) ?>" class="btn btn-success">
                              Accept
                            </a>

                            <a href="process/comment?id=<?php echo($comment->id) ?>&amp;act=<?php echo substr(md5("Reject-Comment-".$comment->id.$_SESSION['token']), 3,15) ?>" class="btn btn-danger">
                              Reject
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