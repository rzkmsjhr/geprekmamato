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
          </thead>
          <tbody>
              <?php 
                  foreach($menu as $row)
                  { ?>
                    <tr>
                    <td><?php echo $row->nama_menu ?></td>
                    <td><?php echo $row->harga_menu ?></td>
                    <td><?php echo $row->nama_kategori ?></td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>
