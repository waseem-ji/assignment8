<?php

if(isset($_GET['id'])) {
    // dd($_GET['id']);
    deletePost($_GET['id']);
    header("location: /profile");
}