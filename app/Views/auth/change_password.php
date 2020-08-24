<div class="login">
    <p> <code> <?= config\Services::validation()->listErrors(); ?></code></p>
    <div class="container">
        <h3 class="animated wow zoomIn" data-wow-delay=".5s">Change Passsword <?php echo session()->get('email'); ?></h3>
        <div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
            <form action="<?= base_url('auth/change_password'); ?>" method="post">
                <input type="hidden" value="<?php echo session()->get('email'); ?>" name="email">
                <input type="password" name="password" placeholder="new password" id="password">
                <input type="password" name="confirm_password" placeholder="confirm password" id="password">
                <input type="submit" value="change Password" name="submit">
                <!-- <button type="submit" name="submit">Change Password</button> -->
            </form>
        </div>
    </div>
</div>