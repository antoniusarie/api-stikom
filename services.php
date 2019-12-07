<?php
include("koneksi.php");

require_once("report.php");
require_once('functions.php');

/* Method POST atau PHP - Uncomment sesuai kebutuhan */
$method = "POST";
// $method = "GET";

/* Report JSON atau XML - Uncomment sesuai kebutuhan */
$option = "JSON";
// $option = "XML";

/* Jika variabel $method dipilih "POST" maka Method POST dipilih, jika bukan maka Method XML dipilih */
if($method == "POST") 
{
    /* Method POST */
    $data = trim(file_get_contents("php://input"));
    // $cdata = preg_replace("/&#?[a-z0-9]+;/i","", json_decode($data, true), true);
    $cdata = json_decode($data, true);

    foreach ($cdata as $key => $item) {
        if(strtolower($key) == "function") {
            $fungsi = $item;
        } 
        if(strtolower($key) == "nis") {
            $nis = $item;
        } 
        if(strtolower($key) == "nama") {
            $nama = $item;
        } 
        if(strtolower($key) == "alamat") {
            $alamat = $item;
        } 
    }
} else {
    // /* Method  GET */
    $nama = isset($_GET["nama"]) ? $_GET["nama"] : null;
    $alamat = isset($_GET["alamat"]) ? $_GET["alamat"] : null;
    $nis = isset($_GET["nis"]) ? $_GET["nis"] : null;
    $fungsi = isset($_GET["fungsi"]) ? $_GET["fungsi"] : null;
}

/* Log Script */
include("log.php");

if(strtolower($fungsi) == "register")
{
    register($nis, $nama, $alamat, $option);
} elseif (strtolower($fungsi) == 'viewsiswa') {
    viewSiswa($nis, $option);
} elseif (strtolower($fungsi) == 'listsiswa') {
    /* Tambah function menampilkan semua siswa */
    listSiswa($option); 
} else {
    noAkses($option);
}

function noAkses($option) {
    $function = new functions();

    if($option == "JSON")
    {
        $report = new reportJSON();
    } else {
        $report = new reportXML();
    }

    $iderror = "010";
    $keterangan = "Fungsi FAILED";
    $noref = $function->getNoRef();

    echo $report->noAkses($noref, $iderror, $keterangan);
}

/* Tambah Siswa by nis, nama dan alamat */
function register($nis, $nama, $alamat, $option) {
    $function = new functions();

    /* Jika variabel $option dipilih "JSON" maka $report nya menjadi reportJSON() jika bukan menjadi reportXML(); */
    if($option == "JSON")
    {
        $report = new reportJSON();
    } else {
        $report = new reportXML();
    }

    $ceksiswa = $function->ceksiswa($nis);
    $noref = $function->getNoRef();
    if($ceksiswa == 0){
        $function->tambahSiswa($nis, $nama, $alamat);
        $iderror = "000";
        $keterangan = "Sukses";
    } else {
        $iderror = "001";
        $keterangan = "Failed, Data Sudah Ada";
    }
    echo $report->reportViewSiswa($nis, $noref, $iderror, $keterangan); // Report sama persis seperti reportViewSiswa
}

/* View Siswa by nis */
function viewSiswa($nis, $option) {
    $function = new functions();
    
    /* Jika variabel $option dipilih "JSON" maka $report nya menjadi reportJSON() jika bukan menjadi reportXML(); */
    if($option == "JSON")
    {
        $report = new reportJSON();
    } else {
        $report = new reportXML();
    }
    
    $ceksiswa = $function->cekSiswa($nis);
    $noref = $function->getNoRef();
    if($ceksiswa == 1){
        $iderror = "000";
        $keterangan = "Sukses";
    } else {
        $iderror = "002";
        $keterangan = "Failed, Data Tidak Ditemukan";
    }
    echo $report->reportViewSiswa($nis, $noref, $iderror, $keterangan);
}

/* Tampil / List Semua Siswa */
function listSiswa($option) {
    $function = new functions();
    
    /* Jika variabel $option dipilih "JSON" maka $report nya menjadi reportJSON() jika bukan menjadi reportXML(); */
    if($option == "JSON")
    {
        $report = new reportJSON();
    } else {
        $report = new reportXML();
    }
    
    $iderror = "000";
    $keterangan = "Sukses";
    $noref = $function->getNoRef();
    echo $report->reportListSiswa($noref, $iderror, $keterangan);
}
?>