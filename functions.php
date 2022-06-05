<?php
function check(){
    if((! isset($_SESSION['logged_in'])) && $_SESSION['logged_in']!=true)
        header("location:account/login.html");
}