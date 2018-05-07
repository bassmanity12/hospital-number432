<?php
    echo '<br />Submitted Data<hr />';
    var_dump($_POST);

    echo ('<br />');
    $postedData = $_POST['data'];

    if (isset($_POST['firstName'])) {
        $firstname = $_POST['firstName'];
    }
    if (isset($_POST['lastName'])) {
        $lastname = $_POST['lastName'];
    }
    if (isset($_POST['inputEmail'])) {
        $address = $_POST['inputEmail'];
    }
    if (isset($_POST['inputZipCode'])) {
        $city = $_POST['inputZipCode'];
    }
    if (isset($_POST['inputCity'])) {
        $city = $_POST['inputCity'];
    }
    if (isset($_POST['form-check'])) {
        $submit = $_POST['form-check'];
    }
    if (isset($_POST['submit'])) {
        $submit = $_POST['submit'];
    }
   
    $data = $_POST['data'];
    $serializedData = serialize($data);

    // write
    $handle = fopen(__DIR__ . '/data.dat', 'w');
    fwrite($handle, $serializedData);
    fclose($handle);

    // get the file content
    $string = file_get_contents(__DIR__ . '/data.dat');
    $data = unserialize($string); // unserialize it
    $output = '';
    foreach ($data as $key => $value) {
        $field = ucwords($key); // make first letter of each word uppercase
        $output .= "$field: $value" . '<br>';
    }
    echo $output;