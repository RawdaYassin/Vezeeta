
-- Create the database (if it doesn't exist)
CREATE DATABASE Vezeeta;

-- Use the Vezeeta database
USE Vezeeta;

-- 2. Patient Table

CREATE TABLE Patient (
  patient_id INT PRIMARY KEY AUTO_INCREMENT,
  first_name VARCHAR(50) NOT NULL,
  last_name VARCHAR(50) NOT NULL,
  email VARCHAR(255) UNIQUE NOT NULL,  -- Ensures unique email addresses
  password VARCHAR(255) NOT NULL,  -- Consider using a hashing function for secure password storage
  phone_number VARCHAR(20),
  gender VARCHAR(20),
  date_of_birth DATE,
);

-- 3. Doctor Table

CREATE TABLE Doctor (
  doctor_id INT PRIMARY KEY AUTO_INCREMENT,
  first_name VARCHAR(50) NOT NULL,
  last_name VARCHAR(50) NOT NULL,
  email VARCHAR(255) UNIQUE NOT NULL,  -- Ensures unique email addresses
  password VARCHAR(255) NOT NULL,  -- Consider using a hashing function for secure password storage
  phone_number VARCHAR(20),
  gender VARCHAR(20),
  city  VARCHAR(100),
  country  VARCHAR(100),
  speciality VARCHAR(100),
  clinic_id INT NOT NULL,
  FOREIGN KEY (clinic_id) REFERENCES Clinic(clinic_id)  -- Establish the foreign key relationship
);

-- 4. Clinic Table
CREATE TABLE Clinic (
  clinic_id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) UNIQUE NOT NULL,  -- Ensures unique email addresses
  password VARCHAR(255) NOT NULL,  -- Consider using a hashing function for secure password storage
  phone_number VARCHAR(20),
  address VARCHAR(255) NOT NULL,
  speciality VARCHAR(100),
);


-- 7. Admin Table
CREATE TABLE Admin (
  id INT PRIMARY KEY AUTO_INCREMENT,
  first_name VARCHAR(50) NOT NULL,
  last_name VARCHAR(50) NOT NULL,
  email VARCHAR(255) UNIQUE NOT NULL,  -- Ensures unique email addresses
  password VARCHAR(255) NOT NULL,  -- Consider using a hashing function for secure password storage
  phone_number VARCHAR(20),
  gender VARCHAR(20)
);

-- 5. Appointments Table

