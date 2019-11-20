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

    function ceksiswa($nis)
    {
        global $conn; // mencari variabel secara global diluar scope function
        $sql = "SELECT COUNT(*) jumlah FROM siswa WHERE nis = '$nis'";
        $query = mysqli_query($conn, $sql);
        while ($data = mysqli_fetch_array($query)) {
            $rowdata = $data["jumlah"];
        }
        return $rowdata;
    }

    function tambahsiswa($nis, $nama, $alamat)
    {
        global $conn; // mencari variabel secara global diluar scope function
        $sql = "INSERT INTO siswa(nis, nama, alamat) VALUES('$nis', '$nama', '$alamat')";
        mysqli_query($conn, $sql);
    }

    function getdatasiswa($nis)
    {
        global $conn; // mencari variabel secara global diluar scope function
        $sql = "SELECT nis, nama, alamat FROM siswa WHERE nis = '$nis'";
        $query = mysqli_query($conn, $sql);
        while ($data = mysqli_fetch_array($query)) {

        // While JSON
            $item[] = array(
                'nis' => $data["nis"],
                'nama' => $data["nama"],
                'alamat' => $data["alamat"],
            );
        }
        return $item;
    }
    
    function getsemuasiswa()
    {
        global $conn; // mencari variabel secara global diluar scope function
        $sql = "SELECT nis, nama, alamat FROM siswa";
        $query = mysqli_query($conn, $sql);
        while($data = mysqli_fetch_array($query)) {
            
        // While JSON
            $item[] = array(
                'nis' => $data["nis"],
                'nama' => $data["nama"],
                'alamat' => $data["alamat"],
            );
        }
        return $item;
    }
}
?>