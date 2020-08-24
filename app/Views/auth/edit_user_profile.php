<div class="login">
    <div class="container">
        <p class="est animated wow zoomIn" data-wow-delay=".5s">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
            deserunt mollit anim id est laborum.</p>
        <div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
            <img src="<?= base_url('assets'); ?>/images/icon.png" class="card-img-top img-fluid" width="200px" alt="singleminded">

            <div class="card-body">
                <h5 class="card-title">Be Single Minded</h5>
                <p class="card-text">
                </p>
            </div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item <?php if ($title == 'Profile User') : ?>active<?php endif; ?>">
                    <a href="<?= base_url('auth/profile'); ?>">Profil</a>
                </li>
                <li class="nav-item <?php if ($title == 'Edit User Profile') : ?>active<?php endif; ?>">
                    <a href="<?= base_url('auth/edit_user_profile'); ?>">Edit</a>
                </li>
            </ul>
            <div class="card">
                <form action="<?= base_url('auth/update_profile_user') ?>" method="post">
                    <label for="">First Name</label>
                    <input type="text" class="form-control" value="<?= $user['first_name']; ?>" name="first_name">
                    <label for="">Last Name</label>
                    <input type="text" class="form-control" value="<?= $user['last_name']; ?>" name="last_name">
                    <label for="">Email</label>
                    <input autocomplete="off" type="email" value="<?= $user['email'] ?>" name="email" readonly>
                    <label for="">Phone</label>
                    <input type="text" class="form-control" value="<?= $user['phone'] ?>" name="phone"> <br>
                    <label for="">Gender</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                        <option value="">--</option>
                        <option value="Laki-laki" <?php if ($user['jenis_kelamin'] == 'Laki-laki') : ?> selected <?php endif; ?>>Laki-laki</option>
                        <option value="Perempuan" <?php if ($user['jenis_kelamin'] == 'Perempuan') : ?> selected <?php endif; ?>>Perempuan</option>
                    </select><br>

                    <h6 class="animated wow slideInUp" data-wow-delay=".5s">Address information</h6>

                    <label for="">Alamat Lengkap</label>
                    <input type="text" class="form-control" value="<?= $user['alamat_lengkap']; ?>" name="alamat">
                    <label for="">Provinsi</label>
                    <select name="provinsi" id="provinsi" class="form-control">
                        <option value="">--</option>
                        <?php foreach ($provinsis['provinsi'] as $provinsi) : ?>
                            <option value="<?= $provinsi['id']; ?>" <?php if ($provinsi['id'] == $user['provinsi']) : ?> selected <?php endif; ?>><?= $provinsi['nama']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label for="">Kota</label>
                    <select name="kota" id="kota" required class="form-control">
                        <option value="">--</option>
                    </select>
                    <label for="">Kecamatan</label>
                    <select name="kecamatan" id="kecamatan" required class="form-control">
                        <option value="">--</option>
                    </select>
                    <label for="">Desa</label>
                    <select name="desa" id="desa" required class="form-control">
                        <option value="">--</option>
                    </select>
                    <label for="">Rt</label>
                    <input autocomplete="off" type="number" class="form-control" value="<?= $user['rt'] ?>" name="rt">
                    <label for="">Rw</label>
                    <input autocomplete="off" type="number" class="form-control" value="<?= $user['rw'] ?>" name="rw">




                    <input type="submit" value="Update" name="submit">
                </form>
            </div>

        </div>
    </div>
</div>