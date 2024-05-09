



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>doctor Data</title>
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
			<h1 class="mb-5">Doctor Dashboard</h1>
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
                            Patients Feedback
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
                            <div class="col-md-6">
								<div class="form-group">
								  	<label>Country</label>
								  	<input type="text" class="form-control" value="<?php echo $_SESSION['country'] ?>" >
								</div>
							</div>
                            <div class="col-md-6">
								<div class="form-group">
								  	<label>City</label>
								  	<input type="text" class="form-control" value="<?php echo $_SESSION['city'] ?>" >
								</div>
							</div>
                            <div class="col-md-6">
								<div class="form-group">
								  	<label>Speciality</label>
								  	<input type="text" class="form-control" value="<?php echo $_SESSION['speciality'] ?>" >
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
								  	<label>First Name</label>
								  	<input type="text" class="form-control" value="<?php echo $_SESSION['first_name']?>" >
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
                            <div class="col-md-6">
								<div class="form-group">
								  	<label>Country</label>
								  	<input type="text" class="form-control" value="<?php echo $_SESSION['country'] ?>" >
								</div>
							</div>
                            <div class="col-md-6">
								<div class="form-group">
								  	<label>City</label>
								  	<input type="text" class="form-control" value="<?php echo $_SESSION['city'] ?>" >
								</div>
							</div>
                            <div class="col-md-6">
								<div class="form-group">
								  	<label>Speciality</label>
								  	<input type="text" class="form-control" value="<?php echo $_SESSION['speciality'] ?>" >
								</div>
							</div>
						</div>
						  <div>
							  <button class="btn btn-primary">Update Account</button>
							  <button class="btn btn-light"data-dismiss="modal">Cancel</button>
						  </div>
					  </div>
								
					<div class="tab-pane fade " id="password" role="tabpanel" aria-labelledby="password-tab">
						<h3 class="mb-4">Patients feedback</h3>
						<div class="row">
							<div class="col-md-3">
              <div class="card" style="width: 56rem;">
                <div class="card-body">
                  <h5 class="card-title">Feedbacks details</h5>
                  <h6 class="card-subtitle mb-2 text-muted"></h6>
                  <div class="row">
                  <div class="col-md-12" style="overflow-x: auto;">
    <table class="table table-hover" style="width: fit-content;">
        <thead>
            <tr>
                <th scope="col">Patient Name</th>
                <th scope="col">Rating</th>
                <th scope="col">Message</th>
            </tr>
        </thead>
        <tbody>
    <?php
    // Start the session
    //session_start();

    // Include the database connection class
    require_once('../Models/databaseConnection.php');

    if (isset($_SESSION['doctor_id'])) {
        // Get the doctor ID from session
        $doctor_id = $_SESSION['doctor_id'];

        // Create a new instance of the database connection
        $db = new DatabaseConnection();
        $connection = $db->getConnection();

        // Prepare the SQL query with parameterized statement
        $stmt = $connection->prepare("SELECT * FROM Feedback WHERE doctor_id = ?");
        // Execute the statement
        $stmt->execute([$doctor_id]);
        // Fetch the result
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Check if there are rows returned
        if (count($result) > 0) {
            foreach ($result as $row) {
                echo "<tr>";
                $stmt = $connection->prepare("SELECT * FROM Patient WHERE patient_id = ?");
                $stmt->execute([$row["patient_id"]]); // Corrected this line
                $patient = $stmt->fetch(PDO::FETCH_ASSOC); // Changed fetchAll to fetch
                echo "<td>" . $patient["first_name"] . " " . $patient["last_name"] . "</td>";
                echo "<td>" . $row["rating"] . "</td>";
                echo "<td>" . $row["comment"] . "</td>";

                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No patients found.</td></tr>";
        }
    } else {
        // Handle the case where $_SESSION['doctor_id'] is not set
        echo "<tr><td colspan='3'>Doctor ID is not set.</td></tr>";
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


    
    </div>
					
    







	
					<div class="tab-pane fade " id="security" role="tabpanel" aria-labelledby="security-tab">
						<h3 class="mb-8">Appointment Requests</h3>
						<div class="row">
							<div class="col-md-12">
							<table class="table table-hover" style="width: 50rem;">
    <thead>
        <tr>
            <th scope="col">Appointment ID</th>
            <th scope="col">Appointment Date/Time</th>
            <th scope="col">Patient Name</th>
            <th scope="col">Speciality</th>
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

        if(isset($_SESSION['doctor_id'])) {
            // Get the doctor ID from session
            $doctor_id = $_SESSION['doctor_id'];
            $speciality = isset($_SESSION['speciality']) ? $_SESSION['speciality'] : 'Default Speciality';

            // Create a new instance of the database connection
            $db = new DatabaseConnection();
            $connection = $db->getConnection();
            $status = 'pending';
			//$doctorid = NULL;
        
            try {
                // Prepare the SQL query with parameterized statement
                $stmt = $connection->prepare("SELECT * FROM Appointments WHERE status = ? AND appointment_speciality = ? AND doctor_id IS NULL");
                // Bind the parameter and execute the statement
                $stmt->execute([$status,$speciality]);
        
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
                        $stmt = $connection->prepare("SELECT first_name, last_name, email FROM Patient WHERE patient_id = ?");
                        $stmt->execute([$patient_id]);
                        $patient = $stmt->fetch(PDO::FETCH_ASSOC);
                        $patient_name = $patient["first_name"] . " " . $patient["last_name"];
                        $patient_email = $patient['email'];
                        echo "<td>".$patient_name."</td>";
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
                <form action="../Controllers/doctor_dashboard.php" method="post">
                    <button type="submit" value="'.$row["appointment_id"].'" name="accept_appointment" class="btn btn-primary ">Accept </button>
                </form> </td>';
             echo'  <td> <div class="button-item">
    <form action="../Controllers/doctor_dashboard.php" method="post">
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
            // Handle the case where $_SESSION['doctor_id'] is not set
            echo "<tr><td colspan='5'>doctor ID is not set.</td></tr>";
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