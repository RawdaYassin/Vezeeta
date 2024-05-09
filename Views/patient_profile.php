

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Profile Data</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css2/style.css">
    <link rel="stylesheet" type="text/css" href="../css/home.css">
	
<style>

.card-body {
    padding: 20px;
}

.card-title {
    font-size: 1.25rem;
    margin-bottom: 10px;
}

.search-form {
    max-width: 100%;
}

.form-group {
    margin-bottom: 15px;
}

.form-control {
    width: 100%;
}

.btn-primary {
    width: 100%;
}


.topav {
  overflow: hidden;
  background-color: #e9e9e9;
}

.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #2196F3;
  color: white;
}

.topnav input[type=text] {
  float: right;
  padding: 6px;
  margin-top: 8px;
  margin-right: 16px;
  border: none;
  font-size: 17px;
}

@media screen and (max-width: 600px) {
  .topnav a, .topnav input[type=text] {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }
}
</style>


</head>
<body>
	<section class="py-5 my-5">
		<div class="container">
		<h1 class="mb-5">Patient Profile</h1>
			<div class="bg-white shadow rounded-lg d-block d-sm-flex">
				<div class="profile-tab-nav border-right">
					<div class="p-4">
						<div class="container">
							<input type="file" id="file" accept="image/*" hidden>
							<div class="img-area" data-img="">
								<i class='bx bxs-cloud-upload icon'></i>
								
								<h6><span>Upload Image</span></h6>
							</div>
							<button class="select-image" >Select Image</button>
</div>
						<h4 class="text-center"><?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name'] ?>
          				</h4>
					</div>
					
         <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
                            <i class="fa fa-home text-center mr-1"></i> 
                            Account 
                        </a>
                        <a class="nav-link" id="accedit-tab" data-toggle="pill" href="#accountedit" role="tab" aria-controls="accedit" aria-selected="true">
                            <i class="fa fa-home text-center mr-1"></i> 
                            Account edit
                        </a>
                        <a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="true">
                            <i class="fa fa-key text-center mr-1"></i> 
                            Search Health Care Providers
                        </a>
                        <a class="nav-link" id="security-tab" data-toggle="pill" href="#security" role="tab" aria-controls="security" aria-selected="true">
                            <i class="fa fa-user text-center mr-1"></i> 
                            Appointment History
                        </a>
						<a class="nav-link" id="" data-toggle="" href="book_appointment.php"  aria-controls="book_appointment.php" aria-selected="true">
						<i class="fa fa-user text-center mr-1"></i> 
                           Appointment Booking	
					</a>
					<a class="nav-link" id="notification-tab" data-toggle="pill" href="#notification" role="tab" aria-controls="notification" aria-selected="true">
						<i class="fa fa-user text-center mr-1"></i> 
                           Payment	
					</a>
                        <a class="nav-link" id="application-tab" data-toggle="pill" href="#application" role="tab" aria-controls="application" aria-selected="true">
                            <i class="fa fa-user text-center mr-1"></i> 
                           Feedback
                        </a>
                    </div>
				</div>





				<div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
					<div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
						<h3 class="mb-4">Account Settings</h3>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Patient Name</label>
								  	<input type="text" class="form-control" value="<?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name'] ?>" >
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Date of Birth</label>
								  	<input type="text" class="form-control" value="<?php echo $_SESSION['dateOfBirth']?>" >
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Email</label>
								  	<input type="text" class="form-control" value="<?php echo $_SESSION['email'] ?>" >
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Password</label>
								  	<input type="text" class="form-control" value="<?php echo $_SESSION['password'] ?>" >
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Phone number</label>
								  	<input type="text" class="form-control" value="<?php echo $_SESSION['phone_number'] ?>" >
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Gender</label>
								  	<input type="text" class="form-control" value="<?php echo $_SESSION['gender'] ?>" >
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Medical record</label>
									  <form action="../Views/test.php" method="post">
    					<input type="submit" class="form-control"name="records" value="Medical Record">
								</form>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade " id="accountedit" role="tabpanel" aria-labelledby="accedit-tab">
						<h3 class="mb-4">Account edit data</h3>
						<form action="../Controllers/manage_account.php" method="post" class="d-inline">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Firs Name</label>
								  	<input type="text" class="form-control"  name ="first_name" value="<?php echo isset($_SESSION['first_name']) ? $_SESSION['first_name']  : '' ?>" >
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Lats Name</label>
								  	<input type="text" class="form-control"  name ="last_name" value="<?php echo isset($_SESSION['last_name']) ? $_SESSION['last_name'] : '' ?>" >
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Date of Birth</label>
								  	<input type="text" class="form-control" name ="date_of_birth" value="<?php echo isset($_SESSION['dateOfBirth']) ? $_SESSION['dateOfBirth'] : '' ?>" >
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Email</label>
								  	<input type="text" class="form-control" name ="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : '' ?>" >
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Phone number</label>
								  	<input type="text" class="form-control" name ="phone_number" value="<?php echo isset($_SESSION['phone_number']) ? $_SESSION['phone_number'] : '' ?>" >
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Password</label>
								  	<input type="text" class="form-control" name ="password" value="<?php echo isset($_SESSION['password']) ? $_SESSION['password'] : '' ?>" >
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Gender</label>
								  	<input type="text" class="form-control" name ="gender" value="<?php echo isset($_SESSION['gender']) ? $_SESSION['gender'] : '' ?>" >
								</div>
							</div>

						
    <div class="col-md-6">
        <a href="home.html" class="btn btn-light" data-dismiss="modal">Back</a>
    </div>
    <div class="col-md-6">
            <button type="submit" name="update" class="btn btn-primary">Update Account</button>
            <button type="submit" name="delete" class="btn btn-primary">Delete Account</button>
			</div>
    </div>
	</form>
					</div>
								
					<div class="tab-pane fade  " id="password" role="tabpanel" aria-labelledby="password-tab">
						<h3 class="mb-4">Health Care providers Search</h3>
						<div class="row">
							<div class="col-md-6">
							<div class="card" style="width: 50rem;">
    <div class="card-body">
        <h5 class="card-title">Doctors Search</h5>
        <h6 class="card-subtitle mb-2 text-muted"></h6>
        <form action="../Controllers/search.php" method="POST" class="search-form">
            <div class="form-group">
                <input type="text" class="form-control" name="doctor_name" placeholder="Enter Doctor name">
            </div>
            <div class="form-group">
                <select class="form-control" name="country">
                    <option value="">All Countries</option>
                    <option value="Egypt">Egypt</option>
                    <option value="France">France</option>
                    <option value="England">England</option>
                    <option value="USA">USA</option>
                    <option value="UAE">UAE</option>
                    <option value="Spain">Spain</option>
                </select>
            </div>
			<div class="form-group">
                <select class="form-control" name="speciality">
                    <option value="">All Specialities</option>
                    <option value="Cardiology">Cardiology</option>
                    <option value="Orthopedics">Orthopedics</option>
                    <option value="Neurology">Neurology</option>
                    <option value="Pediatrics">Pediatrics</option>
                    <option value="Dermatology">Dermatology</option>
                    <option value="Dentistry">Dentistry</option>
					<option value="Internal Medicine">Internal Medicine</option>
                </select>
            </div>
            <button type="submit"  name="doctor_search" class="btn btn-primary">Search</button>
        </form>
    </div>
