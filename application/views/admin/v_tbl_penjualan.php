<div class="card">
  <div class="header">
      <h4 class="title">Data Penjualan - Harian</h4>
  </div>

  <div class="content table-responsive table-full-width">
      <table class="table table-hover table-striped">
          <thead>
              <th>Tanggal</th>
              <th>Jumlah Transaksi</th>
              <th>Menu Terjual(Porsi)</th>
              <th>Omzet</th>
          </thead>
          <tbody>
              <?php 
                  foreach($penjualanharian['harian'] as $row)
                  { ?>
                    <?php $originalDate = $row->tanggal_transaksi;
                    $newDate = date("d-m-Y", strtotime($originalDate)); ?>
                    <tr>
                    <td><?php echo $newDate ?></td>
                    <td><?php echo $row->jumlah_transaksi ?></td>
                    <td><?php echo $row->menu_terjual ?></td>
                    <td><?php $harga=number_format($row->omzet,0,",",".");
                    echo "Rp. ".$harga; ?></td>
                <!--<td>
                <a href="<?php echo base_url();?>admin/edit/<?php echo $row->CourseID; ?>"><i rel="tooltip" title="Update" class="fa fa-edit"></i></a>
                <a href="<?php echo base_url();?>admin/delete/<?php echo $row->CourseID; ?>"><i rel="tooltip" title="Delete" class="fa fa-times"></i></a>
                <a href="<?php echo base_url();?>home/course_detail/<?php echo $row->CourseID; ?>"><i rel="tooltip" title="Detail" class="fa fa-info"></i></a>
                    </td>-->
                    </tr>
                <?php }?>
            </tbody>
        </table>
        <?php echo $penjualanharian['pagination']; ?>
    </div>
</div>
<div class="card">
    <div class="header">
      <h4 class="title">Data Penjualan - Mingguan</h4>
    </div>
    <div class="content table-responsive table-full-width">
      <table class="table table-hover table-striped">
          <thead>
              <th>Tanggal(Awal Minggu)</th>
              <th>Jumlah Transaksi</th>
              <th>Menu Terjual(Porsi)</th>
              <th>Omzet</th>
          </thead>
          <tbody>
             <?php 
                  foreach($penjualanmingguan as $row)
                  { ?>
                    <?php $originalDate = $row->tanggal_transaksi;
                    $newDate = date("d-m-Y", strtotime($originalDate)); ?>
                    <tr>
                    <td><?php echo $newDate ?></td>
                    <td><?php echo $row->jumlah_transaksi ?></td>
                    <td><?php echo $row->menu_terjual ?></td>
                    <td><?php $harga=number_format($row->omzet,0,",",".");
                    echo "Rp. ".$harga; ?></td>
                <!--<td>
                <a href="<?php echo base_url();?>admin/edit/<?php echo $row->CourseID; ?>"><i rel="tooltip" title="Update" class="fa fa-edit"></i></a>
                <a href="<?php echo base_url();?>admin/delete/<?php echo $row->CourseID; ?>"><i rel="tooltip" title="Delete" class="fa fa-times"></i></a>
                <a href="<?php echo base_url();?>home/course_detail/<?php echo $row->CourseID; ?>"><i rel="tooltip" title="Detail" class="fa fa-info"></i></a>
                    </td>-->
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>

<div class="card">
    <div class="header">
      <h4 class="title">Data Penjualan - Bulanan</h4>
    </div>
    <div class="content table-responsive table-full-width">
      <table class="table table-hover table-striped">
          <thead>
              <th>Bulan</th>
              <th>Jumlah Transaksi</th>
              <th>Menu Terjual(Porsi)</th>
              <th>Omzet</th>
          </thead>
          <tbody>
            <?php 
                foreach($penjualanbulanan as $row)
                { ?>
                  <?php $originalDate = $row->tanggal_transaksi;
                  $newDate = date("d-m-Y", strtotime($originalDate)); ?>
                  <tr>
                  <td><?php echo $row->bulan ?></td>
                  <td><?php echo $row->jumlah_transaksi ?></td>
                  <td><?php echo $row->menu_terjual ?></td>
                  <td><?php $harga=number_format($row->omzet,0,",",".");
                    echo "Rp. ".$harga; ?></td>
              <!--<td>
              <a href="<?php echo base_url();?>admin/edit/<?php echo $row->CourseID; ?>"><i rel="tooltip" title="Update" class="fa fa-edit"></i></a>
              <a href="<?php echo base_url();?>admin/delete/<?php echo $row->CourseID; ?>"><i rel="tooltip" title="Delete" class="fa fa-times"></i></a>
              <a href="<?php echo base_url();?>home/course_detail/<?php echo $row->CourseID; ?>"><i rel="tooltip" title="Detail" class="fa fa-info"></i></a>
                  </td>-->
                  </tr>
            <?php }?>
          </tbody>
        </table>
    </div>
</div>