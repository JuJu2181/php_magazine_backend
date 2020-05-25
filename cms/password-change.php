<?php 
 $header = "Change Password"; 
include 'inc/header.php'; 
 include 'inc/checklogin.php'; 
?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <?php flashMessage(); ?>
            <div class="page-title">
              <div class="title_left">
                <h3>Change Password</h3>
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
                    <h2>Change your password here...</h2>
                    <!-- <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul> -->
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form action="process/password-change" method="post">
                      <div class="form-group col-md-7">
                        <label for="">Old Password</label>
                        <input type="password" name="oldpassword" id="oldpassword" class="form-control" >
                      </div>

                      <div class="form-group col-md-7">
                        <label for="">New Password</label>
                        <input type="password" name="password" id="password" class="form-control" >
                      </div>

                      <div class="form-group col-md-7">
                        <label for="">Retype New Password</label>
                        <input type="password" name="newpassword" id="newpassword" class="form-control" >
                      </div>
                      <div class="form-group col-md-5">
                        <span id="error" class="hidden"></span>
                      </div>
                      <div class="form-group col-md-7">
                        <button class="btn btn-default btn-disabled" type="reset" id = "reset">Reset</button>
                        <button class="btn btn-success" type="submit" id="submit">Submit</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
  <?php include 'inc/footer.php'; ?>

  <script>
    $('#newpassword').keyup(function(){
      var password = $('#password').val();
      var newpassword = $('#newpassword').val();
       console.log(password);
       console.log(newpassword);
      if (password==newpassword) {
        $('#error').addClass('hidden').removeClass('alert').removeClass('alert-danger').html('');
        $('#submit').removeAttr('disabled','disabled');
      }else{
        //password not equal
        $('#error').removeClass('hidden').addClass('alert').addClass('alert-danger').html('Password Doesnot match');
        $('#submit').attr('disabled','disabled');
      }
    });
    
    //To remove the error on clicking reset
    $('#reset').click(function(){
        $('#error').addClass('hidden').removeClass('alert').removeClass('alert-danger').html('');
        $('#submit').attr('disabled','disabled');
      });

  </script>