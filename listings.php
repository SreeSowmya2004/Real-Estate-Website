<?php
include("db_connect.php");
include("session.php");
include("header.php");

// Get latest 10 properties with 1 image each
$sql = "SELECT p.*, (SELECT image FROM property_images WHERE property_id = p.id LIMIT 1) AS image 
        FROM properties p ORDER BY created_at DESC LIMIT 10";
$result = $conn->query($sql);
?>

<section class="listings">
   <h2>All Property Listings</h2>

   <div class="box-container" style="display: flex; flex-wrap: wrap; gap: 20px;">
      <?php while ($row = $result->fetch_assoc()): ?>
         <div class="box" style="border: 1px solid #ccc; padding: 15px; width: 300px; border-radius: 8px;">
            <?php if ($row['image']): ?>
               <img src="uploads/<?= $row['image'] ?>" alt="Property Image" style="width: 100%; height: 200px; object-fit: cover; border-radius: 5px;">
            <?php else: ?>
               <div style="width: 100%; height: 200px; background: #f2f2f2; display: flex; align-items: center; justify-content: center;">No Image</div>
            <?php endif; ?>
            <h3 style="margin: 10px 0;"><?= htmlspecialchars($row['title']) ?></h3>
            <p><i class="fas fa-map-marker-alt"></i> <?= htmlspecialchars($row['location']) ?></p>
            <p><strong>₹<?= number_format($row['price']) ?></strong></p>
            <a href="view_property.php?id=<?= $row['id'] ?>" class="btn">View Details</a>
         </div>
      <?php endwhile; ?>
   </div>
</section>

<?php include("footer.php"); ?>
