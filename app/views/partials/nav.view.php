    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5 px-5 py-3" style="box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2); position:sticky; top:0; z-index:1000">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php?pg=home"><?=esc(APP_NAME)?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?pg=admin">Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?pg=login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?pg=signup">Signup</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Hi, <?=auth('username') ?>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="index.php?pg=profile">Profile</a></li>
                    <li><a class="dropdown-item" href="index.php?pg=profile-settings">Profile settings</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="index.php?pg=logout">Logout</a></li>
                </ul>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            </div>
        </div>
    </nav>