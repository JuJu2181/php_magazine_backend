<?php
$header = "Follow Us"; 
    include 'inc/header.php';
    include 'inc/checklogin.php';
?>          
            
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <?php
                flashMessage();
            ?>
            <div class="page-title">
              <div class="title_left">               
                <h3>Follow Us</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>List of Social-sites</h2>

                    <ul class="nav navbar-right panel_toolbox">
                      <a href="#" class="btn btn-primary" onclick="addSocialIcons()">Add Social-Sites</a>
                    </ul>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <table id="datatable" class="table table-striped table-bordered " style="text-align: center">
                        <thead >
                          <th style="text-align: center">S.N</th>
                          <th style="text-align: center">Icon Name</th>
                          <th style="text-align: center">URL</th>
                          <th style="text-align: center">Icon</th>
                          <th style="text-align: center">Action</th>
                        </thead>
                        <tbody>
                          <?php $SocialIcons = new social();
                          $socials = $SocialIcons->getAllSocialIcons();
                            // debugger($socials,true);
                          if ($socials) {
                            foreach ($socials as $key => $social) {
                          ?>
                          <tr>
                            <td><?php echo $key+1; ?></td>
                            <td><a href="<?php echo $social->iconname;?>"><?php echo $social->iconname;?></a></td>
                            <td><a href="<?php echo $social->url;?>"><?php echo $social->url;?></a></td>
                             
                            <td><a href="<?php echo $social->url;?>"> <i class="<?php echo ('fa fa-'.strtolower($social->iconname));?>"></i></a></td> 
                            <td>
                              <a href="javascript:;" class="btn btn-info" onclick="editSocialIcons(this);" data-social_info='<?php echo(json_encode($social))?>'>
                                <i class="fa fa-edit"></i>
                              </a>
                              <a href="process/social?id=<?php echo($social->id)?>&amp;act=<?php echo substr(md5("Delete-SocialIcons-".$social->id.$_SESSION['token']), 3,15) ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this social icon?');">
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
                      
                      <div class="modal fade" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                              <h4 class="modal-title" id="title">Add SocialIcons</h4>
                            </div>
                            <form action="process/social.php" method="post">
                              <div class="modal-body">
                                <div class="form-group">
                                    <label for="">Icon Name</label>
                                    <input type="text" class="form-control" name="iconname" id="iconname" placeholder="Icon Name" required="" >
                                </div>
                                <div class="form-group">
                                    <label for="">URL</label>
                                    <input type="text" class="form-control" name="url" id="url" placeholder="URL Here" required="" >
                                </div>
                             </div>
                              <div class="modal-footer">
                                <input type="hidden" id="id" name="id">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                              </div>                
                            </form>      
                        </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                      </div><!-- /.modal -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

<?php 
    include 'inc/footer.php';
?>
<script src="assets/js/datatable.js"></script>
<script type="text/javascript">

  function addSocialIcons(){
    $('#sIcons').addClass('form-group');
    $('#title').html('Add Social-Icons');
    $('#iconname').val("");
    $('#url').val("");
    $('#id').removeAttr('value');
    showModal();
  }

  function editSocialIcons(element){
     console.log(element);
    var social_info = $(element).data('social_info');

    if (typeof(social_info) != 'object'){
      social_info = JSON.parse(social_info);
    }
    // console.log(social_info);
    $('#title').html('Edit SocialIcons');
    $('#iconname').val(social_info.iconname);
    $('#url').val(social_info.url);
    $('#id').val(social_info.id);
    showModal();  
  }


  function showModal(data=""){
    $('.modal').modal();
  }

</script>