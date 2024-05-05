<?php
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    if (!validateFormData($_POST)) {
        http_response_code(400);
        exit("Validation failed");
    }

    $company = $_POST['company'];
    $contact_name = $_POST['name'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $text= $_POST['count'];
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO your_table_name (name, email, date, time) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $date, $time);

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