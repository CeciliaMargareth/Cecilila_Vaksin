<?php
include_once '../config.php';

$query = "SELECT * FROM vaksin";
$result = mysqli_query($conn, $query);
?>

<?php include_once 'header.php'; ?>
<style media="screen">
    .kanan {
        margin-right: 10px;
    }

    .table {
        border-radius: 5px;
        overflow: hidden;
    }

    .table thead {
        background-color: #f8f9fa;
    }

    .table th,
    .table td {
        padding: 12px 15px;
        border-bottom: 1px solid #dee2e6;
    }

    .table tbody tr:last-child td {
        border-bottom: none;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f8f9fa;
    }

    .table tbody tr:hover {
        background-color: #e9ecef;
    }

    .btn-group-sm .btn {
        font-size: 14px;
        padding: 4px 10px;
    }
</style>
<h2>Data Vaksin</h2>
<a href="create.php" class="btn btn-primary mb-3">Tambah data Vaksin</a>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Manufacturer</th>
                <th scope="col">Jenis Vaksin</th>
                <th scope="col">Jadwal Vaksin</th>
                <th scope="col">Lokasi Vaksinasi</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
                $i = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<th scope='row'>" . $i . "</th>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['manufacturer'] . "</td>";
                    echo "<td>" . $row['jenis_vaksin'] . "</td>";
                    echo "<td>" . $row['jadwal_vaksin'] . "</td>";
                    echo "<td>" . $row['lokasi_vaksinasi'] . "</td>";
                    echo "<td>
                        <div class='btn-group btn-group-sm' role='group'>
                            <a href='edit.php?id=" . $row['id'] . "' class='btn btn-primary kanan'>Edit</a>
                            <a href='delete.php?id=" . $row['id'] . "' class='btn btn-danger'>Delete</a>
                        </div>
                    </td>";
                    echo "</tr>";

                    $i++;
                }
            } else {
                echo "<tr><td colspan='7'>No vaccines found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include_once 'footer.php'; ?>
