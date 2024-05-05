<?php
include 'database.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form data (You can customize this function according to your validation requirements)
    if (!validateFormData($_POST)) {
        http_response_code(400); // Bad request
        exit("Validation failed");
    }

    // If validation passes, continue with database insertion
    $company = $_POST['company'];
    $contact_name = $_POST['contact-name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $business_type = $_POST['business-type'];
    $message = $_POST['message'];

    // Prepare SQL statement
    $sql = "INSERT INTO wholesale_requests (company, contact_name, email, phone, business_type, message) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $company, $contact_name, $email, $phone, $business_type, $message);

    // Execute the statement
    if ($stmt->execute()) {
        http_response_code(200); // Success
        exit("Form submitted successfully!");
    } else {
        http_response_code(500); // Internal server error
        exit("Error: " . $conn->error);
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();

// Function to validate form data (You can customize this function according to your validation requirements)
function validateFormData($data)
{
    // Implement your validation logic here
    return true; // For demonstration, always returning true
}
?>
