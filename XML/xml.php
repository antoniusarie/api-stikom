<?php
require_once("functions.php");

class XML {

    public function siswa($nis, $iderror, $noref, $keterangan) {

    $func = new functions();

    if($iderror == "000") {
        $data = $func->getdatasiswa($nis);
        $arr = explode("|", $data);

        $returnData = array(
            "kode" => !empty($iderror) ? $iderror : 'null',
            "keterangan" => !empty($keterangan) ? $keterangan : 'null',
            "nomorref" => !empty($noref) ? $noref : 'null',
            "nis" => !empty($nis) ? $nis : 'null',
            "nama" => !empty($arr[0]) ? $arr[0] : 'null',
            "alamat" => !empty($arr[1]) ? $arr[1] : 'null'
            );
        } else {
        $returnData = array(
            "kode" => !empty($iderror) ? $iderror : 'null',
            "keterangan" => !empty($keterangan) ? $keterangan : 'null',
            "nomorref" => !empty($noref) ? $noref : 'null',
            );
        }

        // Print XML
        $xml = new DOMDOcument();
        $dateInfoElement = $xml->createElement("data");
        foreach ($returnData as $key => $value) {
            $xmlNode = $xml->createElement($key, $value);
            $dateInfoElement->appendChild($xmlNode);
        }
        $xml->appendChild($dateInfoElement);
        $header = "Content-Type:text/xml";
        header($header);
        $echoxml = $xml->saveXML();

        return $echoxml;
    }

    public function noakses($iderror, $noref, $keterangan) {
        $returnData = array(
            "kode" => !empty($iderror) ? $iderror : 'null',
            "keterangan" => !empty($keterangan) ? $keterangan : 'null',
            "nomorref" => !empty($noref) ? $noref : 'null',
        );        
        
        // Print XML
        $xml = new DOMDOcument();
        $dateInfoElement = $xml->createElement("data");
        foreach ($returnData as $key => $value) {
            $xmlNode = $xml->createElement($key, $value);
            $dateInfoElement->appendChild($xmlNode);
        }
        $xml->appendChild($dateInfoElement);
        $header = "Content-Type:text/xml";
        header($header);
        $echoxml = $xml->saveXML();

        return $echoxml;
    }

}
?>