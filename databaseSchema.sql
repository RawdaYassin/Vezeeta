
-- Create the database (if it doesn't exist)
CREATE DATABASE Vezeeta;

-- Use the Vezeeta database
USE Vezeeta;

-- 1. User Table
CREATE TABLE User (
  id INT PRIMARY KEY AUTO_INCREMENT,
  first_name VARCHAR(50) NOT NULL,
  last_name VARCHAR(50) NOT NULL,
  password VARCHAR(255) NOT NULL,  -- Consider using a hashing function for secure password storage
  gender VARCHAR(20),
  email VARCHAR(255) UNIQUE NOT NULL,  -- Ensures unique email addresses
  phone_number VARCHAR(20)
);

-- 2. Patient Table

CREATE TABLE Patient (
  patient_id INT PRIMARY KEY AUTO_INCREMENT,
  user_id INT UNIQUE,  -- Foreign key referencing User table (one-to-one relationship)
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) UNIQUE NOT NULL,  -- Ensures unique email addresses
  phone_number VARCHAR(20),
  date_of_birth DATE,
  FOREIGN KEY (user_id) REFERENCES User(id)  -- Establish the foreign key relationship
);

-- 3. Doctor Table

CREATE TABLE Doctor (
  doctor_id INT PRIMARY KEY AUTO_INCREMENT,
  user_id INT UNIQUE,  -- Foreign key referencing User table (one-to-one relationship)
  name VARCHAR(255) NOT NULL,
  speciality VARCHAR(100),
  years_of_experience INT,
  FOREIGN KEY (user_id) REFERENCES User(id)  -- Establish the foreign key relationship
);

-- 4. Clinic Table

CREATE TABLE Clinic (
  clinic_id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  description VARCHAR(255),
  location VARCHAR(255) NOT NULL,
  price DECIMAL(15,0) NOT NULL,  -- Price for consultation or service
  rate DECIMAL(10,0),  -- Average rating (optional)
  admin_id INT,  -- Foreign key referencing Admin table
  FOREIGN KEY (admin_id) REFERENCES Admin(id)  -- Establish the foreign key relationship
);

-- 5. Appointments Table

CREATE TABLE Appointments (
  appointment_id INT PRIMARY KEY AUTO_INCREMENT,
  patient_id INT NOT NULL,
  doctor_id INT NOT NULL,
  appointment_time DATETIME NOT NULL,
  appointment_date DATE NOT NULL,
  status ENUM('Pending', 'Confirmed', 'Completed', 'Cancelled'),  -- Appointment status
  FOREIGN KEY (patient_id) REFERENCES Patient(patient_id),
  FOREIGN KEY (doctor_id) REFERENCES Doctor(doctor_id)
);

-- 6. Payment Table

CREATE TABLE Payment (
  payment_id INT PRIMARY KEY AUTO_INCREMENT,
  payment_method ENUM('Cash', 'Credit') NOT NULL,
  date DATETIME NOT NULL,
  amount DECIMAL(12,0),
  appointment_id INT,  -- Foreign key referencing Appointments table (optional)
  FOREIGN KEY (appointment_id) REFERENCES Appointments(appointment_id)
);

-- 7. Admin Table

CREATE TABLE Admin (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) UNIQUE NOT NULL,  -- Ensures unique email addresses
  password VARCHAR(255) NOT NULL
);

-- 8. Feedback Table

CREATE TABLE Feedback (
  feedback_id INT PRIMARY KEY AUTO_INCREMENT,
  patient_id INT NOT NULL,
  doctor_id INT,  -- Optional, can be null if feedback is general
  clinic_id INT,  -- Optional, can be null if feedback is general
  rating INT,  -- Rating (e.g., 1-5 stars)
  comment VARCHAR(255),
  FOREIGN KEY (patient_id) REFERENCES Patient(patient_id),
  FOREIGN KEY (doctor_id) REFERENCES Doctor(doctor_id),
  FOREIGN KEY (clinic_id) REFERENCES Clinic(clinic_id)
);


--COMMIT;