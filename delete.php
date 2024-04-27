<?php
include 'koneksi.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM mahasiswa WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        echo "Data berhasil dihapus!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    header("Location: home.php");
    exit();
} else {
    echo "Parameter ID tidak ditemukan.";
    exit();
}
?>