</div>

					</br></br>
			  
			  <div class="card" style="width: 50rem;">
			  <div class="card-body">
        <h5 class="card-title">Clinics Search</h5>
        <h6 class="card-subtitle mb-2 text-muted"></h6>
        <form action="../Controllers/search.php" method="POST" class="search-form">
            <div class="form-group">
                <input type="text" class="form-control" name="clinic_name" placeholder="Enter Clinic name">
            </div>

			<div class="form-group">
                <select class="form-control" name="speciality">
                    <option value="">All Specialities</option>
                    <option value="Cardiology">Cardiology</option>
                    <option value="Orthopedics">Orthopedics</option>
                    <option value="Neurology">Neurology</option>
                    <option value="Pediatrics">Pediatrics</option>
                    <option value="Dermatology">Dermatology</option>
                    <option value="Dentistry">Dentistry</option>
					<option value="Internal Medicine">Internal Medicine</option>
                </select>
            </div>
            <button type="submit" name="clinic_search" class="btn btn-primary">Search</button>
        </form>
    </div>
              </div>
								
							</div>
						</div>

						
					</div>

					
					<div class="tab-pane fade  " id="security" role="tabpanel" aria-labelledby="security-tab">
						<h3 class="mb-8">Appointment Table</h3>
						<div class="row">
							<div class="col-md-12">
							<table class="table table-hover" style="width: 50rem;">
    <thead>
        <tr>
            <th scope="col">Appointment ID</th>
            <th scope="col">Appointment Date/Time</th>
            <th scope="col">Doctor Name</th>
			<th scope="col">Clinic Name</th>
            <th scope="col">Appointment Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Start the session
       // session_start();

        // Include the database connection class
        require_once('../Models/databaseConnection.php');

        if(isset($_SESSION['patient_id'])) {
            // Get the patient ID from session
            $patient_id = $_SESSION['patient_id'];

            // Create a new instance of the database connection
            $db = new DatabaseConnection();
            $connection = $db->getConnection();

            // Prepare the SQL query with parameterized statement
            $stmt = $connection->prepare("SELECT * FROM Appointments WHERE patient_id = ?");
            
            // Execute the statement
            $stmt->execute([$patient_id]);

            // Fetch the result
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Check if there are rows returned
            if(count($result) > 0) {
				foreach($result as $row) {
					echo "<tr>";
					echo "<td>"."#".$row["appointment_id"]."</td>";
					echo "<td>".$row["appointment_date"]."</td>";
					// Fetch the doctor's name from the Doctor table
					$doctor_id = $row["doctor_id"];
					$stmt = $connection->prepare("SELECT first_name, last_name FROM Doctor WHERE doctor_id = ?");
					$stmt->execute([$doctor_id]);
					$doctor = $stmt->fetch(PDO::FETCH_ASSOC);
// Check if the doctor details are retrieved successfully
if (is_array($doctor) && !empty($doctor)) {
    // Access doctor details
    $doctor_name = $doctor["first_name"] . " " . $doctor["last_name"];
    // Other doctor details...
} else {
    // Handle the case when doctor details are not found
    $doctor_name = "Doctor details not found";
    // Other handling or error message...
}


					echo "<td>".$doctor_name."</td>";
					
					// Fetch the clinic's name from the Clinic table
					$clinic_id = $row["clinic_id"];
					$stmt = $connection->prepare("SELECT name FROM Clinic WHERE clinic_id = ?");
					$stmt->execute([$clinic_id]);
					$clinic = $stmt->fetch(PDO::FETCH_ASSOC);
		
// Check if clinic details are retrieved successfully
if (is_array($clinic) && !empty($clinic)) {
    // Access clinic details
    $clinic_name = $clinic["name"];
    // Other clinic details...
} else {
    // Handle the case when clinic details are not found
    $clinic_name = "Clinic details not found";
    // Other handling or error message...
}


					echo "<td>".$clinic_name."</td>";
			
					echo "<td>".$row["status"]."</td>";
					echo "</tr>";
				}
			} else {
				echo "<tr><td colspan='5'>No appointments found.</td></tr>";
			}
			
        } else {
            // Handle the case where $_SESSION['patient_id'] is not set
            echo "<tr><td colspan='5'>Patient ID is not set.</td></tr>";
        }
        ?>
    </tbody>
