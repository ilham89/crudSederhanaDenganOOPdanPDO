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

    <div class="container mt-3 p-5">

        <a class='btn btn-primary float-right mb-3' href="index.php">Tambah Buku</a>
        <div class="table-responsive-lg">
            <table class="table table-bordered table-hover mt-4 text-center  ">
                <thead class="thead-light">
                    <tr>
                        <td>No</td>
                        <td>Kode</td>
                        <td>Judul</td>
                        <td>Pengarang</td>
                        <td>Penerbit</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <?php 
                    require ("library.php");
                    $lib = new library();
                    $show = $lib->showBook();
                    $i=1;
                    while($data= $show->fetch(PDO::FETCH_OBJ)){
                        echo "
                            <tbody>
                                <tr>
                                    <td>$i</td>
                                    <td>$data->kodeBuku</td>
                                    <td>$data->judulBuku</td>
                                    <td>$data->pengarang</td>
                                    <td>$data->penerbit</td>
                                    <td>
                                        <a class='btn btn-info mr-3' href='edit.php?kode=$data->kodeBuku'>Edit</a>
                                        <a class='btn btn-danger' href='list.php?delete=$data->kodeBuku'>Hapus</a>
                                    </td>
                                </tr>
                            </tbody>";
                            $i++;
                        };
                    ?>
            </table>
        </div>
    </div>
</body>
</html>


<?php 
    if(isset($_GET['delete'])){
        $del= $lib->deleteBook($_GET['delete']);
    }
?>

