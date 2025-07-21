<?php
include("db_connect.php");
include("session.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $email = $_POST['email'];
   $pass = $_POST['pass'];

   $stmt = $conn->prepare("SELECT id, name, password, role FROM users WHERE email = ?");
   $stmt->bind_param("s", $email);
   $stmt->execute();
   $stmt->store_result();

   if ($stmt->num_rows > 0) {
      $stmt->bind_result($id, $name, $hashed_pass, $role);
      $stmt->fetch();
      if (password_verify($pass, $hashed_pass)) {
         $_SESSION['user_id'] = $id;
         $_SESSION['name'] = $name;
         $_SESSION['role'] = $role;
         header("Location: dashboard.php");
         exit();
      } else {
         $error = "Incorrect password!";
      }
   } else {
      $error = "User not found!";
   }
}
include("header.php");
?>
<section class="form-container">
   <form method="post">
      <h3>Login</h3>
      <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
      <input type="email" name="email" required placeholder="Email" class="box">
      <input type="password" name="pass" required placeholder="Password" class="box">
      <input type="submit" value="Login" class="btn">
   </form>
</section>
<?php include("footer.php"); ?>
