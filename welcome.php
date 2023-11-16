<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-200 h-screen flex items-center justify-center">

<div class="bg-white p-8 rounded shadow-md">
    <h2 class="text-2xl font-semibold mb-6">Welcome, <?php echo $_SESSION['user']['name']; ?>!</h2>
    <p>You are now logged in.</p>

    <!-- Display user details -->
    <p>User Details:
        <ul>
            <li>Name: <?php echo $_SESSION['user']['name']; ?></li>
            <li>Email: <?php echo $_SESSION['user']['email']; ?></li>
            <li>Date Of Birth: <?php echo $_SESSION['user']['dob']; ?></li>
            <li>gender: <?php echo $_SESSION['user']['gender']; ?></li>
            <li>college: <?php echo $_SESSION['user']['college']; ?></li>
            <li>Phone number: <?php echo $_SESSION['user']['phone']; ?></li>
            <!-- Add other user details as needed -->
        </ul>
    </p>
</div>

</body>
</html>

