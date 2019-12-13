<?php
include("koneksi.php");

/* OPTION */

/* Method POST atau GET - Uncomment sesuai kebutuhan */
// $method = "POST";
$method = "GET";

/* Report JSON atau XML - Uncomment sesuai kebutuhan */
$report = "JSON";
// $report = "XML";

/**************************************** API ***********************************************/

/* HTTP Method */
if($method == "POST") {

    /* Method POST */
    $data = trim(file_get_contents("php://input"));
    // $cdata = preg_replace("/&#?[a-z0-9]+;/i","", json_decode($data, true), true);
    $cdata = json_decode($data, true);
    
    foreach ($cdata as $key => $item) {
        if(strtolower($key) == "fungsi") {
            $fungsi = $item;
        } 
        if(strtolower($key) == "nim") {
            $nim = $item;
        } 
        if(strtolower($key) == "nama") {
            $nama = $item;
        } 
        if(strtolower($key) == "alamat") {
            $alamat = $item;
        } 
    }

} else { 

    /* Method  GET */
    $nama = isset($_GET["nama"]) ? $_GET["nama"] : null;
    $alamat = isset($_GET["alamat"]) ? $_GET["alamat"] : null;
    $nim = isset($_GET["nim"]) ? $_GET["nim"] : null;
    $fungsi = isset($_GET["fungsi"]) ? $_GET["fungsi"] : null;
}

/* View Reports */
if($report == "JSON"){
    require_once("JSON/report.php");   
    require_once('JSON/functions.php');
} else {
    require_once("XML/report.php");    
    require_once("XML/functions.php");
}

/* Log Script */
include("log.php");

if(strtolower($fungsi) == "tambah")
{
    tambahMahasiswa($method, $nim, $nama, $alamat);
} elseif (strtolower($fungsi) == 'tampil') {
    tampilMahasiswa($method, $nim);
} elseif (strtolower($fungsi) == 'hapus') {
    hapusMahasiswa($method, $nim); /* Tambah function menghapus mahasiswa by nim */
} elseif (strtolower($fungsi) == 'semua') {
    semuaMahasiswa($method); /* Tambah function menampilkan semua mahasiswa */
} else {
    noAkses($method);
}

function noAkses($report) {
    $function = new functions();
    $result = new result();
    $iderror = "010";
    $keterangan = "Fungsi Gagal atau Fungsi Tidak Ditemukan";
    $noref = $function->getNoRef();
    echo $result->noAkses($noref, $iderror, $keterangan);
}

function tambahMahasiswa($report, $nim, $nama, $alamat) {
    $function = new functions();
    $result = new result();
    $ceksiswa = $function->cek_mahasiswa($nim);
    $noref = $function->getNoRef();
    if($ceksiswa == 0){
        $function->tambah_mahasiswa($nim, $nama, $alamat);
        $iderror = "000";
        $keterangan = "Sukses";
    } else {
        $iderror = "001";
        $keterangan = "Gagal, Data Sudah Ada";
    }
    echo $result->tambahMahasiswa($nim, $noref, $iderror, $keterangan);
}

function hapusMahasiswa($report, $nim) {
    $function = new functions();
    $result = new result();
    $ceksiswa = $function->cek_mahasiswa($nim);
    $noref = $function->getNoRef();
    if($ceksiswa == 1){
        $function->hapus_mahasiswa($nim);
        $iderror = "000";
        $keterangan = "Sukses, Data berhasil di Hapus";
    } else {
        $iderror = "001";
        $keterangan = "Gagal, Data Tidak Ditemukan";
    }
    echo $result->hapusMahasiswa($iderror, $noref, $keterangan);
}

function tampilMahasiswa($report, $nim) {
    $function = new functions();
    $result = new result();
    $ceksiswa = $function->cek_mahasiswa($nim);
    $noref = $function->getNoRef();
    if($ceksiswa == 1){
        $iderror = "000";
        $keterangan = "Sukses";
    } else {
        $iderror = "002";
        $keterangan = "Gagal, Data Tidak Ditemukan";
    }
    echo $result->tampilMahasiswa($nim, $noref, $iderror, $keterangan);
}

function semuaMahasiswa($report) {
    $function = new functions();
    $result = new result();
    $iderror = "000";
    $keterangan = "Sukses";
    $noref = $function->getNoRef();
    echo $result->tampilSemuaMahasiswa($iderror, $noref, $keterangan);
}
?>