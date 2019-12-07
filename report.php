<?php
require_once("functions.php");

class reportXML {

    function reportListSiswa($noref, $iderror, $keterangan) {

    $function = new functions();
    if($iderror == "000") {
        $data = $function->getListSiswa();
        
        $returnData = array(
            'KODE' => $iderror,
            'KETERANGAN' => $keterangan,
            'NOREF' => $noref
        );
    
    } else {
        $returnData = array(
            'KODE' => $iderror,
            'KETERANGAN' => $keterangan,
            'NOREF' => $noref
        );
    }

        // Print XML
        $xml = new DOMDOcument();
        $parent = $xml->appendChild($xml->createElement("data"));

        // Looping $returnData
        foreach ($returnData as $key => $value) {
            $parent->appendChild($xml->createElement($key, $value));
        }
        
        // Looping array $data 
        foreach ($data as $items) {
            $child = $parent->appendChild($xml->createElement("item"));
            foreach ($items as $key => $value) {
                $child->appendChild($xml->createElement($key, $value));
            }
        }
        // $xml->formatOutput = true;
        header("Content-Type:application/xml");
        $output = $xml->saveXML();
        
        return $output;
    }

    function reportViewSiswa($nis, $noref, $iderror, $keterangan) {

    $function = new functions();
    if($iderror == "000") {
        $data = $function->getDataSiswa($nis);
        $arr = explode("|", $data);

        $returnData = array(
            "KODE" => $iderror,
            "KETERANGAN" => $keterangan,
            "NOREF" => $noref,
            "NIS" => $nis,
            "NAMA" => $arr[0],
            "ALAMAT" => $arr[1]
            );
        } else {
        $returnData = array(
            "KODE" => $iderror,
            "KETERANGAN" => $keterangan,
            "NOREF" => $noref,
            );
        }

        // Print XML
        $xml = new DOMDOcument();
        $parent = $xml->appendChild($xml->createElement("data"));

        // Looping $returnData
        foreach ($returnData as $key => $value) {
            $parent->appendChild($xml->createElement($key, $value));
        }
        header("Content-Type:application/xml");
        $output = $xml->saveXML();

        return $output;
    }   

    function noAkses($iderror, $noref, $keterangan) {
        $returnData = array(
            "KODE" => $iderror,
            "KETERANGAN" => $keterangan,
            "NOREF" => $noref,
        );        
        
        // Print XML
        $xml = new DOMDOcument();
        $parent = $xml->appendChild($xml->createElement("data"));
        foreach ($returnData as $key => $value) {
            $parent->appendChild($xml->createElement($key, $value));
        }
        header("Content-Type:application/xml");
        $output = $xml->saveXML();

        return $output;
    }

}

class reportJSON {

    function reportListSiswa($noref, $iderror, $keterangan) {

    $function = new functions();
    if($iderror == "000") {
        $data = $function->getListSiswa();
        
        $returnData = array(
            'KODE' => $iderror,
            'KETERANGAN' => $keterangan,
            'NOREF' => $noref,
            "DATA" => $data // value array dari $data
        );
    
    } else {
        $returnData = array(
            'KODE' => $iderror,
            'KETERANGAN' => $keterangan,
            'NOREF' => $noref
        );
    }

        // Print JSON
        header("Content-Type:application/json");
        $output = json_encode($returnData);
        
        return $output;
    }

    function reportViewSiswa($nis, $noref, $iderror, $keterangan) {

    $function = new functions();
    if($iderror == "000") {
        $data = $function->getDataSiswa($nis);
        $arr = explode("|", $data);

        $returnData = array(
            "KODE" => $iderror,
            "KETERANGAN" => $keterangan,
            "NOREF" => $noref,
            "NIS" => $nis,
            "NAMA" => $arr[0],
            "ALAMAT" => $arr[1]
            );
        } else {
        $returnData = array(
            "KODE" => $iderror,
            "KETERANGAN" => $keterangan,
            "NOREF" => $noref,
            );
        }

        // Print JSON
        header("Content-Type:application/json");
        $output = json_encode($returnData);

        return $output;
    }   

    function noAkses($iderror, $noref, $keterangan) {
        $returnData = array(
            "KODE" => $iderror,
            "KETERANGAN" => $keterangan,
            "NOREF" => $noref,
        );        
        
        // Print JSON
        header("Content-Type:application/json");
        $output = json_encode($returnData);

        return $output;
    }

}
?>