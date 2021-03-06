<div class="card">
  <div class="header">
      <h4 class="title">Menu</h4>
  </div>
  <div class="content table-responsive table-full-width">
      <table class="table table-hover table-striped">
          <thead>
              <th>Nama</th>
              <th>Harga</th>
              <th>Kategori</th>
              <th>Action</th>
          </thead>
          <tbody>
              <?php
                  foreach($menu as $row)
                  { ?>
                    <tr>
                    <td><?php echo $row->nama_menu ?></td>
                    <td><?php
                    $harga=number_format($row->harga_menu,0,",",".");
                    echo "Rp. ".$harga; ?></td>
                    <td><?php echo $row->nama_kategori ?></td>
                    <td>
                    <a href="<?php echo base_url();?>admin/edit_menu/<?php echo $row->id_menu; ?>"><i rel="tooltip" title="Update" class="fa fa-edit"></i></a>
                    <a href="" data-toggle="modal" data-target="#myModal<?php echo $row->id_menu; ?>"><i rel="tooltip" title="Delete" class="fa fa-times"></i></a>
                    </td>
                    </tr>
                    <div id="myModal<?php echo $row->id_menu; ?>" class="modal fade" role="dialog">
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
                            <a  href="<?php echo base_url();?>admin/delete_menu/<?php echo $row->id_menu; ?>" class="btn btn-default"  >Yes</a>
                          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        </div>
                      </div>
                    </div>
                    </div>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>
<a class="btn btn-success btn-fill pull-left" href="<?php echo base_url('admin/add_menu'); ?>"><p>Tambah Menu</p></a>
