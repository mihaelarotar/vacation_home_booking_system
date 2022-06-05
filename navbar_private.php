<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand me-4 fw-bold h-font" href="index.php">Vacation Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link" href="houses.php">See houses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="your_houses.php">Your houses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="your_reservations.php">Your Reservations</a>
                </li>



            </ul>
            <div class="d-flex">
                <a class="nav-link" href="account/logout.php">Log Out</a>
                <div class="nav-item dropdown">
                    <button type="button" id="dropdownMenuButton" class="btn btn-outline-success dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php
                        if(isset($_SESSION['name'])) {
                            $username = $_SESSION['name'];
                        } else {
                            die('Account');
                        }
                        echo $username;
                        ?></button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="account.php">Account settings</a>
                        <a class="dropdown-item" href="change_password.php">Change password</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item disabled" href="#">Delete account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>