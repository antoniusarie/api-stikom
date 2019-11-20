<?php
require_once("functions.php");
require_once("xml.php");

class report {

    function reportNoAkses($noref, $iderror, $keterangan)
    {
        $XML = new XML();
        $report = $XML->noakses($iderror, $noref, $keterangan);

        return $report;
    }

    function reportTambahSiswa($nis, $noref, $iderror, $keterangan)
    {
        $XML = new XML();
        $report = $XML->siswa($nis, $iderror, $noref, $keterangan);

        return $report;
    }

    function reportViewSiswa($nis, $noref, $iderror, $keterangan)
    {
        $XML = new XML();
        $report = $XML->siswa($nis, $iderror, $noref, $keterangan);

        return $report;
    }
    
}
?>