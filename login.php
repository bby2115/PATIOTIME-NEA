<?php
session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Username dhe password i adminit
    $admin_username = "admin";
    $admin_password = "Patiotime2026!";

    if ($username === $admin_username && $password === $admin_password) {
        $_SESSION['admin_id'] = 1;
        $_SESSION['admin_username'] = $username;

        header("Location: admin.php");
        exit();
    } else {
        $error = "Username ose password i gabuar.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login - PatioTime</title>

    <style>
        body {
            font-family: Georgia, serif;
            background: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-box {
            background: white;
            padding: 35px;
            width: 350px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.15);
            border-radius: 8px;
            text-align: center;
        }

        h2 {
            color: #f45d01;
            margin-bottom: 25px;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #f45d01;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 15px;
        }

        button:hover {
            background: #d94f00;
        }

        .error {
            color: red;
            margin-top: 15px;
        }
    </style>
</head>

<body>

<div class="login-box">
    <h2>Admin Login</h2>

    <form method="POST" action="">
        <input type="text" name="username" placeholder="Username" required>

        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Hyr</button>
    </form>

    <?php if ($error != ""): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>
</div>

</body>
</html>