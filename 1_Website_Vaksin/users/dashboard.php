<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if ($_SESSION['role'] == 'admin') {
    header("Location: ../admin/index.php");
    exit();
}
?>

<?php include_once 'header.php'; ?>

<h2>Welcome, <?php echo $_SESSION['username']; ?></h2>

<?php include_once 'footer.php'; ?>
