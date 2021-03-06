<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Admin CMS - Ayam Geprek Mamato</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="<?php echo base_url()?>assets/cpanel/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/cpanel/css/animate.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url()?>assets/cpanel/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>
    <link href="<?php echo base_url()?>assets/cpanel/css/demo.css" rel="stylesheet" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

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
                    <a href="<?php echo base_url('homeadmin'); ?>">
                        <i class="fa fa-dashboard"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('homeadmin/logo'); ?>">
                        <i class="fa fa-exchange"></i>
                        <p>Home Logo</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('admin/penjualan'); ?>">
                        <i class="fa fa-bar-chart"></i>
                        <p>Data Penjualan</p>
                    </a>
                </li>
                <li>
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                    <i class="fa fa-book"></i><p>Menu</p></a>
                    <div id="collapseOne" class="panel-collapse collapse">
                    <a href="<?php echo base_url('admin/menu'); ?>">
                        <p>Menu</p>
                    </a>
                     <a href="<?php echo base_url('admin/kategori_menu'); ?>">
                        <p>Kategori Menu</p>
                    </a>
                    </div>
                </li>
                <li>
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                    <i class="fa fa-building"></i><p>Gudang</p></a>
                    <div id="collapseTwo" class="panel-collapse collapse">
                    <a href="<?php echo base_url('admin/mastergudang'); ?>">
                        <p>Master Gudang</p>
                    </a>
                    <a href="<?php echo base_url('admin/bahanmasak'); ?>">
                        <p>Bahan Masakan</p>
                    </a>
                    <a href="<?php echo base_url('admin/inventori'); ?>">
                        <p>Inventori</p>
                    </a>
                    </div>
                </li>
                <li>
                    <a href="<?php echo base_url('admin/promo'); ?>">
                       <i class="fa fa-tags" aria-hidden="true"></i>
                        <p>Promo</p>
                    </a>
                </li>
                <li>
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                    <i class="fa fa-user"></i><p>User</p></a>
                    <div id="collapseThree" class="panel-collapse collapse">
                    <a href="<?php echo base_url('admin/useradmin'); ?>">
                        <p>Admin</p>
                    </a>
                    <a href="<?php echo base_url('admin/userkasir'); ?>">
                        <p>Kasir</p>
                    </a>
                    <a href="<?php echo base_url('admin/usergudang'); ?>">
                        <p>Gudang</p>
                    </a>
                    </div>
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

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="<?php echo base_url('login/logout'); ?>"><i class="fa fa-sign-out"></i><p>Log out</p></a>
                        </li>
                        <li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                    <h2>Hai, <?php echo $this->session->userdata("ses_nama"); ?></h2>
                    <?php echo $contents; ?>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Ayam Geprek Mamato</a>, made with love
                </p>
            </div>
        </footer>
    </div>
