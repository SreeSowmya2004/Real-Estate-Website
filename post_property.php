<?php
include("db_connect.php");
include("session.php");

if (!isLoggedIn()) {
   header("Location: login.php");
   exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $title = $_POST['title'];
   $location = $_POST['location'];
   $price = $_POST['price'];
   $type = $_POST['type'];
   $desc = $_POST['description'];
   $uid = $_SESSION['user_id'];
   $image_name = null;

   if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
      $image_name = time() . "_" . basename($_FILES["image"]["name"]);
      $target = "uploads/" . $image_name;
      move_uploaded_file($_FILES["image"]["tmp_name"], $target);
   }

   $stmt = $conn->prepare("INSERT INTO properties (user_id, title, location, price, type, description, image) VALUES (?, ?, ?, ?, ?, ?, ?)");
   $stmt->bind_param("ississs", $uid, $title, $location, $price, $type, $desc, $image_name);
   $stmt->execute();
   $msg = "Property posted successfully!";
}
include("header.php");
?>
<section class="form-container">
   <form method="post" enctype="multipart/form-data">
      <h3>Post Property</h3>
      <?php if (isset($msg)) echo "<p style='color:green;'>$msg</p>"; ?>
      <input type="text" name="title" required placeholder="Title" class="box">
      <input type="text" name="location" required placeholder="Location" class="box">
      <input type="number" name="price" required placeholder="Price" class="box">
      <select name="type" required class="box">
         <option value="">Select Type</option>
         <option value="Apartment">Apartment</option>
         <option value="Villa">Villa</option>
         <option value="Plot">Plot</option>
         <option value="Commercial">Commercial</option>
      </select>
      <textarea name="description" rows="4" class="box" placeholder="Description"></textarea>
      <input type="file" name="image" accept="image/*" class="box">
      <input type="submit" value="Submit Property" class="btn">
   </form>
</section>
<?php include("footer.php"); ?>
