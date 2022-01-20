<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="refresh" content="600">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content=""> 

  <title>Lelang Online</title>

  <!-- Head Icon -->
  <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/img/gavel.png">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css">
  
  <!-- Bootstrap-select CSS -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap-select/dist/css/bootstrap-select.min.css">

  <!-- Font Awesome CSS -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/fontawesome/css/all.min.css">

  <!-- DataTables CSS -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/datatables/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/datatables/css/dataTables.bootstrap4.min.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/sidebar-style.css">

</head>

<body class="bg-warning">

  <div class="container my-5">

    <div class="row no-gutters bg-dark text-white position-relative mx-5 login-shape login-shadow">
      
      <div class="col-md-6 mb-0">
        <img src="<?php echo base_url() ?>assets/img/login-image.jpg" class="w-100 login-img-shape" height="550px" alt="...">
      </div>
      
      <div class="col-md-6 position-static p-3 pl-md-3 margin-top-larger">
        <center>

        <h5 class="mt-0 mb-5 font-weight-bolder"><i class="fas fa-gavel fa-md"></i> Lelang Ind</h5>
        
        <form id="login_form" method="post">
          
          <div class="form-group col-9">
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text form-content-shape">
                  <i class="fas fa-user"></i>
                </div>
              </div>
              <input type="text" name="username" class="form-control form-content-shape" placeholder="Username" required>
            </div>
          </div>

          <div class="form-group col-9 mb-5">
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text form-content-shape">
                  <i class="fas fa-lock"></i>
                </div>
              </div>
              <input type="password" name="password" class="form-control form-content-shape" placeholder="Password" required>
            </div>
          </div>

          <div class="form-group">
            <input id="login_url" type="hidden" value="<?php echo base_url('auth/login') ?>">
            <input type="submit" class="btn btn-outline-warning col-6 form-content-shape" value="Masuk">
          </div>

          <div class="form-group mb-5">
            <span>Belum memiliki akun? <a href="<?php echo base_url('register/index') ?>" class="text-warning">Mendaftar</a></span>
          </div>

        </form>

        <?php echo $this->session->flashdata('pesan'); ?>

        </center>
      </div>
    </div>

  </div>

  <!-- JQuery -->
  <script src="<?php echo base_url() ?>assets/jquery/jquery.min.js"></script>

  <!-- Bootstrap JavaScript-->
  <script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Bootstrap-select JavaScript -->
  <script src="<?php echo base_url() ?>assets/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

  <!-- Bootstrap-select JavaScript translation files -->
  <script src="<?php echo base_url() ?>assets/bootstrap-select/dist/js/i18n/defaults-*.min.js"></script>

  <!-- DataTables Javascript -->
  <script src="<?php echo base_url() ?>assets/datatables/js/jquery-3.5.1.js"></script>
  <script src="<?php echo base_url() ?>assets/datatables/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url() ?>assets/datatables/js/dataTables.bootstrap4.min.js"></script>

  <!-- JQuery Mask Javascript -->
  <script src="<?php echo base_url() ?>assets/jquery-mask/jquery-3.6.0.min"></script>
  <script src="<?php echo base_url() ?>assets/jquery-mask/jquery.mask.min"></script>
  <script src="<?php echo base_url() ?>assets/jquery-mask/jquery.mask.js"></script>

  <!-- Number Only Script -->
  <script type="text/javascript">
    function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
        return true;
    }
  </script>

  <!-- Periksa Login Script -->
  <script>
    $(document).ready(function(){

        $('#login_form').on("submit", function(event){  
            event.preventDefault();
            
            $.ajax({  
                url:$('#login_url').val(),  
                type:"POST",  
                data:new FormData($('#login_form')[0]), 
                processData: false,
                contentType: false, 
                success:function(data){
                    if (data == 'Username atau password anda salah') {
                        alert(data);
                    }else{
                        if (data == 'admin/dashboard_adm') {
                            window.location.assign("<?php echo base_url('admin/dashboard_adm') ?>");
                        }else if(data == 'petugas/dashboard_ptg') {
                            window.location.assign("<?php echo base_url('petugas/dashboard_ptg') ?>");
                        }else if (data == 'dashboard') {
                            window.location.assign("<?php echo base_url('dashboard') ?>");
                        }
                    }   
                }  
            });  
        });
    
    });    
  </script>

  <!-- Periksa Register Script -->
  <script>
    $(document).ready(function(){

        $('#register_form').on("submit", function(event){  
            event.preventDefault();
            
            $.ajax({  
                url:$('#register_url').val(),  
                method:"POST",  
                data:new FormData($('#register_form')[0]), 
                processData: false,
                contentType: false, 
                success:function(data){
                    if (data == 'Username sudah digunakan' || data == 'Konfirmasi password salah') {
                        alert(data);
                    }else{
                        alert(data);
                        window.location.assign("<?php echo base_url('auth') ?>");
                    }   
                }  
            });  
        });

    });    
  </script>

</body>

</html> 