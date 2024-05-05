<?php

function validateFormData($formData)
{
    $errors = [];

    // Validate each form field
    if (empty($formData['company'])) {
        $errors['company'] = 'Company name is required.';
    }
    if (empty($formData['contact-name'])) {
        $errors['contact-name'] = 'Contact name is required.';
    }
    // Add more validation rules for other fields as needed

    return $errors;
}

?>
