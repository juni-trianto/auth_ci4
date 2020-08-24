<div class="container pt-3">
    <div class="row">
        <div class="col-md-5 col-sm-12 mx-auto">
            <div class="card py-4">
                <div class="card-body">
                    <div class="text-center mb-5">
                        <img src="<?= base_url('assets/image/download.png') ?>" height="48" class='mb-4'>
                        <h3>Forgot Password</h3>
                        <p> <code> <?= config\Services::validation()->listErrors(); ?></code></p>
                    </div>
                    <form action="<?= base_url('auth/send_email_lupaPassword') ?>" method="post">
                        <div class="form-group">
                            <label for="first-name-column">Email</label>
                            <input type="email" name="email" placeholder="Masukan Email Anda" autocomplete="off" class="form-control">
                        </div><br>
                        <div class="clearfix">
                            <input type="submit" value="Send" name="submit" class="btn btn-primary float-right m-1">
                            <a href="<?= base_url('auth/login'); ?>" class="btn btn-secondary float-right m-1">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>