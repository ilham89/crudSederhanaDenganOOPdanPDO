<?php
class library
{
    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=crud_pdo', 'root', '');
    }

    public function addBook($kode, $judul, $pengarang, $penerbit)
    {
        $sql = "INSERT INTO buku (kodeBuku ,judulBuku , pengarang, penerbit) VALUES ('$kode', '$judul', '$pengarang', '$penerbit')";
        $query = $this->db->query($sql);
        if (!$query) {
            return "Gagal";
        } else {
            return "Berhasil";
        }
    }


    public function editBook($kode){
        $sql = "SELECT * FROM buku WHERE kodeBuku = '$kode'";
        $query = $this->db->query($sql);
        return $query;
    }


    public function updateBook($kode,$judul,$pengarang,$penerbit){
        $sql="UPDATE buku SET judulBuku ='$judul',pengarang ='$pengarang',penerbit='$penerbit' WHERE kodeBuku ='$kode'";
        $query = $this->db->query($sql);
        if(!$query){
            return "Gagal";
        } else{
            return "Berhasil";
        }
    }

    public function showBook(){
        $sql = "SELECT * FROM buku";
        $query = $this->db->query($sql);
        return $query;
    }

    public function deleteBook($kode){
        $sql = "DELETE FROM buku WHERE kodeBuku ='$kode'";
        $query = $this->db->query($sql);
    }
}
