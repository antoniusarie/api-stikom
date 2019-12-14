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

    function get_saldo()
    {   
        $saldo = 0;
        global $conn; // mencari variabel secara global diluar scope function
        $sql = "SELECT sisa FROM akutansi ORDER BY nid DESC LIMIT 1";
        $query = mysqli_query($conn, $sql);
        while ($data = mysqli_fetch_array($query)) {
            $saldo = $data["sisa"];
        }
        return $saldo;
    } 
    
    function get_data()
    {
        global $conn; // mencari variabel secara global diluar scope function
        $sql = "SELECT * FROM akutansi ORDER BY nid DESC LIMIT 1";
        $query = mysqli_query($conn, $sql);
        while ($data = mysqli_fetch_array($query)) {

        // While JSON
            $item[] = array(
                'nid' => $data["nid"],
                'keterangan' => $data["keterangan"],
                'tambah' => $data["tambah"],
                'kurang' => $data["kurang"],
                'sisa' => $data["sisa"],
            );
            return $item;    
        }
    }
    
    function addtrx($nominal, $deskripsi, $sisa)
    {
        global $conn; // mencari variabel secara global diluar scope function
        $sql = "INSERT INTO akutansi(tambah, keterangan, kurang, sisa) VALUES('$nominal', '$deskripsi', 0, '$sisa')";
        mysqli_query($conn, $sql);
    }

    function mintrx($nominal, $deskripsi, $sisa)
    {
        global $conn; // mencari variabel secara global diluar scope function
        $sql = "INSERT INTO akutansi(kurang, keterangan, tambah, sisa) VALUES('$nominal', '$deskripsi', 0, '$sisa')";
        mysqli_query($conn, $sql);
    }
}
?>