<?php
include("db_connect.php");
include("session.php");

if (!isLoggedIn()) {
   header("Location: login.php");
   exit();
}

$uid = $_SESSION['user_id'];
$query = $conn->prepare("
   SELECT properties.title, properties.location, properties.price, properties.type 
   FROM saved_properties
   JOIN properties ON saved_properties.property_id = properties.id
   WHERE saved_properties.user_id = ?
");
$query->bind_param("i", $uid);
$query->execute();
$result = $query->get_result();

include("header.php");
?>
<section class="listings">
   <h2>Your Saved Properties</h2>
   <?php while ($row = $result->fetch_assoc()): ?>
      <div class="box">
         <h3><?= $row['title'] ?></h3>
         <p><?= $row['location'] ?></p>
         <p>₹<?= $row['price'] ?> | <?= $row['type'] ?></p>
      </div>
   <?php endwhile; ?>
</section>
<?php include("footer.php"); ?>
