<?php
session_start(); 
include("db.php"); // Ensure 'db.php' has a proper connection setup.

if (isset($_POST['submit'])) {
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = trim($_POST['password']);

    // Validate email
    $emailValidation = validateEmail($email);
    if ($emailValidation !== true) {
        echo '<script>alert("' . $emailValidation . '");</script>';
        exit();
    }

    // Validate password
    $passwordValidation = validatePassword($password);
    if ($passwordValidation !== true) {
        echo '<script>alert("' . $passwordValidation . '");</script>';
        exit();
    }

    // Query the database if validations pass
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    if (!$stmt) {
        die("SQL error: " . $conn->error); // Debug if the query fails.
    }
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $users= $result->fetch_assoc();
    
        // Debugging: Check what the stored password hash looks like
        echo $password . " - Stored Hash: " . $users['password']; // (Remove in production)

        if (password_verify($password, $users['password'])) {
            // Store user data in session
            $_SESSION['users_password'] = $users['password'];
            $_SESSION['users_email'] = $users['email'];

            header("location:http://localhost/govapphelper/index.php");
            exit();
        } else {
            echo '<script>alert("Incorrect password!");</script>';
        }
    } else {
        echo '<script>alert("Email not found!");</script>';
    }

    // Cleanup
    $stmt->close();
    $conn->close();
}

// Email validation function
function validateEmail($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Invalid email format.";
    }
    if (strlen($email) > 255) {
        return "Email is too long.";
    }
    return true;
}

// Password validation function
function validatePassword($password) {
    if (strlen($password) < 8) {
        return "Password must be at least 8 characters long.";
    }
    if (!preg_match('/[A-Z]/', $password)) {
        return "Password must contain at least one uppercase letter.";
    }
    if (!preg_match('/[a-z]/', $password)) {
        return "Password must contain at least one lowercase letter.";
    }
    if (!preg_match('/[0-9]/', $password)) {
        return "Password must contain at least one number.";
    }
    if (!preg_match('/[\W]/', $password)) {
        return "Password must contain at least one special character.";
    }
    return true;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f8f9;
            background-size: cover;
            font-family: Arial, sans-serif;
        }
        .login-container {
            margin-top: 100px;
            padding: 20px;
            max-width: 320px;
            background-color: #062340;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
        }
        .text-center{
            color:#f4f8f9;
        }
        .mt-3{
            color:#f4f8f9;  
        }
        .form-label{
            color:#f4f8f9;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center">
        <div class="login-container">
            <h2 class="text-center mb-4">Login</h2>
            <form action="login.php" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" required placeholder="Enter your email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required placeholder="Enter your password">
                </div>
                <button type="submit" name="submit" class="btn btn-primary w-100">Login</button>
                <p class="mt-3">Don't have an account? <a href="register.php">Register here</a></p>
            </form>
        </div>
    </div>

    
</body>
</html>
