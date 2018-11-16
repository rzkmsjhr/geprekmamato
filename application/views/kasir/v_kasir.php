<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="assets/img/favicon.ico">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>KASIR - AYAM GEPREK MAMATO</title>

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
                  AYAM GEPREK MAMATO
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="<?php echo base_url('kasir'); ?>">
                        <i class="fa fa-dashboard"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('kasir/transaksi'); ?>">
                        <i class="fa fa-exchange"></i>
                        <p>Transaksi</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('kasir/menu'); ?>">
                        <i class="fa fa-book"></i>
                        <p>Menu</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('kasir/userkasir'); ?>">
                        <i class="fa fa-user"></i>
                        <p>User Kasir</p>
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
                <div class="col-lg-8 col-md-12">
                <h2>Hai, <?php echo $this->session->userdata("ses_nama"); ?></h2>
                <?php echo $contents; ?>
                </div>

            </div>
        </div>
    </div>
    <footer class="footer">
            <div class="container-fluid">
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Book Catalogue</a>, made with love
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
          url: "<?php echo base_url();?>kasir/harga_menu", 
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
          url: "<?php echo base_url();?>kasir/nilai_promo", 
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

    <script type="text/javascript">
    $(document).ready(function(){
      $("#btn-search").click(function(){ 
        $(this).html("SEARCHING...").attr("disabled", "disabled");
        
        $.ajax({
          url:'<?php echo base_url();?>/kasir/search_transaksi', 
          type: 'POST',
          data: {keyword: $("#keyword").val()},
          dataType: "json",
          beforeSend: function(e) {
            if(e && e.overrideMimeType) {
              e.overrideMimeType("application/json;charset=UTF-8");
            }
          },
          success: function(response){ 
            $("#btn-search").html("SEARCH").removeAttr("disabled");
            $("#view").html(response.hasil);
          },
          error: function (xhr, ajaxOptions, thrownError) { 
            alert(xhr.responseText); 
          }
        });
      });
    });
    </script>

    <script type="text/javascript">
    $(document).ready(function(){
    $('#submit-transaksi').submit(function(e){
        e.preventDefault(); 
             $.ajax({
                 url:'<?php echo base_url();?>kasir/save_transaksi',
                 type:"post",
                 data:new FormData(this),
                 processData:false,
                 contentType:false,
                 cache:false,
                 async:false,
                  success: function(data){
                    $("#notiftransaksi").fadeIn('slow');
                    setTimeout(function() { $("#notiftransaksi").hide(); }, 3000);
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
    $('#submit-user').submit(function(e){
        e.preventDefault(); 
             $.ajax({
                url:'<?php echo base_url();?>kasir/save_user',
                type:"post",
                data:new FormData(this),
                processData:false,
                contentType:false,
                cache:false,
                async:false,
                 success: function(data){
                  $("#notifuser").fadeIn('slow');
                  setTimeout(function() { $("#notifuser").hide(); }, 3000);
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
                url:'<?php echo base_url();?>kasir/update_user',
                type:"post",
                data:new FormData(this),
                processData:false,
                contentType:false,
                cache:false,
                async:false,
                 success: function(data){
                    $("#notifupdateuser").fadeIn('slow');
                    setTimeout(function() { $("#notifupdateuser").hide(); }, 3000);
               }
            });
        });
    });
    </script>
</html>