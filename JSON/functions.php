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

    function get_sum_trx()
    {   
        global $conn; // mencari variabel secara global diluar scope function
        $sql = "SELECT SUM(kurang) as debet, SUM(tambah) as kredit FROM akutansi";
        $query = mysqli_query($conn, $sql);
        while ($data = mysqli_fetch_array($query)) {
            $item[] = array(
                // $total_debet = $data["debet"];
                // $total_kredit = $data["kredit"];
                'TOTAL DEBET' => $data['debet'],
                'TOTAL KREDIT' => $data['kredit'],
            );
        }
        // return $total_debet .'|'. $total_kredit; 
        return $item;
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
            return $item; // didalam bracket while -> result query hanya 1 row
        }
    }

    function alltrx()
    {
        global $conn; // mencari variabel secara global diluar scope function
        $sql = "SELECT * FROM akutansi ORDER BY nid ASC";
        $query = mysqli_query($conn, $sql);
        while ($data = mysqli_fetch_array($query)) {

        // While JSON
            $item[] = array(
                'NO' => $data["nid"],
                'DESKRIPSI' => $data["keterangan"],
                'KREDIT' => $data["tambah"],
                'DEBET' => $data["kurang"],
                'SALDO' => $data["sisa"]
            );
        }
        return $item; // diluar bracket while -> result query semua row (looping array $data)
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