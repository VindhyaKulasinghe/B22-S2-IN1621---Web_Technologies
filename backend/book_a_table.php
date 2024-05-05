<?php
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    if (!validateFormData($_POST)) {
        http_response_code(400);
        exit("Validation failed");
    }

    $company = $_POST['Company'];
    $contact_name = $_POST['name'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $count = $_POST['count'];
    $text= $_POST['text'];
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO reservation (company, name, email, date, time, count, text) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $company, $contact_name, $email, $date, $time, $count, $text);

    if ($stmt->execute()) {
        http_response_code(200);
        exit("Form submitted successfully!");
    } else {
        http_response_code(500);
        exit("Error: " . $conn->error);
    }
    $stmt->close();
}
    
$conn->close();
    
function validateFormData($data)
{
    return true;
}
?>
