
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<body>
  <h1>Login</h1>
  <?php if (isset($_SESSION['error_message'])): ?>
    <div class="error-message">
      <?php echo $_SESSION['error_message']; ?>
      <?php unset($_SESSION['error_message']); // Clear error message after display ?>
    </div>
  <?php endif; ?>
  <form action="../Controllers/login.php" method="post">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>
    <button type="submit">Login</button>
  </form>
  <p>Don't have an account? <a href="../Views/register.php">Register Here</a></p>
</body>
</html>
