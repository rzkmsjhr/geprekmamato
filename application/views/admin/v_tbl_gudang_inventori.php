<div class="card">
  <div class="header">
      <h4 class="title">Inventori</h4>
  </div>
  <div class="content table-responsive table-full-width">
      <table class="table table-hover table-striped">
          <thead>
              <th>Kode Inventori</th>
              <th>Nama</th>
              <th>Satuan</th>
              <th>Stok</th>
          </thead>
          <tbody>
              <?php 
                  foreach($inventori as $row)
                  { ?>
                    <!--<?php $originalDate = $row->tanggal_beli;
                    $newDate = date("d-m-Y", strtotime($originalDate)); ?>-->
                    <tr>
                    <td><?php echo $row->kode_item ?></td>
                    <td><?php echo $row->nama_item ?></td>
                    <td><?php echo $row->satuan ?></td>
                    <td><?php echo $row->stok ?></td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>
<a class="btn btn-success btn-fill" href="<?php echo base_url('admin/inventori_in'); ?>"><p>Inventori Masuk</p></a>
<a class="btn btn-danger btn-fill" href="<?php echo base_url('admin/inventori_out'); ?>"><p>Inventori Keluar</p></a>

<br>
<br>

<div class="card">
  <div class="header">
      <h4 class="title">Inventori Masuk</h4>
  </div>
  <div class="content table-responsive table-full-width">
      <table class="table table-hover table-striped">
          <thead>
              <th>Kode Bahan</th>
              <th>Nama</th>
              <th>Tanggal Beli</th>
              <th>Harga Beli</th>
              <th>Satuan</th>
              <th>Jumlah Masuk</th>
              <th>Keterangan</th>
              <th>Action</th>
          </thead>
          <tbody>
              <?php 
                  foreach($inventori_in as $row)
                  { ?>
                    <?php $originalDate = $row->tanggal_beli;
                    $newDate = date("d-m-Y", strtotime($originalDate)); ?>
                    <tr>
                    <td><?php echo $row->kode_item ?></td>
                    <td><?php echo $row->nama_item ?></td>
                    <td><?php echo $newDate ?></td>
                    <td><?php echo $row->harga_beli ?></td>
                    <td><?php echo $row->satuan ?></td>
                    <td><?php echo $row->jumlah ?></td>
                    <td><?php echo $row->keterangan ?></td>
                <td>
                <a href="" data-toggle="modal" data-target="#myModal<?php echo $row->id_item_in; ?>"><i rel="tooltip" title="Delete" class="fa fa-times"></i></a>
                    </td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>

<div class="card">
  <div class="header">
      <h4 class="title">Inventori Keluar</h4>
  </div>
  <div class="content table-responsive table-full-width">
      <table class="table table-hover table-striped">
          <thead>
              <th>Kode Bahan</th>
              <th>Nama</th>
              <th>Tanggal Keluar</th>
              <th>Satuan</th>
              <th>Jumlah Keluar</th>
              <th>Keterangan</th>
              <th>Action</th>
          </thead>
          <tbody>
              <?php 
                  foreach($inventori_out as $row)
                  { ?>
                    <?php $originalDate = $row->tanggal_keluar;
                    $newDate = date("d-m-Y", strtotime($originalDate)); ?>
                    <tr>
                    <td><?php echo $row->kode_item ?></td>
                    <td><?php echo $row->nama_item ?></td>
                    <td><?php echo $newDate ?></td>
                    <td><?php echo $row->satuan ?></td>
                    <td><?php echo $row->jumlah ?></td>
                    <td><?php echo $row->keterangan ?></td>
                <td>
                <a href="" data-toggle="modal" data-target="#myModal<?php echo $row->id_item_out; ?>"><i rel="tooltip" title="Delete" class="fa fa-times"></i></a>
                    </td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>
<?php 
foreach($inventori_out as $row)
{ ?>
<div id="myModal<?php echo $row->id_item_out; ?>" class="modal fade" role="dialog">
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
        <a  href="<?php echo base_url();?>admin/delete_inventori_out/<?php echo $row->id_item_out; ?>" class="btn btn-default"  >Yes</a>
      <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
    </div>
  </div>
</div>
</div>
<?php }?>
<?php 
foreach($inventori_in as $row)
{ ?>
<div id="myModal<?php echo $row->id_item_in; ?>" class="modal fade" role="dialog">
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
        <a  href="<?php echo base_url();?>admin/delete_inventori_in/<?php echo $row->id_item_in; ?>" class="btn btn-default"  >Yes</a>
      <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
    </div>
  </div>
</div>
</div>
<?php }?>