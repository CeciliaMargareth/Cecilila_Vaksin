<?php
include_once '../config.php';

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    // Lakukan validasi data

    $role = 'user'; // Peran default adalah 'user'

    $query = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

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
        .container {
            max-width: 400px;
        }
        .form-title {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <h2 class="form-title">Register</h2>
                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary" name="register">Register</button>
                    </div>
                    <div class="mt-3 d-grid">
                      <a class="btn btn-outline-primary" href="login.php" role="button">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include_once 'footer.php'; ?>
</body>
</html>
