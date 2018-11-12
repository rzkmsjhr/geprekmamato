<div class="card">
  <div class="header">
      <h4 class="title">Daftar Transaksi</h4>
  </div>
  <div class="content table-responsive table-full-width">
      <table class="table table-hover table-striped">
          <thead>
              <th>Tanggal Transaksi</th>
              <th>Waktu Transaksi</th>
              <th>No Transaksi</th>
              <th>Nama Customer</th>
              <th>Kasir</th>
              <th>Action</th>
          </thead>
          <tbody>
              <?php
                  foreach($header['transaksi'] as $row)
                  { ?>
                    <?php $originalDate = $row->tanggal_transaksi;
                    $newDate = date("d-m-Y", strtotime($originalDate)); ?>
                    <tr>
                    <td><?php echo $newDate ?></td>
                    <td><?php echo $row->waktu_transaksi ?></td>
                    <td><?php echo $row->no_transaksi ?></td>
                    <td><?php echo $row->nama_customer ?></td>
                    <td><?php echo $row->username ?></td>
                <td>
                <a href="<?php echo base_url();?>kasir/transaksi_detail/<?php echo $row->no_transaksi; ?>"><i rel="tooltip" title="Detail" class="fa fa-info"></i></a>
                    </td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
      <?php echo $header['pagination']; ?>
    </div>
</div>
<a class="btn btn-success btn-fill pull-left" href="<?php echo base_url('kasir/add_transaksi'); ?>"><p>Tambah Transaksi</p></a>