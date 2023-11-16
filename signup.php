<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $college = filter_input(INPUT_POST, 'College', FILTER_SANITIZE_STRING);
    $phone = $_POST['phone'];

    // Set the cache value in the session
    $_SESSION['cache'] = rand(1000, 9999);

    // Validate phone number
    if (!preg_match("/^[0,6,9]{1}[0-9]{9}$/", $phone)) {
        echo 'Invalid phone number format.';
        exit();
    }

    if ($name && $email && strlen($_POST['password']) >= 8) {
        $userData = array(
            "name" => $name,
            "email" => $email,
            "password" => $password,
            "dob" => $dob,
            "gender" => $gender,
            "college" => $college,
            "phone" => $phone
        );

        $json_data = json_encode($userData);
        file_put_contents('user_data.json', $json_data . PHP_EOL, FILE_APPEND);
        header("Location: login.html");
        exit();
    } else {
        echo 'Invalid input or password must be at least 8 characters long.';
    }
}
?>
