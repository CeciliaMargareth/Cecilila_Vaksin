<?php
session_start();
include_once '../config.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Mengambil data pengguna dari database
$username = $_SESSION['username'];
$query = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

?>

<?php include_once 'header.php'; ?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title mb-4">Profile</h2>
                    <div class="row">
                        <div class="col-sm-4">
                            <img src="../assets/img/user.png" alt="Avatar" class="rounded-circle img-fluid">
                        </div>
                        <div class="col-sm-8">
                            <h4 class="card-subtitle mb-2">Username: <?php echo $_SESSION['username']; ?></h4>
                            <p class="card-text"><?php echo $row['description']; ?></p>
                            <a href="edit_profile.php" class="btn btn-primary">Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once 'footer.php'; ?>
