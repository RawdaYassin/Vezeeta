<?php
require_once('../Models/user.php'); // Assuming User class is in Models directory
 $db = new databaseConnection();
  $connection = $db->getConnection();
  // Create a new User object
  $user = new User($connection);
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Account</title>
</head>
<body>
    <form method="post" action="../Controllers/manageAccount.php">
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" value="<?php echo $user->getFirstName(); ?>"><br><br>
        
        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" value="<?php echo $user->getLastName(); ?>"><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $user->getEmail(); ?>"><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br><br>

        <label for="phoneNumber">Phone Number:</label>
        <input type="text" id="phoneNumber" name="phoneNumber" value="<?php echo $user->getPhoneNumber(); ?>"><br><br>
        
        <input type="submit" name="update" value="Update">
        <input type="submit" name="delete" value="Delete">
    </form>
</body>
</html>
