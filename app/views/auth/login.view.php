<?php require viewsPath('partials/header'); ?>

    <div class="container-fluid border col-lg-5 col-md-6 mt-5 mb-5 p-4 shadow-sm">
        <form action="" method="POST">
            <h4 style="text-align:center"><i class="fa fa-user"></i></h4>
            <h3 style="text-align:center">Login</h3>
            <div style="text-align:center"><?=esc(APP_NAME)?></div>
            <br>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1" autofocus>Email</span>
                <input type="text" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Password</span>
                <input type="password" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1">
            </div>

            <div class="row">
                <button class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>


<?php require viewsPath('partials/footer'); ?>