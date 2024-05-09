<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Logout</title>
</head>
<body>
  <h1>Logout Confirmation</h1>
  <p>Are you sure you want to log out?</p>
  <form action="../home.php" method="post">
    <button type="submit">Yes, Logout</button>
    <a href="index.php">Cancel</a>
  </form>

  <?php
  // Assuming the logout function is still in logout.php
  // No need to create a new connection or call logout function here (handled by controller)
  ?>

  <?php if (isset($_SESSION['message'])): ?>
    <p><?php echo $_SESSION['message']; ?></p>
    <?php unset($_SESSION['message']); ?>
  <?php endif; ?>

</body>
</html>
