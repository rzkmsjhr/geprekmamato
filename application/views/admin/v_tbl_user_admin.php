<div class="card">
  <div class="header">
      <h4 class="title">Data Admin</h4>
  </div>
  <div class="content table-responsive table-full-width">
      <table class="table table-hover table-striped">
          <thead>
              <th>Username</th>
              <th>Password</th>
              <th>Action</th>
          </thead>
          <tbody>
              <?php 
                  foreach($useradmin as $row)
                  { ?>
                    <tr>
                    <td><?php echo $row->username ?></td>
                    <td><?php echo $row->password ?></td>
                <td>
                <a href="<?php echo base_url();?>admin/edit_user/<?php echo $row->id_user; ?>"><i rel="tooltip" title="Update" class="fa fa-edit"></i></a>
                <a href="" data-toggle="modal" data-target="#myModal<?php echo $row->id_user; ?>"><i rel="tooltip" title="Delete" class="fa fa-times"></i></a>
                    </td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>
<a class="btn btn-success btn-fill pull-left" href="<?php echo base_url('admin/add_user_admin'); ?>"><p>Tambah Admin</p></a>
<?php 
foreach($useradmin as $row)
{ ?>
<div id="myModal<?php echo $row->id_user; ?>" class="modal fade" role="dialog">
<div class="modal-dialog">
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Delete</h4>
    </div>
    <div class="modal-body">
      <p>Are you sure want to delete? </p>
    </div>
    <div class="modal-footer">
        <a  href="<?php echo base_url();?>admin/delete_admin/<?php echo $row->id_user; ?>" class="btn btn-default"  >Yes</a>
      <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
    </div>
  </div>
</div>
</div>
<?php }?>