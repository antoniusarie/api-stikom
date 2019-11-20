<?php

include("koneksi.php");

/* JSON - Uncomment untuk report dengan format XML */
// require_once("JSON/report.php");
// require_once('JSON/functions.php');

/* XML - Uncomment untuk report dengan format XML */
require_once("XML/report.php");
require_once("XML/functions.php");

$nama = isset($_GET["nama"]) ? $_GET["nama"] : null;
$alamat = isset($_GET["alamat"]) ? $_GET["alamat"] : null;
$nis = isset($_GET["nis"]) ? $_GET["nis"] : null;
$fungsi = isset($_GET["fungsi"]) ? $_GET["fungsi"] : null;

/* Log Script */
include("log.php");

if(strtolower($fungsi) == "register")
{
    register($nis, $nama, $alamat);
} elseif (strtolower($fungsi) == 'viewsiswa') {
    viewSiswa($nis);
} elseif (strtolower($fungsi) == 'semuasiswa') {
    allSiswa(); /* Tambah function menampilkan semua siswa (hanya JSON) */
} else {
    noAkses();
}

function noAkses() {
    $func = new functions();
    $report = new report();
    $iderror = "010";
    $keterangan = "Fungsi FAILED";
    $noref = $func->getNoRef();
    $repxml = $report->reportNoAkses($noref, $iderror, $keterangan);
    echo $repxml;
}

function register($nis, $nama, $alamat) {
    $func = new functions();
    $report = new report();
    $ceksiswa = $func->ceksiswa($nis);
    $noref = $func->getNoRef();
    if($ceksiswa == 0){
        $func->tambahsiswa($nis, $nama, $alamat);
        $iderror = "000";
        $keterangan = "Sukses";
    } else {
        $iderror = "001";
        $keterangan = "Failed, Data Sudah Ada";
    }
    $repxml = $report->reportTambahSiswa($nis, $noref, $iderror, $keterangan);
    echo $repxml;
}

function viewSiswa($nis) {
    $func = new functions();
    $report = new report();
    $ceksiswa = $func->ceksiswa($nis);
    $noref = $func->getNoRef();
    if($ceksiswa == 1){
        $iderror = "000";
        $keterangan = "Sukses";
    } else {
        $iderror = "002";
        $keterangan = "Failed, Data Tidak Ditemukan";
    }
    $repxml = $report->reportViewSiswa($nis, $noref, $iderror, $keterangan);
    echo $repxml;
}

// Function Hanya untuk JSON
function allSiswa() {
    $func = new functions();
    $report = new report();
    $iderror = "000";
    $keterangan = "Sukses";
    $noref = $func->getNoRef();
    $repjson = $report->reportViewAllSiswa($iderror, $noref, $keterangan);
    echo $repjson;
}
?>