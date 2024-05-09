

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Data</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css2/style.css">
    <link rel="stylesheet" type="text/css" href="../css/home.css">


    <style>

.button-container {
    display: flex;
    justify-content: center; /* Center the buttons horizontally */
}

.button-item {
    margin: 0 25px; /* Adjust the margin to create space between buttons */
}

    </style>
</head>
<body>
	<section class="py-5 my-5">
		<div class="container">
			<h1 class="mb-5">Admin Dashboard</h1>
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
                            Account Details 
                        </a>
                        <a class="nav-link" id="accedit-tab" data-toggle="pill" href="#accountedit" role="tab" aria-controls="accedit" aria-selected="true">
                            <i class="fa fa-home text-center mr-1"></i> 
                            Account Edit
                        </a>
                        <a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="true">
                            <i class="fa fa-key text-center mr-1"></i> 
                            Users Management
                        </a>
                        <a class="nav-link" id="security-tab" data-toggle="pill" href="#security" role="tab" aria-controls="security" aria-selected="true">
                            <i class="fa fa-user text-center mr-1"></i> 
                            Appointments Requests
                        </a>
                    </div>
				</div>
				<div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
					<div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
						<h3 class="mb-4">Account Settings</h3>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  	<label>First Name</label>
								  	<input type="text" class="form-control" value="<?php echo $_SESSION['first_name']  ?>" >
								</div>
							</div>
                            <div class="col-md-6">
								<div class="form-group">
								  	<label>Last Name</label>
								  	<input type="text" class="form-control" value="<?php echo $_SESSION['last_name'] ?>" >
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
								  	<label>Email</label>
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
						</div>
						<div>
							<a href="home.html" class="btn btn-light"data-dismiss="modal">Back</a>
                            <button class="btn btn-primary">Delete</button>
                            <button class="btn btn-primary">Update</button>
						<!--<button class="btn btn-light">Cancel</button>-->
						</div>
					</div>
					<div class="tab-pane fade " id="accountedit" role="tabpanel" aria-labelledby="accedit-tab">
						<h3 class="mb-4">Account edit data</h3>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Patient Name</label>
								  	<input type="text" class="form-control" value="<?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name'] ?>" >
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
								  	<label>Phone number</label>
								  	<input type="text" class="form-control" value="<?php echo $_SESSION['phone_number'] ?>" >
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Password</label>
								  	<input type="text" class="form-control" value="<?php echo $_SESSION['password'] ?>" >
								</div>
							</div>
						</div>
						  <div>
							  <button class="btn btn-primary">Update Account</button>
							  <button class="btn btn-light"data-dismiss="modal">Cancel</button>
						  </div>
					  </div>
								
					<div class="tab-pane fade " id="password" role="tabpanel" aria-labelledby="password-tab">
						<h3 class="mb-4">Users Managements</h3>
						<div class="row">
							<div class="col-md-3">
              <div class="card" style="width: 56rem;">
                <div class="card-body">
                  <h5 class="card-title">Patients data</h5>
                  <h6 class="card-subtitle mb-2 text-muted"></h6>
                  <div class="row">
                  <div class="col-md-12" style="overflow-x: auto;">
    <table class="table table-hover" style="width: fit-content;">
        <thead>
            <tr>
                <th scope="col">Full Name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Gender</th>
                <th scope="col">Date of Birth</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Start the session
            // session_start();

            // Include the database connection class
            require_once('../Models/databaseConnection.php');

            if(isset($_SESSION['admin_id'])) {
                // Get the admin ID from session
                $admin_id = $_SESSION['admin_id'];

                // Create a new instance of the database connection
                $db = new DatabaseConnection();
                $connection = $db->getConnection();

                // Prepare the SQL query with parameterized statement
                $stmt = $connection->prepare("SELECT * FROM Patient");
                
                // Execute the statement
                $stmt->execute([]);

                // Fetch the result
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // Check if there are rows returned
                if(count($result) > 0) {
                    foreach($result as $row) {
                        echo "<tr>";
                        echo "<td>" . $row["first_name"] . " " . $row["last_name"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["password"] . "</td>";
                        echo "<td>" . $row["phone_number"] . "</td>";
                        echo "<td>" . $row["gender"] . "</td>";
                        // Format date of birth if needed
                        echo "<td>" . $row["date_of_birth"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No patients found.</td></tr>";
                }
            } else {
                // Handle the case where $_SESSION['admin_id'] is not set
                echo "<tr><td colspan='6'>Admin ID is not set.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>


                    </div>
						</div>
                      </div>

                      </br>
                      <div class="card" style="width: 56rem;">
                <div class="card-body">
                  <h5 class="card-title">Admins data</h5>
                  <h6 class="card-subtitle mb-2 text-muted"></h6>
                  <div class="row">
                  <div class="col-md-12" style="overflow-x: auto;">
    <table class="table table-hover" style="width: fit-content;">
        <thead>
            <tr>
                <th scope="col">Full Name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Gender</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Start the session
            // session_start();

            // Include the database connection class
            require_once('../Models/databaseConnection.php');

            if(isset($_SESSION['admin_id'])) {
                // Get the admin ID from session
                $admin_id = $_SESSION['admin_id'];

                // Create a new instance of the database connection
                $db = new DatabaseConnection();
                $connection = $db->getConnection();

                // Prepare the SQL query with parameterized statement
                $stmt = $connection->prepare("SELECT * FROM Admin");
                
                // Execute the statement
                $stmt->execute([]);

                // Fetch the result
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // Check if there are rows returned
                if(count($result) > 0) {
                    foreach($result as $row) {
                        echo "<tr>";
                        echo "<td>" . $row["first_name"] . " " . $row["last_name"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["password"] . "</td>";
                        echo "<td>" . $row["phone_number"] . "</td>";
                        echo "<td>" . $row["gender"] . "</td>";
                        // Format date of birth if needed
                       // echo "<td>" . $row["date_of_birth"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No patients found.</td></tr>";
                }
            } else {
                // Handle the case where $_SESSION['admin_id'] is not set
                echo "<tr><td colspan='6'>Admin ID is not set.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

                    </div>
						</div>
                      </div>

                      </br>
                      <div class="card" style="width: 56rem;">
                <div class="card-body">
                  <h5 class="card-title">Doctors data</h5>
                  <h6 class="card-subtitle mb-2 text-muted"></h6>
                  <div class="row">
                  <div class="col-md-12" style="overflow-x: auto;">
    <table class="table table-hover" style="width: fit-content;">
        <thead>
            <tr>
                <th scope="col">Full Name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Gender</th>
                <th scope="col">Country.City</th>
                <th scope="col">Speciality</th>
                <th scope="col">Clinic</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Start the session
            // session_start();

            // Include the database connection class
            require_once('../Models/databaseConnection.php');

            if(isset($_SESSION['admin_id'])) {
                // Get the admin ID from session
                $admin_id = $_SESSION['admin_id'];

                // Create a new instance of the database connection
                $db = new DatabaseConnection();
                $connection = $db->getConnection();

                // Prepare the SQL query with parameterized statement
                $stmt = $connection->prepare("SELECT * FROM Doctor");
                
                // Execute the statement
                $stmt->execute([]);

                // Fetch the result
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // Check if there are rows returned
                if(count($result) > 0) {
                    foreach($result as $row) {
                        // Fetch clinic name using a join operation
                        $clinicName = ""; // Initialize clinic name variable
                        $clinicId = $row["clinic_id"]; // Get clinic ID from the Doctor table
                
                        // Query to fetch clinic name based on clinic ID
                        $stmtClinic = $connection->prepare("SELECT name FROM Clinic WHERE clinic_id = ?");
                        $stmtClinic->execute([$clinicId]);
                        $clinicRow = $stmtClinic->fetch(PDO::FETCH_ASSOC);
                
                        // Check if the clinic name was fetched successfully
                        if ($clinicRow) {
                            $clinicName = $clinicRow["name"]; // Assign clinic name
                        }
                
                        echo "<tr>";
                        echo "<td>" . $row["first_name"] . " " . $row["last_name"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["password"] . "</td>";
                        echo "<td>" . $row["phone_number"] . "</td>";
                        echo "<td>" . $row["gender"] . "</td>";
                        echo "<td>" . $row["country"] . "." . $row["city"]. "</td>";
                        echo "<td>" . $row["speciality"] . "</td>";
                        echo "<td>" . $clinicName . "</td>"; // Print clinic name instead of clinic ID
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No patients found.</td></tr>";
                }

               } else {
                // Handle the case where $_SESSION['admin_id'] is not set
                echo "<tr><td colspan='6'>Admin ID is not set.</td></tr>";
            }
            ?>
        </tbody>
    </table>


                
          
</div>


                    </div>
						</div>
                      </div>
        </br>
        <div class="card" style="width: 56rem;">
                <div class="card-body">
                  <h5 class="card-title">Clinics data</h5>
                  <h6 class="card-subtitle mb-2 text-muted"></h6>
                  <div class="row">
                  <div class="col-md-12" style="overflow-x: auto;">
    <table class="table table-hover" style="width: fit-content;">
        <thead>
            <tr>
                <th scope="col">Clinic Name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Address</th>
                <th scope="col">Speciality</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Start the session
            // session_start();

            // Include the database connection class
            require_once('../Models/databaseConnection.php');

            if(isset($_SESSION['admin_id'])) {
                // Get the admin ID from session
                $admin_id = $_SESSION['admin_id'];

                // Create a new instance of the database connection
                $db = new DatabaseConnection();
                $connection = $db->getConnection();

                // Prepare the SQL query with parameterized statement
                $stmt = $connection->prepare("SELECT * FROM Clinic");
                
                // Execute the statement
                $stmt->execute([]);

                // Fetch the result
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // Check if there are rows returned
                if(count($result) > 0) {
                    foreach($result as $row) {
                        echo "<tr>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["password"] . "</td>";
                        echo "<td>" . $row["phone_number"] . "</td>";
                        echo "<td>" . $row["address"] . "</td>";
                        // Format date of birth if needed
                        echo "<td>" . $row["speciality"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No patients found.</td></tr>";
                }
            } else {
                // Handle the case where $_SESSION['admin_id'] is not set
                echo "<tr><td colspan='6'>Admin ID is not set.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>


                    </div>
						</div>
                      </div>
              </div>
        </div>
        </br>   
        <div class="button-container"> 
        <div class="button-item">
    <form action="../Controllers/admin_dashboard.php" method="post">
        <button type="submit" name="add_doctor" class="btn btn-primary ">Add new doctor</button>
    </form>
</div>
<div class="button-item">
    <form action="../Controllers/admin_dashboard.php" method="post">
        <button type="submit" name="add_admin" class="btn btn-primary ">Add new admin</button>
    </form>
</div>
<div class="button-item">
    <form action="../Controllers/admin_dashboard.php" method="post">
        <button type="submit" name="add_patient" class="btn btn-primary ">Add new patient</button>
    </form>
</div>
<div class="button-item">
    <form action="../Controllers/admin_dashboard.php" method="post">
        <button type="submit" name="add_clinic" class="btn btn-primary ">Add new clinic</button>
    </form>
</div>
        </div>


    
    </div>
								
	
					<div class="tab-pane fade " id="security" role="tabpanel" aria-labelledby="security-tab">
						<h3 class="mb-8">Appointment Requests</h3>
						<div class="row">
							<div class="col-md-12">
							<table class="table table-hover" style="width: 50rem;">
    <thead>
        <tr>
            <th scope="col">Appointment ID</th>
            <th scope="col">Appointment Date</th>
            <th scope="col">Patient </th>
            <th scope="col">Speciality</th>
            <th scope="col">Doctor </th>
            <th scope="col">Clinic</th>
			<th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Start the session
       // session_start();

        // Include the database connection class
        require_once('../Models/databaseConnection.php');

        if(isset($_SESSION['admin_id'])) {
            // Get the admin ID from session
            $admin_id = $_SESSION['admin_id'];
        
            // Create a new instance of the database connection
            $db = new DatabaseConnection();
            $connection = $db->getConnection();
            $status = 'pending';
        
            try {
                // Prepare the SQL query with parameterized statement
                $stmt = $connection->prepare("SELECT * FROM Appointments WHERE status = ?");
                
                // Bind the parameter and execute the statement
                $stmt->execute([$status]);
        
                // Fetch the result
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
                // Check if there are rows returned
                if(count($result) > 0) {
                    foreach($result as $row) {
                        echo "<tr>";
                        echo "<td>"."#".$row["appointment_id"]."</td>";
                        echo "<td>".$row["appointment_date"]."</td>";
                        
                        // Fetch the patient's name from the Patient table
                        $patient_id = $row["patient_id"];
                        $stmt = $connection->prepare("SELECT first_name, last_name FROM Patient WHERE patient_id = ?");
                        $stmt->execute([$patient_id]);
                        $patient = $stmt->fetch(PDO::FETCH_ASSOC);
                        $patient_name = $patient["first_name"]." ".$patient["last_name"];
                        //$patient_email = $patient['email'];
                        echo "<td>".$patient_name."</td>";
                        echo "<td>".$row["appointment_speciality"]."</td>";
                        $doctor_id = $row["doctor_id"];
                        $stmt = $connection->prepare("SELECT first_name, last_name FROM Doctor WHERE doctor_id = ?");
                        $stmt->execute([$doctor_id]);
                        $doctor = $stmt->fetch(PDO::FETCH_ASSOC);
                       // $doctor_name = $doctor["first_name"] . " " . $doctor["last_name"];
                        $doctor_name = isset($doctor["first_name"]) && isset($doctor["last_name"]) ? $doctor["first_name"] . " " . $doctor["last_name"] : "No Doctor";
//$patient_email = $patient['email'];
                        echo "<td>".$doctor_name."</td>";
                       
                        $clinic_id = $row["clinic_id"];
                        $stmt = $connection->prepare("SELECT name FROM Clinic WHERE clinic_id = ?");
                        $stmt->execute([$clinic_id]);
                        $clinic = $stmt->fetch(PDO::FETCH_ASSOC);
                        $clinic_name = isset($clinic["name"]) ? $clinic["name"] : "No Clinic";
                        echo "<td>".$clinic_name."</td>";


                        echo "<td>".$row["appointment_speciality"]."</td>";
                        /* Uncomment this block if you need to fetch and display clinic name
                        // Fetch the clinic's name from the Clinic table
                        $clinic_id = $row["clinic_id"];
                        $stmt = $connection->prepare("SELECT name FROM Clinic WHERE clinic_id = ?");
                        $stmt->execute([$clinic_id]);
                        $clinic = $stmt->fetch(PDO::FETCH_ASSOC);
                        $clinic_name = $clinic["name"];
                        echo "<td>".$clinic_name."</td>";
                        */
                        

                        echo'  <td> <div class="button-item">
                        <form action="../Controllers/admin_dashboard.php" method="post">
                            <button type="submit" value="'.$row["appointment_id"].'" name="accept_appointment" class="btn btn-primary ">Accept </button>
                        </form> </td>';
                     echo'  <td> <div class="button-item">
            <form action="../Controllers/admin_dashboard.php" method="post">
                <button type="submit"  value="'.$row["appointment_id"].'"name="decline_appointment" class="btn btn-primary ">Decline </button>
            </form> </td>';

                        //echo "<td>".$row["status"]."</td>";
                        echo "</tr>";

                       
                    }
                } else {
                    echo "<tr><td colspan='5'>No appointments found.</td></tr>";
                }
            } catch (PDOException $e) {
                echo "<tr><td colspan='5'>Error: ".$e->getMessage()."</td></tr>";
            }
        } else {
            // Handle the case where $_SESSION['admin_id'] is not set
            echo "<tr><td colspan='5'>Admin ID is not set.</td></tr>";
        }
        
        ?>
    </tbody>
</table>

                    </div>
						</div>
						
					</div>
					<div class="tab-pane fade  " id="application" role="tabpanel" aria-labelledby="application-tab">
						<h3 class="mb-4">Application Settings</h3>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" value="" id="app-check">
										<label class="form-check-label" for="app-check">
										App check
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" value="" id="defaultCheck2" >
										<label class="form-check-label" for="defaultCheck2">
										Lorem ipsum dolor sit.
										</label>
									</div>
								</div>
							</div>
						</div>
						<div>
							<button class="btn btn-primary">Update</button>
							<button class="btn btn-light">Cancel</button>
						</div>
					</div>
					<div class="tab-pane fade  " id="notification" role="tabpanel" aria-labelledby="notification-tab">
						<h3 class="mb-4">Notification Settings</h3>
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
					</div>
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