<?php
include("db_connect.php");
include("session.php");

if (!isset($_GET['id'])) {
   echo "Property not specified.";
   exit();
}

$property_id = $_GET['id'];

// Fetch property details
$stmt = $conn->prepare("SELECT properties.*, users.name AS owner FROM properties JOIN users ON properties.user_id = users.id WHERE properties.id = ?");
$stmt->bind_param("i", $property_id);
$stmt->execute();
$result = $stmt->get_result();
$property = $result->fetch_assoc();

if (!$property) {
   echo "Property not found.";
   exit();
}

// Fetch property images
$img_stmt = $conn->prepare("SELECT image FROM property_images WHERE property_id = ?");
$img_stmt->bind_param("i", $property_id);
$img_stmt->execute();
$images = $img_stmt->get_result();

include("header.php");
?>

<style>
.view-property .thumb {
   display: flex;
   flex-direction: column;
   align-items: center;
   margin-bottom: 20px;
}
.view-property .thumb .big-image img {
   width: 100%;
   max-width: 600px;
   height: auto;
   border-radius: 8px;
   margin-bottom: 15px;
}
.view-property .thumb .small-images {
   display: flex;
   flex-wrap: wrap;
   justify-content: center;
   gap: 10px;
}
.view-property .thumb .small-images img {
   width: 100px;
   height: 70px;
   object-fit: cover;
   border-radius: 5px;
   cursor: pointer;
   border: 2px solid transparent;
   transition: border 0.2s;
}
.view-property .thumb .small-images img:hover {
   border: 2px solid #333;
}
</style>

<section class="view-property">
   <div class="details">
      <h2 class="name"><?= htmlspecialchars($property['title']) ?></h2>
      <p class="location"><i class="fas fa-map-marker-alt"></i> <?= htmlspecialchars($property['location']) ?></p>
      <p><strong>₹<?= number_format($property['price']) ?></strong> | <?= htmlspecialchars($property['type']) ?></p>
      <p><i>Posted by:</i> <?= htmlspecialchars($property['owner']) ?></p>

      <?php if ($images->num_rows > 0): ?>
         <div class="thumb">
            <?php $first = $images->fetch_assoc(); ?>
            <div class="big-image">
               <img id="mainImage" src="uploads/<?= $first['image'] ?>" alt="Main Image">
            </div>
            <div class="small-images">
               <img src="uploads/<?= $first['image'] ?>" onclick="switchImage(this)">
               <?php while ($img = $images->fetch_assoc()): ?>
                  <img src="uploads/<?= $img['image'] ?>" onclick="switchImage(this)">
               <?php endwhile; ?>
            </div>
         </div>
      <?php else: ?>
         <p><i>No images uploaded for this property.</i></p>
      <?php endif; ?>

      <h4>Description</h4>
      <p><?= nl2br(htmlspecialchars($property['description'])) ?></p>
   </div>
</section>

<script>
function switchImage(img) {
   document.getElementById('mainImage').src = img.src;
}
</script>

<?php include("footer.php"); ?>
