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
  
    function cek_mahasiswa($nim)
    {
        global $conn; // mencari variabel secara global diluar scope function
        $sql = "SELECT COUNT(*) jumlah FROM mahasiswa WHERE nim = '$nim'";
        $query = mysqli_query($conn, $sql);
        while ($data = mysqli_fetch_array($query)) {
            $rowdata = $data["jumlah"];
        }
        return $rowdata;
    }

    function tambah_mahasiswa($nim, $nama, $alamat)
    {
        global $conn; // mencari variabel secara global diluar scope function
        $sql = "INSERT INTO mahasiswa(nim, nama, alamat) VALUES('$nim', '$nama', '$alamat')";
        mysqli_query($conn, $sql);
    }
    

    function get_data_mahasiswa($nim)
    {
        global $conn; // mencari variabel secara global diluar scope function
        $sql = "SELECT nim, nama, alamat FROM mahasiswa WHERE nim = '$nim'";
        $query = mysqli_query($conn, $sql);
        while ($data = mysqli_fetch_array($query)) {

        // While JSON
            $item[] = array(
                'nim' => $data["nim"],
                'nama' => $data["nama"],
                'alamat' => $data["alamat"],
            );
        }
        return $item;
    }
        
    function get_semua_mahasiswa()
    {
        global $conn; // mencari variabel secara global diluar scope function
        $sql = "SELECT nim, nama, alamat FROM mahasiswa";
        $query = mysqli_query($conn, $sql);
        while($data = mysqli_fetch_array($query)) {
            
        // While JSON
            $item[] = array(
                'nim' => $data["nim"],
                'nama' => $data["nama"],
                'alamat' => $data["alamat"],
            );
        }
        return $item;
    }
}
?>