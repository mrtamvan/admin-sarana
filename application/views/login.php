<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login Dashboard Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?=base_url().'assets/'; ?>vendor/iconfonts/mdi/css/materialdesignicons.min.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?=base_url().'assets/'; ?>css/shared/style.css">
    <!-- endinject -->
    <!-- <link rel="shortcut icon" href="<?=base_url().'assets/'; ?>images/favicon.png" /> -->
  </head>
  <body style="background-image: url('<?=base_url().'assets/'; ?>/img/login_1.jpg');">
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
          <div class="row w-100">
            <div class="col-lg-4 mx-auto">
              <h2 class="text-center mb-4" style="color: white">Login  <b>PANEL</b></h2>
              <div class="auto-form-wrapper">
              <?=$this->session->flashdata('pesan'); ?>
                <?=form_open(base_url().'clogin/login');?>
                  <div class="form-group">
                    <label class="label">Email</label>
                    <div class="input-group">
                      <input type="text" name="email" autocomplete="off" class="form-control" placeholder="your email">
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-account"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="label">Password</label>
                    <div class="input-group">
                      <input type="password" name="password" autocomplete="off" class="form-control" placeholder="*********">
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-lock"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-primary submit-btn btn-block">Login</button>
                  </div>
                  <div class="form-group d-flex justify-content-between">
                    <div class="form-check form-check-flat mt-0">
                      
                    </div>

                  </div>
                  
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
  </body>
</html>