<?php
function sanitize($input)
{
    // Trim the input and remove leading/trailing whitespaces
    $trimmedInput = trim($input);

    // Prevent XSS (Cross-Site Scripting) attacks by escaping HTML entities
    $sanitizedInput = htmlspecialchars($trimmedInput, ENT_QUOTES, 'UTF-8');

    return $sanitizedInput;
}
function fetchData($result)
{
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    return $data;
}
