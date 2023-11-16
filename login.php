<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];

    $userData = file_get_contents('user_data.json');
    $users = explode(PHP_EOL, $userData);

    foreach ($users as $user) {
        $fields = json_decode($user, true);
        if ($fields['email'] === $email && password_verify($password, $fields['password'])) {
            // Store user data in session
            $_SESSION['user'] = [
                'name' => $fields['name'],
                'email' => $fields['email'],
                'dob' => $fields['dob'],
                'gender' => $fields['gender'],
                'college' => $fields['college'],
                'phone' => $fields['phone']
                // Add other user details as needed
            ];

            // Set a cookie for user's name
            setcookie('user', $fields['name'], time() + 3600, '/');

            // Redirect to welcome.php
            header("Location: welcome.php");
            exit();
        }
    }

    echo 'Invalid email or password.';
}
?>
