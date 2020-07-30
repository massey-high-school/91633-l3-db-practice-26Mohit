<?php

// function to 'clean' data
function test_input($data) {
    $data=mysqli_real_escape_string($data);
    $data = trim($data);
    $data = htmlspecialchars($data); // needed for correct special character rendering
    return $data;
    
}

?>