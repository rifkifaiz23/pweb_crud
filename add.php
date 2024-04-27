<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'koneksi.php';

$status = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];
    $jurusan = $_POST['jurusan'];

    $sql = "INSERT INTO mahasiswa (nama, tanggal_lahir, alamat, jurusan) VALUES ('$nama', '$tanggal_lahir', '$alamat', '$jurusan')";

    if (mysqli_query($conn, $sql)) {
        $status = "Data berhasil ditambahkan!";
        header("Location: home.php");
        exit();
    } else {
        $status = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <style>
        form {
            margin-top: 20px;
        }

        form label {
            display: block;
            margin-bottom: 5px;
        }

        form input,
        form textarea {
            width: 100%;
            margin-bottom: 10px;
            padding: 5px;
        }

        form button {
            padding: 8px 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        form button:hover {
            background-color: #45a049;
        }

        .status {
            margin-top: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
        }
    </style>
</head>

<body>
    <h2>Form Tambah Data Mahasiswa</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required>
        <label for="tanggal_lahir">Tanggal Lahir:</label>
        <input type="date" id="tanggal_lahir" name="tanggal_lahir" required>
        <label for="alamat">Alamat:</label>
        <textarea id="alamat" name="alamat" required></textarea>
        <label for="jurusan">Jurusan:</label>
        <input type="text" id="jurusan" name="jurusan" required>
        <button type="submit">Tambah Data</button>
    </form>
</body>

</html>
