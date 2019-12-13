<?php
require_once("functions.php");
require_once("xml.php");

class result {

    function noAkses($noref, $iderror, $keterangan)
    {
        $XML = new XML();
        $report = $XML->noakses($iderror, $noref, $keterangan);

        return $report;
    }

    function tambahMahasiswa($nim, $noref, $iderror, $keterangan)
    {
        $XML = new XML();
        $report = $XML->mahasiswa($nim, $iderror, $noref, $keterangan);

        return $report;
    }
    
    function hapusMahasiswa($iderror, $noref, $keterangan)
    {
        $XML = new XML();
        $report = $XML->hapus_mahasiswa($iderror, $noref, $keterangan);

        return $report;
    }

    function tampilMahasiswa($nim, $noref, $iderror, $keterangan)
    {
        $XML = new XML();
        $report = $XML->mahasiswa($nim, $iderror, $noref, $keterangan);

        return $report;
    }
    
    function tampilSemuaMahasiswa($noref, $iderror, $keterangan)
    {
        $XML = new XML();
        $report = $XML->semua_mahasiswa($noref, $iderror, $keterangan);

        return $report;
    }
    
}
?>