<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Mahasiswa</title>
</head>
<body>
    <h2>Update Data Mahasiswa</h2>
    <form method="post" action="">
        <label>Nama:</label><br>
        <input type="text" name="nama" value="<?php echo $nama; ?>" required><br>
        <label>Tanggal Lahir:</label><br>
        <input type="date" name="tanggal_lahir" value="<?php echo $tanggal_lahir; ?>" required><br>
        <label>Alamat:</label><br>
        <textarea name="alamat" required><?php echo $alamat; ?></textarea><br>
        <label>Jurusan:</label><br>
        <input type="text" name="jurusan" value="<?php echo $jurusan; ?>" required><br><br>
        <button type="submit" href="crud.php">Update</button>
    </form>
</body>
</html>

<?php
include 'koneksi.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM mahasiswa WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $nama = $row['nama'];
        $tanggal_lahir = $row['tanggal_lahir'];
        $alamat = $row['alamat'];
        $jurusan = $row['jurusan'];
    } else {
        echo "Data tidak ditemukan.";
        exit();
    }
} else {
    echo "Parameter ID tidak ditemukan.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];
    $jurusan = $_POST['jurusan'];

    $sql = "UPDATE mahasiswa SET nama='$nama', tanggal_lahir='$tanggal_lahir', alamat='$alamat', jurusan='$jurusan' WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        echo "Data berhasil diupdate!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    header("Location: home.php");
    exit();
}
?>
