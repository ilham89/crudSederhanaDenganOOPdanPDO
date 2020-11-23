<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD-PDO</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="bootstrap.min.js"></script>
</head>
<body>
    <?php 
    require 'library.php';
    if (isset($_GET['kode'])){
    $lib = new library();
    $book = $lib->editBook($_GET['kode']);
    $edit = $book->fetch(PDO::FETCH_OBJ);
    echo '
        <div class="container mt-2">
            <h2>Ubah Data Buku</h2>
            <form action="edit.php" method="POST" class="form-group row">
                Kode buku : <input type="text" name="kode" value="'.$edit->kodeBuku.'" class="form-control"><br>
                Judul buku : <input type="text" name="judul" value="'.$edit->judulBuku.'" class="form-control"><br>
                Pengarang buku : <input type="text" name="pengarang" value="'.$edit->pengarang.'" class="form-control"><br>
                Penerbit buku : <input type="text" name="penerbit" value="'.$edit->penerbit.'" class="form-control">
                <div class="tombol mt-3">
                    <input type="submit" name="updateBook" value="Update" class="btn btn-primary mr-4">
                </div>
            </form>
        </div>';
    }


    if(isset($_POST['updateBook'])){
        $kode = $_POST['kode'];
        $judul = $_POST['judul'];
        $pengarang = $_POST['pengarang'];
        $penerbit = $_POST['penerbit'];

        $lib = new library();
        $upd = $lib->updateBook($kode,$judul,$pengarang,$penerbit);

        if($upd == "Berhasil"){
            header('Location: list.php');
        }
    }
    ?>
</body>
</html>