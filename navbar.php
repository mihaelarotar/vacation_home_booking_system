<?php
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true){
    include "navbar_private.php";
}

else {
    include "navbar_public.php";
}
