<?php
include("db_connect.php");
include("session.php");

if (!isAdmin()) {
   header("Location: login.php");
   exit();
}

$users = $conn->query("SELECT * FROM users");
$properties = $conn->query("SELECT properties.*, users.name FROM properties JOIN users ON properties.user_id = users.id");

include("header.php");
?>

<section class="dashboard">
   <h2>Admin Panel</h2>

   <h3>Registered Users</h3>
   <table border="1" cellpadding="10">
      <tr><th>ID</th><th>Name</th><th>Email</th><th>Role</th><th>Joined</th></tr>
      <?php while($user = $users->fetch_assoc()): ?>
         <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['name'] ?></td>
            <td><?= $user['email'] ?></td>
            <td><?= $user['role'] ?></td>
            <td><?= $user['created_at'] ?></td>
         </tr>
      <?php endwhile; ?>
   </table>

   <h3>All Posted Properties</h3>
   <table border="1" cellpadding="10">
      <tr><th>ID</th><th>Title</th><th>Posted By</th><th>Location</th><th>Price</th><th>Type</th><th>Image</th></tr>
      <?php while($prop = $properties->fetch_assoc()): ?>
         <tr>
            <td><?= $prop['id'] ?></td>
            <td><?= $prop['title'] ?></td>
            <td><?= $prop['name'] ?></td>
            <td><?= $prop['location'] ?></td>
            <td><?= $prop['price'] ?></td>
            <td><?= $prop['type'] ?></td>
            <td><?php if ($prop['image']): ?><img src="uploads/<?= $prop['image'] ?>" width="100"><?php endif; ?></td>
         </tr>
      <?php endwhile; ?>
   </table>
</section>

<?php include("footer.php"); ?>
