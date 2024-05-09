<?php
// Include the necessary libraries
require '../fpdf186/fpdf.php'; // Include Composer's autoloader
//require_once '../Models/pdf.php';

// Instantiate and use the FPDF class 
$pdf = new FPDF(); 

// Define alias for number of pages 
$pdf->AliasNbPages(); 
$pdf->AddPage(); 
$pdf->SetFont('times', '', 12);
$pdf->MultiCell(0, 10, "Patient Information:
    - Name: John Doe
    - Date of Birth: January 15, 1980
    - Gender: Male
    - Blood Type: A+
    - Height: 180 cm
    - Weight: 80 kg
    - Allergies: None
    
    Chief Complaint:
    - Persistent cough and occasional shortness of breath for two weeks.
    
    History of Present Illness:
    - Symptoms started with a mild cough, gradually worsening.
    - Reports occasional wheezing and chest tightness, especially during physical activity or cold exposure.
    - No fever, chills, or night sweats.
    
    Past Medical History:
    - Hypertension (controlled with medication).
    - Seasonal allergies to pollen (managed with antihistamines).
    
    Medications:
    - Lisinopril 10 mg once daily for hypertension.
    - Loratadine 10 mg once daily as needed for allergies.
    
    Family History:
    - Father: Hypertension.
    - Mother: Diabetes.
    - Brother: Asthma.
    
    Social History:
    - Non-smoker, no alcohol or substance abuse.
    - Works as a software engineer, sedentary lifestyle.
    - Lives alone, no pets.
    
    Review of Systems:
    - Respiratory: Cough, dyspnea on exertion.
    - Cardiovascular: No chest pain, palpitations, or edema.
    - Gastrointestinal: No abdominal pain, nausea, or vomiting.
    - Neurological: No headaches, dizziness, or numbness.
    
    Physical Examination:
    - General: Alert and oriented, no acute distress.
    - Vital Signs: Blood pressure 130/80 mmHg, pulse 72 bpm, respiratory rate 18 bpm, temperature 98.6°F.
    - Respiratory: Clear to auscultation bilaterally, mild expiratory wheezing.
    - Cardiovascular: Regular rate and rhythm, no murmurs or gallops.
    - Abdomen: Soft, non-tender, non-distended, normoactive bowel sounds.
    - Extremities: No edema, full range of motion.
     ", 0, 'J');

$pdf->Output(); 

?>
<html>



</html>