  <?php echo $this->element("sidebar"); ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">

         <div class="col-12">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-6 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <?php echo $this->Html->image('images/logo.svg',['alt'=>'logo'])?>
              </div>
              
              <?php echo $this->Form->create($contactListings)?>
              
              <div class="form-group">                  
                <!-- <?= h($result->id) ?> -->
                <!-- <?php echo $this->Form->control('user_id', ['class'=>'form-control', 'selected'=> $result->id]); ?> -->
                <?php echo $this->Form->control("user_id",['label'=>false,'id'=>'user_id', 'class'=>'form-control form-control-lg','placeholder'=>'Email', 'value'=>$result->id]); ?>                  
                </div>
                
                <div class="form-group">                  
                <?php echo $this->Form->control("name",['label'=>false,'id'=>'name', 'class'=>'form-control form-control-lg','placeholder'=>'Name','required'=>false]); ?>
                <span id="uname"></span>

                </div>
                <div class="form-group">                
                  <?php echo $this->Form->control("email",['label'=>false,'id'=>'email', 'class'=>'form-control form-control-lg','placeholder'=>'Email','required'=>false]); ?>                  
                  <span id="uemail"></span>

                </div>
                <div class="form-group">                  
                <?php echo $this->Form->control("phone",['label'=>false,'id'=>'phone', 'class'=>'form-control form-control-lg','placeholder'=>'Phone','required'=>false]); ?>
                <span id="uphone"></span>
                </div>
                <div class="form-group">                  
                  <?php echo $this->Form->control("address",['label'=>false,'id'=>'address', 'class'=>'form-control form-control-lg','placeholder'=>'Address','required'=>false]); ?>                  
                  <span id="uaddress"></span>
                </div>

                <div class="mt-3">
                  <!-- <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="../../index.html">SIGN UP</a> -->
                  <?= $this->Form->button(__('Submit'),['class'=>'btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn','id'=>'submit']) ?>

                </div>
               
                <?= $this->Form->end() ?> 
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    <!-- page-body-wrapper ends -->
         </div>     

              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->



  