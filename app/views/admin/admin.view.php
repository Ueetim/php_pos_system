<?php require viewsPath("partials/header"); ?>

<h4 class="p-2" style="text-align:center"><i class="fas fa-user-shield    "></i> Admin</h4>

<div style="color:#444">    
    <div class="container-fluid row">
        <div class="col-12 col-sm-4 col-md-3 col-lg-2">
            <ul class="list-group">
                <a href="index.php?pg=admin&tab=dashboard">
                    <li class="list-group-item <?=!$tab || $tab=='dashboard' ?'active':''?>"><i class="fas fa-th-large    "></i> Dashboard</li>
                </a>
                <a href="index.php?pg=admin&tab=users">
                    <li class="list-group-item <?=$tab=='users'?'active':''?>"><i class="fas fa-users"></i> Users</li>
                </a>
                <a href="index.php?pg=admin&tab=products">
                    <li class="list-group-item <?=$tab=='products'?'active':''?>"><i class="fas fa-burger"></i> Products</li>
                </a>
                <a href="index.php?pg=logout">
                    <li class="list-group-item <?=$tab=='logout'?'active':''?>"><i class="fas fa-sign-out-alt"></i> Logout</li>
                </a>
            </ul>
        </div>
        <div class="border col p-3">
            <h4><?=strtoupper($tab)?></h4>
        </div>
    </div>
</div>

<?php require viewsPath("partials/footer"); ?>