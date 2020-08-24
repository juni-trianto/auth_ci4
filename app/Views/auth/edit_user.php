
<div class="login">
    <p> <code> <?= config\Services::validation()->listErrors(); ?></code></p>
    <div class="container">
        <h3 class="animated wow zoomIn" data-wow-delay=".5s"><?php echo session()->get('group'); ?></h3>
        <div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
            <div class="row">
                <div class="col-6">
                    <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#large">
                        Add Group
                    </button>
                </div>
                <div class="col-6">
                    <h2>Detail User <?= $user['first_name']; ?></h2>
                </div>
            </div><br><br>
            <form class="form form-vertical" method="post" action="<?= base_url('auth/change_user_id'); ?>">
                <input type="hidden" name="id" value="<?= $user['id_user']; ?>">
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="first-name-vertical">First Name</label>
                                <input type="text" id="first-name-vertical" class="form-control" readonly value="<?= $user['first_name']; ?>" name="first_name">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="email-id-vertical">Last Name</label>
                                <input type="text" id="email-id-vertical" class="form-control" readonly name="last_name" value="<?= $user['last_name']; ?>">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="email-id-vertical">Gender</label>
                                <input type="text" id="email-id-vertical" class="form-control" readonly name="last_name" value="<?= $user['jenis_kelamin']; ?>">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="contact-info-vertical">Email</label>
                                <input type="text" id="contact-info-vertical" class="form-control" readonly name="email" value="<?= $user['email']; ?>">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="password-vertical">Phone</label>
                                <input type="text" id="password-vertical" class="form-control" readonly name="phone" value="<?= $user['phone'] ?>">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="password-vertical">Provinsi</label>
                                <input type="text" id="password-vertical" class="form-control" name="provinsi" value="<?= $user['provinsi'] ?>" readonly>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="password-vertical">Kota / Kab</label>
                                <input type="text" id="password-vertical" class="form-control" name="kota" value="<?= $user['kota'] ?>" readonly>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="password-vertical">Kecamatan</label>
                                <input type="text" id="password-vertical" class="form-control" name="kecamatan" value="<?= $user['kecamatan'] ?>" readonly>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="password-vertical">Desa</label>
                                <input type="text" id="password-vertical" class="form-control" name="kecamatan" value="<?= $user['desa'] ?>" readonly>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="password-vertical">Rt</label>
                                <input type="text" id="password-vertical" class="form-control" name="rw" value="<?= $user['rw'] ?>" readonly>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="password-vertical">Rw</label>
                                <input type="text" id="password-vertical" class="form-control" name="rt" value="<?= $user['rt'] ?>" readonly>
                            </div>
                        </div>
                        <?php foreach ($groups as $group) : ?>
                            <div class="col-3">
                                <input type="radio" <?php if ($group['id_group'] == $user['group_id']) : ?> checked <?php endif; ?> class="form-check-input form-check-primary form-check-glow" name="group" value="<?= $group['id_group']; ?>" id="customColorCheck1">
                                <label class="form-check-label" for="customColorCheck1"><?= $group['name']; ?></label>
                            </div>
                        <?php endforeach; ?><br><br>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary mr-1 mb-1">Simpan</button>
                            <a href="<?= base_url('Auth'); ?>" class="btn btn-light-secondary mr-1 mb-1">Back</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<!--large size Modal -->
<div class="modal fade text-left" id="large" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <form class="form form-vertical" method="post" action="<?= base_url('auth/add_group'); ?>">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17">Add Group</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="id" value="<?= $user['id_user'] ?>">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Nama Groups</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" id="first-name" class="form-control" autocomplete="off" name="nama_group" placeholder="Nama Group">
                        </div>
                        <div class="col-md-4">
                            <label>Description</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" id="first-name" class="form-control" autocomplete="off" name="description" placeholder="Description">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="submit" class="btn btn-primary ml-1" name="submit">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>