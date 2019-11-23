<?php
include("koneksi.php");

/* JSON - Uncomment untuk report dengan format XML */
require_once("JSON/report.php");
require_once('JSON/functions.php');

/* XML - Uncomment untuk report dengan format XML */
// require_once("XML/report.php");
// require_once("XML/functions.php");

$nama = isset($_GET["nama"]) ? $_GET["nama"] : null;
$alamat = isset($_GET["alamat"]) ? $_GET["alamat"] : null;
$nim = isset($_GET["nim"]) ? $_GET["nim"] : null;
$fungsi = isset($_GET["fungsi"]) ? $_GET["fungsi"] : null;


/* Log Script */
include("log.php");

if(strtolower($fungsi) == "tambah")
{
    tambahMahasiswa($nim, $nama, $alamat);
} elseif (strtolower($fungsi) == 'tampil') {
    tampilMahasiswa($nim);
} elseif (strtolower($fungsi) == 'tampilsemua') {
    semuaMahasiswa(); /* Tambah function menampilkan semua mahasiswa */
} else {
    noAkses();
}

function noAkses() {
    $function = new functions();
    $report = new report();
    $iderror = "010";
    $keterangan = "Fungsi FAILED";
    $noref = $function->getNoRef();
    $repxml = $report->noAkses($noref, $iderror, $keterangan);
    echo $repxml;
}

function tambahMahasiswa($nim, $nama, $alamat) {
    $function = new functions();
    $report = new report();
    $ceksiswa = $function->cek_mahasiswa($nim);
    $noref = $function->getNoRef();
    if($ceksiswa == 0){
        $function->tambah_mahasiswa($nim, $nama, $alamat);
        $iderror = "000";
        $keterangan = "Sukses";
    } else {
        $iderror = "001";
        $keterangan = "Failed, Data Sudah Ada";
    }
    $repxml = $report->tambahMahasiswa($nim, $noref, $iderror, $keterangan);
    echo $repxml;
}

function tampilMahasiswa($nim) {
    $function = new functions();
    $report = new report();
    $ceksiswa = $function->cek_mahasiswa($nim);
    $noref = $function->getNoRef();
    if($ceksiswa == 1){
        $iderror = "000";
        $keterangan = "Sukses";
    } else {
        $iderror = "002";
        $keterangan = "Failed, Data Tidak Ditemukan";
    }
    $repxml = $report->tampilMahasiswa($nim, $noref, $iderror, $keterangan);
    echo $repxml;
}

// function Hanya untuk JSON
function semuaMahasiswa() {
    $function = new functions();
    $report = new report();
    $iderror = "000";
    $keterangan = "Sukses";
    $noref = $function->getNoRef();
    $printrep = $report->tampilSemuaMahasiswa($iderror, $noref, $keterangan);
    echo $printrep;
}
?>