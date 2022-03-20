<?php require viewsPath('partials/header'); ?>

    <div class="container-fluid border col-lg-5 col-md-6 mt-5 mb-5 p-4 shadow-sm">
        <form action="" method="POST">
            <h4 style="text-align:center"><i class="fa fa-user"></i></h4>
            <h3 style="text-align:center">Login</h3>
            <div style="text-align:center"><?=esc(APP_NAME)?></div>
            <br>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1" autofocus>Email</span>
                <input type="text" value="<?= set_value('email') ?>" name="email" class="form-control <?= !empty($errors['email']) ? 'border-danger':''?>" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1">
                <?php if(!empty($errors['email'])): ?>
                    <small class="text-danger col-12"><?= $errors['email'] ?></small>
                <?php endif; ?>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Password</span>
                <input type="password" value="<?= set_value('password') ?>" name="password" class="form-control <?= !empty($errors['email']) ? 'border-danger':''?>" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1">
                <?php if(!empty($errors['password'])): ?>
                    <small class="text-danger col-12"><?= $errors['password'] ?></small>
                <?php endif; ?>
            </div>

            <div class="row">
                <button class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>


<?php require viewsPath('partials/footer'); ?>