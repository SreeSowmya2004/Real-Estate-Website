<?php
session_start();

function isLoggedIn() {
   return isset($_SESSION['user_id']);
}

function isAdmin() {
   return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}
?>
