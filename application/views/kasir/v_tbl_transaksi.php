<div class="card">
  <div class="header">
      <h4 class="title">Daftar Transaksi</h4>
      <button class="btn btn-success" type="button" id="btn-search">Search</button>
    <a class="btn btn-success btn-fill" href="<?php echo base_url('kasir/transaksi'); ?>">Reset</a>
    <div class="col-md-4">
        <input required="required" class="form-control" placeholder="Input First / Last Name" type="text" id="keyword">
  </div>
  </div>
  <div id="view">
    <?php $this->load->view('kasir/v_transaksi', array('header'=>$header));?>
  </div>
</div>
<a class="btn btn-success btn-fill pull-left" href="<?php echo base_url('kasir/add_transaksi'); ?>"><p>Tambah Transaksi</p></a>