CREATE TABLE Appointments (
  appointment_id INT PRIMARY KEY AUTO_INCREMENT,
  patient_id INT NOT NULL,
  doctor_id INT NOT NULL,
  appointment_date DATE NOT NULL,
  appointment_speciality VARCHAR(100) NOT NULL,
  status ENUM('Pending', 'Confirmed', 'Completed', 'Cancelled'),
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










INSERT INTO Patient (first_name, last_name, email, password, phone_number, gender, date_of_birth)
VALUES ('John', 'Doe', 'john.doe@example.com', 'password123', '1234567890', 'Male', '1990-01-01');

INSERT INTO Patient (first_name, last_name, email, password, phone_number, gender, date_of_birth)
VALUES ('Jane', 'Smith', 'jane.smith@example.com', 'securepassword', '9876543210', 'Female', '1995-05-15');

INSERT INTO Patient (first_name, last_name, email, password, phone_number, gender, date_of_birth)
VALUES ('Michael', 'Brown', 'michael.brown@example.com', 'mypassword', '5678901234', 'Male', '1980-10-20');

INSERT INTO Patient (first_name, last_name, email, password, phone_number, gender, date_of_birth)
VALUES ('Sarah', 'Garcia', 'sarah.garcia@example.com', 'password456', '2345678901', 'Female', '1998-02-12');

INSERT INTO Patient (first_name, last_name, email, password, phone_number, gender, date_of_birth)
VALUES ('David', 'Miller', 'david.miller@example.com', 'secure123', '8901234567', 'Male', '1975-08-29');

INSERT INTO Patient (first_name, last_name, email, password, phone_number, gender, date_of_birth)
VALUES ('Jennifer', 'Davis', 'jennifer.davis@example.com', 'password789', '4567890123', 'Female', '2000-06-05');

INSERT INTO Patient (first_name, last_name, email, password, phone_number, gender, date_of_birth)
VALUES ('William', 'Rodriguez', 'william.rodriguez@example.com', 'mysecurepass', '1023456789', 'Male', '1985-12-31');


-- Assuming Clinic with ID 1 exists
INSERT INTO Doctor (first_name, last_name, email, password, phone_number, gender, city, country, speciality, clinic_id)
VALUES ('Alice', 'Lee', 'alice.lee@doctor.com', 'doctorpassword', '1234567891', 'Female', 'New York', 'USA', 'Cardiology', 1);

INSERT INTO Doctor (first_name, last_name, email, password, phone_number, gender, city, country, speciality, clinic_id)
VALUES ('David', 'Johnson', 'david.johnson@doctor.com', 'securedoctor', '9876543212', 'Male', 'London', 'UK', 'Dermatology', 1);

INSERT INTO Doctor (first_name, last_name, email, password, phone_number, gender, city, country, speciality, clinic_id)
VALUES ('Susan', 'Williams', 'susan.williams@doctor.com', 'doctor123', '5678901234', 'Female', 'Paris', 'France', 'Pediatrics', 1);

INSERT INTO Doctor (first_name, last_name, email, password, phone_number, gender, city, country, speciality, clinic_id)
VALUES ('Richard', 'Brown', 'richard.brown@doctor.com', 'securepass456', '2345678901', 'Male', 'Berlin', 'Germany', 'Neurology', 1);

INSERT INTO Doctor (first_name, last_name, email, password, phone_number, gender, city, country, speciality, clinic_id)
VALUES ('Lisa', 'Miller', 'lisa.miller@doctor.com', 'doctor789', '8901234567', 'Female', 'Madrid', 'Spain', 'Orthopedics', 1);





INSERT INTO Clinic (name, email, password, phone_number, address, speciality)
VALUES ('Vezeeta Clinic', 'clinic@vezeeta.com', 'clinicpassword', '1234567893', 'Main Street 123', 'General Practice');



INSERT INTO Clinic (name, email, password, phone_number, address, speciality)
VALUES ('Smile Dental Clinic', 'dentalclinic@smile.com', 'dentalclinic123', '1234567893' ,'Park Avenue 456', 'Dentistry');

-- Six additional clinics
INSERT INTO Clinic (name, email, password, phone_number, address, speciality)
VALUES ('Wellspring Medical Clinic', 'wellspring@clinic.com', 'wellspring456' , '1234567893', 'Maple Street 345', 'Internal Medicine');

INSERT INTO Clinic (name, email, password, phone_number, address, speciality)
VALUES ('Healthy Steps Pediatrics', 'pediatrics@healthy.com', 'healthy789', '1234567893', 'Oak Street 102', 'Pediatrics');

INSERT INTO Clinic (name, email, password, phone_number, address, speciality)
VALUES ("Central Women\'s Care", 'womenscare@central.com', 'womenscare123', '1234567893', 'Birch Street 567', 'Obstetrics & Gynecology');

INSERT INTO Clinic (name, email, password, phone_number, address, speciality)
VALUES ('Orthopedic Specialists', 'orthopedic@specialists.com', 'orthopedic456', '1234567893', 'Willow Street 890', 'Orthopedics');



-- Three example admins
INSERT INTO Admin (first_name, last_name, email, password, phone_number, gender)
VALUES ('John', 'Doe', 'admin1@vezeeta.com', 'securepassword123', '1234567890', 'Male');

INSERT INTO Admin (first_name, last_name, email, password, phone_number, gender)
VALUES ('Jane', 'Smith', 'admin2@vezeeta.com', 'strongpassword456', '9876543210', 'Female');

INSERT INTO Admin (first_name, last_name, email, password, phone_number, gender)
VALUES ('David', 'Miller', 'admin3@vezeeta.com', 'secureadmin789', '5678901234', 'Male');



-- Example appointments with different statuses and dates (some in the past for illustration)
INSERT INTO Appointments (patient_id, doctor_id, appointment_time, appointment_date, status)
VALUES (1, 1, '2024-04-25 10:00:00', '2024-04-25', 'Completed');  -- Past appointment

INSERT INTO Appointments (patient_id, doctor_id, appointment_time, appointment_date, status)
VALUES (2, 2, '2024-05-02 14:00:00', '2024-05-02', 'Completed');  -- Past appointment

INSERT INTO Appointments (patient_id, doctor_id, appointment_time, appointment_date, status)
VALUES (3, 3, '2024-05-10 10:00:00', '2024-05-10', 'Pending');

INSERT INTO Appointments (patient_id, doctor_id, appointment_time, appointment_date, status)
VALUES (4, 4, '2024-05-15 11:00:00', '2024-05-15', 'Confirmed');

INSERT INTO Appointments (patient_id, doctor_id, appointment_time, appointment_date, status)
VALUES (5, 1, '2024-05-20 15:00:00', '2024-05-20', 'Pending');

INSERT INTO Appointments (patient_id, doctor_id, appointment_time, appointment_date, status)
VALUES (4, 2, '2024-05-22 09:00:00', '2024-05-22', 'Pending');

INSERT INTO Appointments (patient_id, doctor_id, appointment_time, appointment_date, status)
VALUES (1, 5, '2024-05-27 12:00:00', '2024-05-27', 'Pending');

-- Add 8 more appointments following the same format, referencing existing patient and doctor IDs

INSERT INTO Appointments (patient_id, doctor_id, appointment_time, appointment_date, status)
VALUES (2, 3, '2024-05-31 10:00:00', '2024-05-31', 'Pending');

-- ... (Add 7 more appointments)



-- Example feedback entries with varying references
INSERT INTO Feedback (patient_id, doctor_id, clinic_id, rating, comment)
VALUES (1, 1, 1, 5, 'Excellent consultation, Dr. Lee was very thorough.');

INSERT INTO Feedback (patient_id, doctor_id, clinic_id, rating, comment)
VALUES (2, 2, 2, 4, 'Great experience at Smile Dental Clinic! Friendly staff.');

INSERT INTO Feedback (patient_id, doctor_id, clinic_id, rating, comment)
VALUES (3, NULL, 1, 3, 'The appointment scheduling process could be improved.');  -- General feedback about Clinic 1

INSERT INTO Feedback (patient_id, doctor_id, clinic_id, rating, comment)
VALUES (4, 4, NULL, 5, 'Dr. Brown is a fantastic dermatologist!');  -- Feedback for Dr. Brown (doctor_id 4)

INSERT INTO Feedback (patient_id, doctor_id, clinic_id, rating, comment)
VALUES (5, NULL, NULL, 4, 'Overall satisfied with the clinic services.');  -- General feedback

INSERT INTO Feedback (patient_id, doctor_id, clinic_id, rating, comment)
VALUES (6, 1, 3, 5, 'Dr. Lee is very knowledgeable and helpful.');  -- Feedback for Dr. Lee (doctor_id 1) at Clinic 3

INSERT INTO Feedback (patient_id, doctor_id, clinic_id, rating, comment)
VALUES (7, 5, 4, 4, 'Would recommend Dr. Miller for orthopedic care.');  -- Feedback for Dr. Miller (doctor_id 5) at Clinic 4

-- Add 8 more feedbacks following the same format

INSERT INTO Feedback (patient_id, doctor_id, clinic_id, rating, comment)
VALUES (8, NULL, 2, 3, 'Waiting times at the clinic can be long.');  -- General feedback about Clinic 2

-- Add 8 more feedbacks following the same format (continuing from previous snippet)

INSERT INTO Feedback (patient_id, doctor_id, clinic_id, rating, comment)
VALUES (9, NULL, NULL, 5, 'The online appointment booking system is very convenient.');  -- General feedback

INSERT INTO Feedback (patient_id, doctor_id, clinic_id, rating, comment)
VALUES (1, 3, 1, 4, 'Dr. Williams could be more punctual with appointments.');  -- Feedback for Dr. Williams (doctor_id 3) at Clinic 1

INSERT INTO Feedback (patient_id, doctor_id, clinic_id, rating, comment)
VALUES (3, NULL, 5, 3, 'The clinic facilities could be more modern.');  -- General feedback about Clinic 5

INSERT INTO Feedback (patient_id, doctor_id, clinic_id, rating, comment)
VALUES (2, 4, NULL, 5, 'Dr. Brown is a great listener and addresses all concerns.');  -- Feedback for Dr. Brown (doctor_id 4)

INSERT INTO Feedback (patient_id, doctor_id, clinic_id, rating, comment)
VALUES (4, NULL, 3, 5, 'The clinic staff is very friendly and helpful.');  -- General feedback about Clinic 3

INSERT INTO Feedback (patient_id, doctor_id, clinic_id, rating, comment)
VALUES (5, 1, NULL, 4, 'Would appreciate more follow-up after appointments with Dr. Lee.');  -- Feedback for Dr. Lee (doctor_id 1)

INSERT INTO Feedback (patient_id, doctor_id, clinic_id, rating, comment)
VALUES (4, 2, 2, 5, 'Very professional and efficient service at Smile Dental Clinic.');  -- Feedback for Dr. (doctor_id 2) at Smile Dental Clinic (clinic_id 2)

