<div class="container pt-3">
  <div class="row">
    <div class="col-md-5 col-sm-12 mx-auto">
      <div class="card pt-4">
        <div class="card-body">
          <div class="text-center mb-5">
            <img src="<?= base_url('assets/image/download.png') ?>" height="48" class='mb-4'>
            <h3>Sign In <?php echo session()->get('email'); ?></h3>
            <p> <code> <?= config\Services::validation()->listErrors(); ?></code></p>
          </div>
          <form action="<?= base_url('Auth/login_') ?>" method="post">
            <div class="form-group position-relative has-icon-left">
              <label for="username">Username</label>
              <div class="position-relative">
                <input type="email" name="email" value="<?= set_value('email'); ?>" autocomplete="off" class="form-control" id="username">
                <div class="form-control-icon">
                  <i data-feather="user"></i>
                </div>
              </div>
            </div>
            <div class="form-group position-relative has-icon-left">
              <div class="clearfix">
                <label for="password">Password</label>
                <a href="<?= base_url('auth/lupa_password'); ?>" class='float-right'>
                  <small>Forgot password?</small>
                </a>
              </div>
              <div class="position-relative">
                <input type="password" name="password" autocomplete="off" class="form-control" id="password">
                <div class="form-control-icon">
                  <i data-feather="lock"></i>
                </div>
              </div>
            </div>
            <div class='form-check clearfix my-4'>
              <div class="checkbox float-left">
                <input type="checkbox" id="checkbox1" class='form-check-input'>
                <label for="checkbox1">Remember me</label>
              </div>
              <div class="float-right">
                <a href="<?= base_url('auth/register'); ?>">Don't have an account?</a>
              </div>
            </div>

            <div class="clearfix">
              <button class="btn btn-primary float-right" type="submit" name="submit">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>