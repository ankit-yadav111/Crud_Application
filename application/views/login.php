        <section class="vh-100" >
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6 text-black">
        
                <div class="px-0 ms-xl-0">
                  <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
                  <!-- <span class="h1 fw-bold mb-0"><img src="<?php echo base_url(); ?>assests/images/logo1.png" style="margin-top: 3%; object-fit: cover; width: 20%;"></span> -->
                </div>
        
                <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
        
                  <form class="rounded shadow mx-5 bg-white mt-5" style="width: 26rem; padding: 20px;;" action="<?=base_url('User/loginnow')?>" method="post">
        
                    <h3 class="font-weight-bolder mb-4 pb-3" style="letter-spacing: 1px;">Log in</h3>
        
                    <div class="form-outline mb-4">
                      <input type="email" id="email" name="email" class="form-control form-control-lg" required/>
                      <label class="form-label" for="form2Example18">Email address</label>
                    </div>
        
                    <div class="form-outline mb-4">
                      <input type="password" id="password" name="password" class="form-control form-control-lg" required/>
                      <label class="form-label" for="form2Example28">Password</label>
                    </div>
        
                    <div class="pt-1 mb-4">
                      <button class="btn btn-info btn-lg btn-block" type="submit" id="login" name="loginBtn">Login</button>
                    </div>
                    <?php
                      if($this->session->flashdata('error')) {	?>
                      <p class="text-danger text-center" style="margin-top: 10px;"> <?=$this->session->flashdata('error')?></p>
                      <?php } ?>
                  </form>
        
                </div>
        
              </div>
              <div class="col-sm-6 px-0 d-none d-sm-block">
                <img src="<?php echo base_url(); ?>assests/images/Welcome to DistrictD.png"
                  alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
              </div>
            </div>
          </div>
        </section>


  </body>
</html>