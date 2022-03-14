<?php require viewsPath('partials/header'); ?>

    <div class="container-fluid border col-lg-5 col-md-6 mt-5 mb-5 p-4">
        <form action="" method="POST">
            <h4 style="text-align:center"><i class="fa fa-user"></i> User Signup</h4>
            <div style="text-align:center"><?=esc(APP_NAME)?></div>
            <br>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1" autofocus>Username</span>
                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Email</span>
                <input type="email" class="form-control" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Password</span>
                <input type="password" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Confirm Password</span>
                <input type="password" class="form-control" placeholder="Confirm Password" aria-label="Username" aria-describedby="basic-addon1">
            </div>

            <!-- <br> -->
            <button class="btn btn-danger">Cancel</button>
            <button class="btn btn-primary float-end">Signup</button>
        </form>
    </div>


<?php require viewsPath('partials/footer'); ?>