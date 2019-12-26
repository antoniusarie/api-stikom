<?php
require_once("functions.php");
require_once("xml.php");

class result {

    function noAkses($noref, $iderror, $keterangan)
    {
        $XML = new XML();
        return $XML->noakses($iderror, $noref, $keterangan);
    }

    function addtrx($noref, $iderror, $keterangan)
    {
        $XML = new XML();
        return $XML->reports($noref, $iderror, $keterangan);
    }
    
    function mintrx($noref, $iderror, $keterangan)
    {
        $XML = new XML();
        return $XML->reports($noref, $iderror, $keterangan);
    }    

    function viewall($noref, $iderror, $keterangan)
    {
        $XML = new XML();
        return $XML->reports_all($noref, $iderror, $keterangan);
    }
}
?>