</div>
</body>

    <script src="<?php echo base_url();?>/assets/cpanel/js/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="<?php echo base_url();?>/assets/cpanel/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>/assets/cpanel/js/light-bootstrap-dashboard.js?v=1.4.0"></script>
    <script src="<?php echo base_url();?>/assets/cpanel/js/demo.js"></script>

    <script type="text/javascript">
        function printDiv(print) {
        var printContents = document.getElementById(print).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        }
    </script>
    
    <script type="text/javascript">
    jQuery(document).ready(function() {
    //$(".add-more").load(location.href + ".add-more");''
      $("body").on("click",".add-more",function(){
          var html = $(".after-add-more:first").clone(true, true);
          $(html).find(".remove").html("<br><a class='btn btn-danger btn-fill remove'>Remove</a>");
        $(".after-add-more").last().after(html);
      });
      $("body").on("click",".remove",function(){ 
          $(this).parents(".after-add-more").remove();
      });
      });
    </script>

    <script type="text/javascript">
    $(document).ready(function(){ 
      $("#menu").change(function(){
        $.ajax({
          type: "POST", 
          url: "<?php echo base_url();?>admin/harga_menu", 
          data: {id_menu : $("#menu").val()},
          dataType: "json",
          beforeSend: function(e) {
            if(e && e.overrideMimeType) {
              e.overrideMimeType("application/json;charset=UTF-8");
            }
          },
          success: function(response){
            $("#jumlah").html(response.list_menu).show();
            $("#list_nama").html(response.list_nama).show();
          },
          error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
          }
        });
      });
    });
    </script>

    <script type="text/javascript">
    $(document).ready(function(){ 
      $("#promo").change(function(){
        $.ajax({
          type: "POST", 
          url: "<?php echo base_url();?>admin/nilai_promo", 
          data: {id_promo : $("#promo").val()},
          dataType: "json",
          beforeSend: function(e) {
            if(e && e.overrideMimeType) {
              e.overrideMimeType("application/json;charset=UTF-8");
            }
          },
          success: function(response){
            $("#list_promo").html(response.list_promo).show();
          },
          error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
          }
        });
      });
    });
    </script>

    <script type="text/javascript">
      jQuery(document).ready(function(){
      // Show password Button
      $("#showpassword").on('click', function(){
        var pass = $("#password");
        var fieldtype = pass.attr('type');
        if (fieldtype == 'password') {
          pass.attr('type', 'text');
          $(this).text("Hide Password");
        }else{
          pass.attr('type', 'password');
          $(this).text("Show Password");
        }
      });
    });
    </script>

    <script>
    $( function() {
      var date = $('#tanggal-beli').datepicker({ dateFormat: 'yy-mm-dd' }).val();
    } );
    </script>

    <script type="text/javascript">
    $(document).ready(function(){
    $('#submit-transaksi').submit(function(e){
        e.preventDefault(); 
             $.ajax({
                 url:'<?php echo base_url();?>admin/save_transaksi',
                 type:"post",
                 data:new FormData(this),
                 processData:false,
                 contentType:false,
                 cache:false,
                 async:false,
                  success: function(data){
                      alert("Data Transaksi Sudah Disimpan");
               },
                  error: function (xhr, ajaxOptions, thrownError) {
                      alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
               }
             });
        });
    });
    </script>

    <script type="text/javascript">
    $(document).ready(function(){
    $('#submit-kategori').submit(function(e){
        e.preventDefault(); 
             $.ajax({
                 url:'<?php echo base_url();?>admin/save_kategori',
                 type:"post",
                 data:new FormData(this),
                 processData:false,
                 contentType:false,
                 cache:false,
                 async:false,
                  success: function(data){
                      alert("Data Kategori Sudah Disimpan");
               }
             });
        });
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function(){
    $('#update-kategori').submit(function(e){
        e.preventDefault(); 
             $.ajax({
                 url:'<?php echo base_url();?>admin/update_kategori',
                 type:"post",
                 data:new FormData(this),
                 processData:false,
                 contentType:false,
                 cache:false,
                 async:false,
                  success: function(data){
                      alert("Update Kategori Sukses");
               }
            });
        });
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function(){
    $('#submit-menu').submit(function(e){
        e.preventDefault(); 
             $.ajax({
                 url:'<?php echo base_url();?>admin/save_menu',
                 type:"post",
                 data:new FormData(this),
                 processData:false,
                 contentType:false,
                 cache:false,
                 async:false,
                  success: function(data){
                      alert("Data Menu Sudah Disimpan");
               }
             });
        });
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function(){
    $('#update-menu').submit(function(e){
        e.preventDefault(); 
             $.ajax({
                 url:'<?php echo base_url();?>admin/update_menu',
                 type:"post",
                 data:new FormData(this),
                 processData:false,
                 contentType:false,
                 cache:false,
                 async:false,
                  success: function(data){
                      alert("Update Menu Sukses");
               }
            });
        });
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function(){
    $('#submit-item').submit(function(e){
        e.preventDefault(); 
             $.ajax({
                 url:'<?php echo base_url();?>admin/save_item_gudang',
                 type:"post",
                 data:new FormData(this),
                 processData:false,
                 contentType:false,
                 cache:false,
                 async:false,
                  success: function(data){
                      alert("Item Sukses di Input");
               }
            });
        });
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function(){
    $('#update-item').submit(function(e){
        e.preventDefault(); 
             $.ajax({
                 url:'<?php echo base_url();?>admin/update_item_gudang',
                 type:"post",
                 data:new FormData(this),
                 processData:false,
                 contentType:false,
                 cache:false,
                 async:false,
                  success: function(data){
                      alert("Item Sukses di Update");
               }
            });
        });
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function(){
    $('#submit-item-in').submit(function(e){
        e.preventDefault(); 
             $.ajax({
                 url:'<?php echo base_url();?>admin/save_item_in',
                 type:"post",
                 data:new FormData(this),
                 processData:false,
                 contentType:false,
                 cache:false,
                 async:false,
                  success: function(data){
                      alert("Data Item Masuk Sukses di Update");
               }
            });
        });
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function(){
    $('#submit-item-out').submit(function(e){
        e.preventDefault(); 
             $.ajax({
                 url:'<?php echo base_url();?>admin/save_item_out',
                 type:"post",
                 data:new FormData(this),
                 processData:false,
                 contentType:false,
                 cache:false,
                 async:false,
                  success: function(data){
                      alert("Data Item Keluar Sukses di Update");
               }
            });
        });
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function(){
    $('#update-item-in').submit(function(e){
        e.preventDefault(); 
             $.ajax({
                url:'<?php echo base_url();?>admin/update_item_in',
                type:"post",
                data:new FormData(this),
                processData:false,
                contentType:false,
                cache:false,
                async:false,
                 success: function(data){
                     alert("Item Masuk Sukses di Update");
               }
            });
        });
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function(){
    $('#submit-promo').submit(function(e){
        e.preventDefault(); 
             $.ajax({
                url:'<?php echo base_url();?>admin/save_promo',
                type:"post",
                data:new FormData(this),
                processData:false,
                contentType:false,
                cache:false,
                async:false,
                 success: function(data){
                    alert("Input Data Promo Sukses");
               }
            });
        });
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function(){
    $('#update-promo').submit(function(e){
        e.preventDefault(); 
             $.ajax({
                url:'<?php echo base_url();?>admin/update_promo',
                type:"post",
                data:new FormData(this),
                processData:false,
                contentType:false,
                cache:false,
                async:false,
                 success: function(data){
                    alert("Update Data Promo Sukses");
               }
            });
        });
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function(){
    $('#submit-user').submit(function(e){
        e.preventDefault(); 
             $.ajax({
                url:'<?php echo base_url();?>admin/save_user',
                type:"post",
                data:new FormData(this),
                processData:false,
                contentType:false,
                cache:false,
                async:false,
                 success: function(data){
                    alert("Insert User Sukses");
               },
          error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
          }
            });
        });
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function(){
    $('#update-user').submit(function(e){
        e.preventDefault(); 
             $.ajax({
                url:'<?php echo base_url();?>admin/update_user',
                type:"post",
                data:new FormData(this),
                processData:false,
                contentType:false,
                cache:false,
                async:false,
                 success: function(data){
                    alert("Update User Sukses");
               }
            });
        });
    });
    </script>
</html>