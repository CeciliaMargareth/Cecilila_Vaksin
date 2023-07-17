<?php
session_start();
include_once '../config.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    // Lakukan validasi data

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $row['role']; // Menyimpan peran pengguna ke dalam session

    if ($_SESSION['role'] == 'admin') {
        header("Location: ../admin/index.php");
    } else {
        header("Location: dashboard.php");
    }
    exit();
} else {
    echo "Invalid username or password.";
}

}
?>

<?php # include_once '../templates/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaksin App</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <style>
        .logo {
            height: 70px;
            margin-right: 10px;
        }
    </style>
</head>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <img src="../assets/img/logo.png" alt="Logo" class="logo me-3">
                        <h2 class="card-title mb-0">Login</h2>
                    </div>
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="login">Login</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <p>Don't have an account? <a href="../users/register.php">Register</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
</html>

<?php include_once 'footer.php'; ?>
