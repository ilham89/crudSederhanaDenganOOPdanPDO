<html>

<head>
    <title>CRUD-PDO</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="bootstrap.min.js"></script>
</head>

<body>
    <div class="container mt-2">
        <h2>Tambah Buku Baru</h2>
        <form action="index.php" method="POST" class="form-group row">
            Kode buku : <input type="text" name="kode" class="form-control"><br>
            Judul buku : <input type="text" name="judul" class="form-control"><br>
            Pengarang buku : <input type="text" name="pengarang" class="form-control"><br>
            Penerbit buku : <input type="text" name="penerbit" class="form-control">
            <div class="tombol mt-3">
                <input type="submit" name="addBook" value="Add Book" class="btn btn-primary mr-4">
                <input type="reset" value="reset" class="btn btn-danger">
            </div>
        </form>
    </div>
</body>

</html>
<?php
require("library.php");
if (isset($_POST['addBook'])) {
    $kode = $_POST['kode'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];

    $lib = new library();
    $add = $lib->addBook($kode, $judul, $pengarang, $penerbit);

    if ($add == "Berhasil") {
        header('Location: list.php');
    }
}
?>