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
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">nama : <b><?= $user['first_name'] . ' ' . $user['last_name']; ?></b></li>
                    <li class="list-group-item">Gender : <b><?= $user['jenis_kelamin']; ?></b></li>
                    <li class="list-group-item">Phone : <?= $user['phone']; ?></li>
                    <li class="list-group-item">Alamat Lengkap: <b><?= $user['alamat_lengkap']; ?></b> </li>
                    <li class="list-group-item">Alamat = Provinsi : <b><?= $user['provinsi']; ?></b> | Kota : <b><?= $user['kota']; ?></b> | Kecamatan : <b><?= $user['kecamatan']; ?></b></li>
                    <li class="list-group-item">Desa : <b><?= $user['desa']; ?></b> | Rw : <b><?= $user['rw']; ?></b> | Rt : <b><?= $user['rt']; ?></b></li>
                    <li class="list-group-item">Vestibulum at eros</li>
                </ul>
            </div>

        </div>
    </div>
</div>