<?php

require_once('../Models/databaseConnection.php');
require_once('../Models/admin.php');


$db = new DatabaseConnection();
$connection = $db->getConnection();
$admin = new Admin($connection);
$clinics = $admin->getClinics();
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <style>
        :root{
            --primary:#1f2e88;
            --secondary:#2f66d4;
            --hover:#a2d9f5;
            --black:#333;
            --white:#fff;
            --light-color:#666;
            --light-bg:#eee;
            --border:.2rem solid rgba(0, 0, 0, 0.1);
            --box-shadow:0 .5rem 1rem rgba(0, 0, 0, 0.1);
        }
        *{
            font-family:'poppins',sans-serif ;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            outline: none;
            border: none;
            text-transform: capitalize;
            transition: .2s linear;
            text-decoration: none;
        }
        html{
            font-size: 62.5%;
            overflow-x: hidden;
            scroll-padding-top: 9rem;
            scroll-behavior: smooth;
        }
        html::-webkit-scrollbar{
            width: .8rem;
        }
        html::-webkit-scrollbar-track{
            background: transparent;
        }
        html::-webkit-scrollbar-thumb{
            background: var(--primary);
            border-radius: 5rem;
        }
        #menu-btn{
        font-size: 2.5rem;
        cursor: pointer;
        color: var(--black);
        margin-left: 1.7rem;
        display: none;
        }
        #menu-btn:hover{
            color: var(--primary);
        }
        .btn{
            margin-top: 1rem;
            display: inline-block;
            padding: 1rem 3rem;
            border-radius: .5rem;
            background: var(--primary);
            cursor: pointer;
            font-size: 1.7rem;
            color: var(--white);
        }
        .btn:hover{
            background: var(--secondary);
        }
        
        
        .contact{
            background: var(--light-bg);
        }
        .contact form{
            padding: 1.2rem;
            background:var(--white) ;
            width: 50rem;
            margin: 0 auto;
            border-radius: .5rem;
        }
        .contact form span{
            font-size: 1.4rem;
            color: var(--primary);
        }
        .contact form .inputbox{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .contact form .inputbox input{
            padding: .9rem;
            margin: .6rem 0;
            font-size: 1.1rem;
            color: var(--black);
            text-transform: capitalize;
            background: var(--light-bg);
            border-radius: .5rem;
            width: 49%;
            border: none;
        } 
        .contact form .box{
            margin: .7rem 0;
            width: 90%;
            background: var(--light-bg);
            border-radius: .5rem;
            padding: .9rem;
            font-size: 1rem;
            color: var(--black);
            text-transform: capitalize;
            border: none;
        }
        .btn{
            margin-top: .8rem;
            display: inline-block;
            padding: .8rem .8rem;
            border-radius: .5rem;
            background: var(--primary);
            cursor: pointer;
            font-size: 1.2rem;
            color: var(--white);
            border: none;
        }
        section{
            padding: 5rem 7%;
            
        }
        .heading{
            font-size: 2rem;
            text-align: center;
            color: var(--primary);
            text-transform: uppercase;
            font-weight: bolder;
            margin-bottom: 2rem;
        }
        
        select{
            
            border: 2px solid var(--light-bg);
            font-size: 1rem;
            border-radius: .5rem;
            background-color: var(--light-bg);
        }
        </style>
</head>
<body>
    <section class="contact" id="contact">
    <h2 class="heading">Add User</h2>
    <form action="../Controllers/add_users.php" method="post">
        <span for="user_type">User Type:</span><br>
            <div class="select">
                <select name="user_type" id="user_type">
                    <option value="admin">Admin</option>
                    <option value="doctor">Doctor</option>
                    <option value="clinic">Clinic</option>
                    <option value="patient">Patient</option>
                </select>
            </div>
        <br>
        <span for="first_name">First Name:</span><br>
        <input class="box"type="text" name="first_name" required>
        <br>

        <span for="last_name">Last Name:</span><br>
        <input class="box" type="text" name="last_name" required><br>

        <span for="email">Email:</span><br>
        <input class="box" type="email" name="email" required><br>

        <span for="password">Password:</span> <br>
        <input class="box" type="password" name="password" required><br>

        <span for="phone_number">Phone Number:</span><br>
        <input class="box" type="text" name="phone_number"><br>

        <span for="gender">Gender:</span><br>
        <input class="box" type="text" name="gender"><br>

        <!-- Additional fields based on user type -->
        <div id="additional_fields"></div>

        <button type="submit" class="btn" name="add_user">Add User</button>
    </form>
</section>

    <script>
        document.getElementById('user_type').addEventListener('change', function() {
            var userType = this.value;
            var additionalFields = document.getElementById('additional_fields');
            additionalFields.innerHTML = '';

            if (userType === 'doctor') {
                // Additional fields for doctor
                additionalFields.innerHTML += `
                    <label for="city">City:</label>
                    <input type="text" name="city"><br>

                    <label for="country">Country:</label>
                    <input type="text" name="country"><br>

                    <label for="speciality">Speciality:</label>
                    <input type="text" name="speciality"><br>

                    <label for="clinic">Clinic:</label>
					<?php 
            if (isset($clinics) && !empty($clinics)) {
                echo '<select name="clinic" id="clinic" class="col-md-6">';
                foreach ($clinics as $clinic) {
                    echo '<option value="' . $clinic['clinic_id'] . '">' . $clinic['name'] . '</option>';
                }
                echo '</select><br><br>';
            }
            ?>
                `;
            } else if (userType === 'clinic') {
                // Additional fields for clinic
                additionalFields.innerHTML += `
                    <label for="address">Address:</label>
                    <input type="text" name="address"><br>

                    <label for="speciality">Speciality:</label>
                    <input type="text" name="speciality"><br>
                `;
            } else if (userType === 'patient') {
                // Additional fields for patient
                additionalFields.innerHTML += `
                    <label for="date_of_birth">Date of Birth:</label>
                    <input type="date" name="date_of_birth"><br>
                `;
            }
        });
    </script>
</body>
</html>
