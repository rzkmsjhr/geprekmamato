<div class="card">
  <div class="header">
      <h4 class="title">Master Gudang</h4>
  </div>
  <div class="content table-responsive table-full-width">
      <table class="table table-hover table-striped">
          <thead>
              <th>Kode Item</th>
              <th>Nama</th>
              <th>Satuan</th>
              <th>Stok</th>
              <th>Action</th>
          </thead>
          <tbody>
              <?php 
                  foreach($mastergudang as $row)
                  { ?>
                    <!--<?php $originalDate = $row->tanggal_beli;
                    $newDate = date("d-m-Y", strtotime($originalDate)); ?>-->
                    <tr>
                    <td><?php echo $row->kode_item ?></td>
                    <td><?php echo $row->nama_item ?></td>
                    <td><?php echo $row->satuan ?></td>
                    <td><?php echo $row->stok ?></td>
                    <td>
                    <a href="<?php echo base_url();?>gudang/edit_item_gudang/<?php echo $row->id_item; ?>"><i rel="tooltip" title="Update" class="fa fa-edit"></i></a>
                    <a href="" data-toggle="modal" data-target="#myModal<?php echo $row->id_item; ?>"><i rel="tooltip" title="Delete" class="fa fa-times"></i></a>
                    </td>
                    </tr>
                    <div id="myModal<?php echo $row->id_item; ?>" class="modal fade" role="dialog">
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
                            <a  href="<?php echo base_url();?>gudang/delete_item_gudang/<?php echo $row->id_item; ?>" class="btn btn-default"  >Yes</a>
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
<a class="btn btn-success btn-fill" href="<?php echo base_url('gudang/add_bahanmasakan'); ?>"><p>Tambah Bahan Masakan</p></a>
<a class="btn btn-primary btn-fill" href="<?php echo base_url('gudang/add_inventori'); ?>"><p>Tambah Inventori</p></a>