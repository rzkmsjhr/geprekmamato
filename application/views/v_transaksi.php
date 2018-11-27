<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Transaksi - Ayam Geprek Mamato</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="<?php echo base_url()?>assets/cpanel/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/cpanel/css/animate.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url()?>assets/cpanel/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>
    <link href="<?php echo base_url()?>assets/cpanel/css/demo.css" rel="stylesheet" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="black" data-image="<?php echo base_url('assets/cpanel/img/sidebar-5.jpg'); ?>">
    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                  Ayam Geprek Mamato
                </a>
            </div>
            <ul class="nav">
                <li>
                    <a href="<?php echo base_url('home'); ?>">
                        <i class="fa fa-home"></i>
                        <p>Kembali ke Home AGM</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                </div>
            </div>
        </nav>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                    <?php foreach($header as $row){ ?>
                    <h2>Hai, <?php echo $row->nama_customer ?></h2>
                    <div class="card">
  
  <div class="header">
      <h3 class="title">Detail Transaksi</h3>
      <div class="col-md-3">
      <img src="<?php echo base_url();?>/assets/qrtrans/<?php echo $row->no_transaksi ?>.png" class="img-responsive" height="200" width="200">
      </div>
      <div class="col-md-8">
      <p class="card-category">Tanggal Transaksi : <?php echo $row->tanggal_transaksi ?></p>
      <p class="card-category">Waktu Transaksi : <?php echo $row->waktu_transaksi ?></p>
      <p class="card-category">No. Transaksi : <?php echo $row->no_transaksi ?></p>
      <p class="card-category">Nama Customer : <?php echo $row->nama_customer ?></p>
      <p class="card-category">Kasir : <?php echo $row->username ?></p>
      </div>
  </div>

  <?php } ?>
  <div class="content table-responsive table-full-width">
      <table class="table table-hover table-striped">
          <thead>
              <th>Nama Menu</th>
              <th>Harga Menu</th>
              <th>Quantity</th>
              <th>Subtotal</th>
          </thead>
          <tbody>
          <?php 
          $total_price = 0;
          foreach($sale as $row){ ?>
             <?php 
                $total_price += $row->harga_menu*$row->quantity;
                $diskon = ($total_price*$row->nilai_promo)/100;
                $total_bayar = $total_price-$diskon;
              ?>
                    <tr>
                      <td><?php echo $row->nama_menu ?></td>
                      <td><?php $harga=number_format($row->harga_menu,0,",","."); echo "Rp. ".$harga; ?></td>
                      <td><?php echo $row->quantity ?></td>
                      <td><?php $harga=number_format($row->total_bayar,0,",","."); echo "Rp. ".$harga; ?></td>
            <?php } ?>  
                <tr>
                  <td></td>
                  <td></td>
                  <td style="background-color:">Total Bayar</td>
                  <td style="background-color:"><?php $harga=number_format($total_price,0,",","."); echo "Rp. ".$harga; ?></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td style="background-color:">Diskon</td>
                  <td style="background-color:"><?php $harga=number_format($diskon,0,",","."); echo "Rp. ".$harga; ?></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td style="background-color: #F48024">Total Bayar</td>
                  <td style="background-color: #F48024"><?php $harga=number_format($total_bayar,0,",","."); echo "Rp. ".$harga; ?></td>
                </tr>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<a class="btn btn-danger btn-fill" href="<?php echo base_url('home'); ?>">Home</a>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.geprekmamato.com">Ayam Geprek Mamato</a>, made with love
                </p>
            </div>
        </footer>
    </div>
</div>
</body>
    <script src="<?php echo base_url();?>/assets/cpanel/js/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>/assets/cpanel/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>/assets/cpanel/js/light-bootstrap-dashboard.js?v=1.4.0"></script>
    <script src="<?php echo base_url();?>/assets/cpanel/js/demo.js"></script>
</html>