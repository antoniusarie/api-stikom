<?php
require_once("functions.php");
require_once("json.php");

class result {

    function noAkses($noref, $iderror, $keterangan)
    {
        $JSON = new JSON();
        return $JSON->noakses($noref, $iderror, $keterangan);
    }

    function addtrx($noref, $iderror, $keterangan)
    {
        $JSON = new JSON();
        return $JSON->reports($noref, $iderror, $keterangan);
    }
    
    function mintrx($noref, $iderror, $keterangan)
    {
        $JSON = new JSON();
        return $JSON->reports($noref, $iderror, $keterangan);
    }
}
?>