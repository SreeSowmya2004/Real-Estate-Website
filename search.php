<?php
include("db_connect.php");
include("session.php");

$location = isset($_POST['location']) ? $_POST['location'] : '';
$type = isset($_POST['type']) ? $_POST['type'] : '';
$min_price = isset($_POST['min_price']) ? $_POST['min_price'] : 0;
$max_price = isset($_POST['max_price']) ? $_POST['max_price'] : 1000000000; // Some large number for the max price

// SQL Query to filter properties
$sql = "SELECT p.*, (SELECT image FROM property_images WHERE property_id = p.id LIMIT 1) AS image 
        FROM properties p WHERE location LIKE ? AND type LIKE ? AND price BETWEEN ? AND ? 
        ORDER BY created_at DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssii", $location, $type, $min_price, $max_price);
$stmt->execute();
$result = $stmt->get_result();

include("header.php");
?>

<section class="filters" style="padding-bottom: 0;">
   <h3>Filter your search</h3>
   <form method="post">
      <div style="display: flex; gap: 10px;">
         <input type="text" name="location" value="<?= htmlspecialchars($location) ?>" placeholder="Location" class="box">
         <select name="type" class="box">
            <option value="">Property Type</option>
            <option value="Apartment" <?= $type == 'Apartment' ? 'selected' : '' ?>>Apartment</option>
            <option value="Villa" <?= $type == 'Villa' ? 'selected' : '' ?>>Villa</option>
            <option value="Plot" <?= $type == 'Plot' ? 'selected' : '' ?>>Plot</option>
            <option value="Commercial" <?= $type == 'Commercial' ? 'selected' : '' ?>>Commercial</option>
         </select>
         <input type="number" name="min_price" value="<?= htmlspecialchars($min_price) ?>" placeholder="Min Price" class="box">
         <input type="number" name="max_price" value="<?= htmlspecialchars($max_price) ?>" placeholder="Max Price" class="box">
         <input type="submit" value="Search" class="btn">
      </div>
   </form>
</section>

<section class="listings">
   <h2>Search Results</h2>

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