</table>

                    </div>
						</div>
					</div>
					<div class="tab-pane fade  " id="application" role="tabpanel" aria-labelledby="application-tab">
						<div class="row">
							<!--<div class="col-md-12">-->
								
								<?php 
								include_once('../Views/feedback.php')?>
							<!--</div>-->
						</div>
					</div>
					<div class="tab-pane fade  " id="notification" role="tabpanel" aria-labelledby="notification-tab">
					<div class="row">
							<div class="col-md-12">
								
								<?php 
								include_once('../Views/payment.php')?>
							</div>
						</div>
	</div>
					<!--<div class="tab-pane fade  " id="notification" role="tabpanel" aria-labelledby="notification-tab">
					<div class="row">
							<<div class="col-md-12">
								<?php 
						//include_once('../Controllers/book_appointment.php')?>
							</div>
						</div>
					</div>
					<div class="tab-pane fade  " id="notification" role="tabpanel" aria-labelledby="notification-tab">
						<h3 class="mb-4">Boob Appointment</h3>
						<div class="form-group">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="notification1">
								<label class="form-check-label" for="notification1">
									Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum accusantium accusamus, neque cupiditate quis
								</label>
							</div>
						</div>
						<div class="form-group">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="notification2" >
								<label class="form-check-label" for="notification2">
									hic nesciunt repellat perferendis voluptatum totam porro eligendi.
								</label>
							</div>
						</div>
						<div class="form-group">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="notification3" >
								<label class="form-check-label" for="notification3">
									commodi fugiat molestiae tempora corporis. Sed dignissimos suscipit
								</label>
							</div>
						</div>
						<div>
							<button class="btn btn-primary">Update</button>
							<button class="btn btn-light">Cancel</button>
						</div>
					</div>-->
				</div>
			</div>
		</div>
	</section> 

	
<?php //include('../Controllers/patient_profile.php');?>
	
	<script src="../js/patient-js.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>