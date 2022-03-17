<?php require viewsPath('partials/header'); ?>

    <div class="container-fluid border col-lg-5 col-md-6 mt-5 mb-5 p-4">
        <form action="" method="POST">
            <h4 style="text-align:center"><i class="fa fa-user"></i> User Signup</h4>
            <div style="text-align:center"><?=esc(APP_NAME)?></div>
            <br>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1" autofocus>Username</span>
                <input value="<?= set_value('username') ?>" type="text" class="form-control <?= !empty($errors['username']) ? 'border-danger':''?>" name="username" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                <?php if(!empty($errors['username'])): ?>
                    <small class="text-danger col-12"><?= $errors['username'] ?></small>
                <?php endif; ?>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Email</span>
                <input value="<?= set_value('email') ?>" type="email" class="form-control <?= !empty($errors['email']) ? 'border-danger':''?>" name="email" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1">
                <?php if(!empty($errors['email'])): ?>
                    <small class="text-danger col-12"><?= $errors['email'] ?></small>
                <?php endif; ?>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Password</span>
                <input value="<?= set_value('password') ?>" type="password" class="form-control <?= !empty($errors['password']) ? 'border-danger':''?>" name="password" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1">
                <?php if(!empty($errors['password'])): ?>
                    <small class="text-danger col-12"><?= $errors['password'] ?></small>
                <?php endif; ?>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Confirm Password</span>
                <input value="<?= set_value('confirm_password') ?>" type="password" name="confirm_password" class="form-control <?= !empty($errors['confirm_password']) ? 'border-danger':''?>" placeholder="Confirm Password" aria-label="Username" aria-describedby="basic-addon1">
                <?php if(!empty($errors['confirm_password'])): ?>
                    <small class="text-danger col-12"><?= $errors['confirm_password'] ?></small>
                <?php endif; ?>
            </div>

            <!-- <br> -->
            <button class="btn btn-danger">Cancel</button>
            <button class="btn btn-primary float-end">Signup</button>
        </form>
    </div>


<?php require viewsPath('partials/footer'); ?>