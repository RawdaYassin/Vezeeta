<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Provide Feedback</title>
</head>
<body>
  <h1>Provide Feedback</h1>

  <?php if (isset($_SESSION['message'])): ?>
    <p><?php echo $_SESSION['message']; ?></p>
    <?php unset($_SESSION['message']); ?>
  <?php endif; ?>

  <form action="feedback.php" method="post">
    <label for="rating">Rating:</label>
    <select id="rating" name="rating" required>
      <option value="">Select Rating</option>
      <option value="1">1 Star</option>
      <option value="2">2 Stars</option>
      <option value="3">3 Stars</option>
      <option value="4">4 Stars</option>
      <option value="5">5 Stars</option>
    </select><br><br>

    <label for="comment">Comment:</label>
    <textarea id="comment" name="comment" rows="5" cols="30"></textarea><br><br>

    <?php
    // Assuming clinic and doctor information is retrieved and stored in variables
    if (isset($clinics) && !empty($clinics)) {
      echo '<label for="clinicId">Clinic:</label>';
      echo '<select id="clinicId" name="clinicId">';
      foreach ($clinics as $clinic) {
        echo '<option value="' . $clinic['clinic_id'] . '">' . $clinic['clinic_name'] . '</option>';
      }
      echo '</select><br><br>';
    }

    if (isset($doctors) && !empty($doctors)) {
      echo '<label for="doctorId">Doctor (Optional):</label>';
      echo '<select id="doctorId" name="doctorId">';
      echo '<option value="">Select Doctor (Optional)</option>';
      foreach ($doctors as $doctor) {
        echo '<option value="' . $doctor['doctor_id'] . '">' . $doctor['doctor_name'] . '</option>';
      }
      echo '</select><br><br>';
    }
    ?>

    <button type="submit">Submit Feedback</button>
  </form>
</body>
</html>
