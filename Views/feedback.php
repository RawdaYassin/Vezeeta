<?php

require_once('../Models/databaseConnection.php');
require_once('../Models/admin.php');


$db = new DatabaseConnection();
$connection = $db->getConnection();
$admin = new Admin($connection);
$clinics = $admin->getClinics();
$doctors = $admin->getDoctors();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>feedback</title>
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
        padding: 2.5rem 2.5rem;
        margin:auto;
        max-width: fit-content;
        
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
    <h1 class="heading">Feedback</h1>
    <form action="../Controllers/feedback.php" method="post"> <!-- Added method="post" -->
        <span>Name:</span>
        <div class="inputbox">
            <input type="text" placeholder="First Name" name="firstName" required>
            <input type="text" placeholder="Last Name" name="lastName" required>
        </div>
        <span>Email:</span><br>
        <input type="email" placeholder="Enter Your Email" class="box" name="email" required><br>
        <span>Feedback:</span><br>
        <textarea name="feedback" placeholder="Please provide your feedback here." class="box" cols="20" rows="5" required></textarea><br>
        
        <span>Clinic (Optional):</span><br> 
        <div class="select">
            <?php 
            if (isset($clinics) && !empty($clinics)) {
                echo '<select name="clinic" id="clinic" class="col-md-6">';
                foreach ($clinics as $clinic) {
                    echo '<option value="' . $clinic['clinic_id'] . '">' . $clinic['name'] . '</option>';
                }
                echo '</select><br><br>';
            }
            ?>

            <span>Doctors (Optional):</span><br> 
            <?php 
            if (isset($doctors) && !empty($doctors)) {
                echo '<select name="doctor" id="doctor" class="col-md-6">';
                foreach ($doctors as $doctor) {
                    echo '<option value="' . $doctor['doctor_id'] . '">' . $doctor['first_name'] . ' ' . $doctor['last_name'] . '</option>';
                }
                echo '</select><br><br>';
            }
            ?>

            <span>Rating (0-10):</span><br> 
            <input type="range" name="rating" min="0" max="10" class="col-md-6"><br><br>
        </div>
        
        <input type="submit" value="Send Feedback" class="btn">
    </form>
</section>

</body>
</html>