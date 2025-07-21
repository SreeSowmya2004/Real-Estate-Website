<?php
include("db_connect.php");
include("session.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $name = $_POST['name'];
   $email = $_POST['email'];
   $pass = $_POST['pass'];
   $c_pass = $_POST['c_pass'];

   if ($pass !== $c_pass) {
      $error = "Passwords do not match!";
   } else {
      $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);
      $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
      $stmt->bind_param("sss", $name, $email, $hashed_pass);
      if ($stmt->execute()) {
         header("Location: login.php");
         exit();
      } else {
         $error = "Email already exists!";
      }
   }
}
include("header.php");
?>
<section class="form-container">
   <form method="post">
      <h3>Register</h3>
      <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
      <input type="text" name="name" required placeholder="Your Name" class="box">
      <input type="email" name="email" required placeholder="Your Email" class="box">
      <input type="password" name="pass" required placeholder="Password" class="box">
      <input type="password" name="c_pass" required placeholder="Confirm Password" class="box">
      <input type="submit" value="Register" class="btn">
   </form>
</section>
<?php include("footer.php"); ?>
