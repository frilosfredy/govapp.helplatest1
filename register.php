<?php
include("db.php");

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

    // Check if email already exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo '<script>alert("Email already exists!")</script>';
    } else {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare and execute the insert statement
        $insertStmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
        $insertStmt->bind_param("ss", $email, $hashedPassword);

        if ($insertStmt->execute()) {
            header("Location: login.php");
            exit();
        } else {
            echo '<script>alert("Registration failed!")</script>';
        }
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
    <title>Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color:#f4f8f9;
            background-size: cover;
            font-family: Arial, sans-serif;
        }
        .register-container {
            margin-top: 100px;
            padding: 20px;
            width: 320px;
            background-color: #062340;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
            color:aliceblue;
            
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
    <div class="register-container">
        <h2 class="text-center mb-4">Register</h2>
        <form action="register.php" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" required placeholder="Enter your email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required placeholder="Enter your password">
            </div>
            <button type="submit" name="submit" class="btn btn-primary w-100">Register</button>
            <p class="mt-3">Have an account? <a href="login.php">Login here</a></p>
        </form>
    </div>
</div>
</body>
</html>
