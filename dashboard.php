<?php
include("db_connect.php");
include("session.php");

if (!isLoggedIn()) {
   header("Location: login.php");
   exit();
}
include("header.php");
?>
<section class="dashboard">
   <h2>Welcome, <?php echo $_SESSION['name']; ?>!</h2>
   <?php if (isAdmin()): ?>
      <p>You are logged in as <b>Admin</b></p>
   <?php else: ?>
      <p>You are logged in as <b>User</b></p>
   <?php endif; ?>
</section>
<?php include("footer.php"); ?>
