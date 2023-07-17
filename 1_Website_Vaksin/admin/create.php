<?php
include_once '../config.php';

if (isset($_POST['create'])) {
    $name = $_POST['name'];
    $manufacturer = $_POST['manufacturer'];
    $jenis_vaksin = $_POST['jenis_vaksin'];
    $jadwal_vaksin = $_POST['jadwal_vaksin'];
    $lokasi_vaksinasi = $_POST['lokasi_vaksinasi'];
    // Lakukan validasi data

    $query = "INSERT INTO vaksin (name, manufacturer, jenis_vaksin, jadwal_vaksin, lokasi_vaksinasi) VALUES ('$name', '$manufacturer', '$jenis_vaksin', '$jadwal_vaksin', '$lokasi_vaksinasi')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>


<?php include_once 'header.php'; ?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title mb-4">Tambah Data Vaksin</h2>
                    <form method="POST" action="">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="name" name="name" required>
                            <label for="name">Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="manufacturer" name="manufacturer" required>
                            <label for="manufacturer">Manufacturer</label>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenis Vaksin</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_vaksin" id="sinovac" value="Sinovac" required>
                                <label class="form-check-label" for="sinovac">Sinovac</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_vaksin" id="pfizer" value="Pfizer" required>
                                <label class="form-check-label" for="pfizer">Pfizer</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_vaksin" id="moderna" value="Moderna" required>
                                <label class="form-check-label" for="moderna">Moderna</label>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="jadwal_vaksin" name="jadwal_vaksin" required>
                            <label for="jadwal_vaksin">Jadwal Vaksin</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="lokasi_vaksinasi" name="lokasi_vaksinasi" required>
                            <label for="lokasi_vaksinasi">Lokasi Vaksinasi</label>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary" name="create">Add</button>
                            <a class="btn btn-outline-primary" href="index.php" role="button">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once 'footer.php'; ?>
