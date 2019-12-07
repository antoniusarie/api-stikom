<?php
class functions {

    function getNoRef() 
    {
        $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $random = substr(str_shuffle($char), 16, 32);
        // $random = rand(1000, 9999);
        $noRef = date('Ymdhis').'_'.$random;
        return $noRef;
    }

    function cekSiswa($nis)
    {
        global $conn; // mencari variabel secara global diluar scope function
        $sql = "SELECT COUNT(*) jumlah FROM siswa WHERE nis = '$nis'";
        $query = mysqli_query($conn, $sql);
        while ($data = mysqli_fetch_array($query)) {
            $rowdata = $data["jumlah"];
        }
        return $rowdata;
    }

    function tambahSiswa($nis, $nama, $alamat)
    {
        global $conn; // mencari variabel secara global diluar scope function
        $sql = "INSERT INTO siswa(nis, nama, alamat) VALUES('$nis', '$nama', '$alamat')";
        mysqli_query($conn, $sql);
    }

    function getDataSiswa($nis)
    {
        global $conn; // mencari variabel secara global diluar scope function
        $sql = "SELECT nama, alamat FROM siswa WHERE nis = '$nis'";
        $query = mysqli_query($conn, $sql);
        while ($data = mysqli_fetch_array($query)) {
            $nama = $data["nama"];
            $alamat = $data["alamat"];
        }
        return $nama ."|". $alamat;
    }
    
    function getListSiswa()
    {
        global $conn; // mencari variabel secara global diluar scope function
        $sql = "SELECT nis, nama, alamat FROM siswa";
        $query = mysqli_query($conn, $sql);
        while ($data = mysqli_fetch_array($query)) {
            $result[] = array(
                'nis' => $data["nis"],
                'nama' => $data["nama"],
                'alamat' => $data["alamat"]
            );
        }
        return $result;
    }
    
}
?>