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

if (isset($_POST['update_profile'])) {
    $newUsername = $_POST['username'];
    $newDescription = $_POST['description'];

    // Perbarui data pengguna dalam database
    $updateQuery = "UPDATE users SET username = '$newUsername', description = '$newDescription' WHERE username = '$username'";
    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        $_SESSION['username'] = $newUsername; // Update session dengan username baru
        $row['username'] = $newUsername; // Update data pengguna yang ditampilkan
        $row['description'] = $newDescription;
        $successMessage = "Profile updated successfully!";
        header("Location: profile.php");
    } else {
        $errorMessage = "Error updating profile: " . mysqli_error($conn);
    }
}
?>

<?php include_once 'header.php'; ?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title mb-4">Profile</h2>
                    <?php if (isset($successMessage)) : ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $successMessage; ?>
                        </div>
                    <?php endif; ?>
                    <?php if (isset($errorMessage)) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $errorMessage; ?>
                        </div>
                    <?php endif; ?>
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo $row['username']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description"><?php echo $row['description']; ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="update_profile">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once 'footer.php'; ?>
