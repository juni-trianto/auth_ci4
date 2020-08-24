<div class="container pt-3">
  <div class="row">
    <div class="col-md-7 col-sm-12 mx-auto">
      <div class="card pt-4">
        <div class="card-body">
          <div class="text-center mb-5">
            <img src="<?= base_url('assets/image/download.png') ?>" height="48" class='mb-4'>
            <h3>Sign Up</h3>
            <p><code> <?= config\Services::validation()->listErrors(); ?></code></p>
          </div>
          <form action="<?= base_url('auth/register_') ?>" method="post">
            <div class="row">
              <div class="col-md-6 col-12">
                <div class="form-group">
                  <label for="first-name-column">First Name</label>
                  <input type="text" value="<?= set_value('first_name') ?>" name="first_name" id="first-name-column" class="form-control">
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="form-group">
                  <label for="last-name-column">Last Name</label>
                  <input type="text" id="last-name-column" class="form-control" value="<?= set_value('last_name') ?>" name="last_name">
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="form-group">
                  <label for="company-column">Gender</label>
                  <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                    <option value="">--</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="form-group">
                  <label for="username-column">Email</label>
                  <input type="email" id="username-column" class="form-control" value="<?= set_value('email') ?>" name="email">
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="form-group">
                  <label for="country-floating">Password</label>
                  <input type="password" id="country-floating" class="form-control" navalue="<?= set_value('password') ?>" name="password">
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="form-group">
                  <label for="company-column">Confirm Password</label>
                  <input type="password" id="company-column" class="form-control" value="<?= set_value('confirm_password') ?>" name="confirm_password">
                </div>
              </div>

            </diV>

            <a href="<?= base_url('auth/login'); ?>">Have an account? Login</a>
            <div class="clearfix">
              <button class="btn btn-primary float-right" type="submit" name="submit">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>