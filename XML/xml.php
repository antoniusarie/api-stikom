<?php
require_once("functions.php");

class XML {

    public function noakses($iderror, $noref, $keterangan) {
        $infoData = array(
            "kode" => !empty($iderror) ? $iderror : 'null',
            "nomorref" => !empty($noref) ? $noref : 'null',
            "keterangan" => !empty($keterangan) ? $keterangan : 'null',
        );        
        
        // Print XML
        $xml = new DOMDOcument();
        $parent = $xml->appendChild($xml->createElement("data"));
        foreach ($infoData as $key => $value) {
            $parent->appendChild($xml->createElement($key, $value));
        }
        header("Content-Type:application/xml");
        $output = $xml->saveXML();

        return $output;
    }

    public function reports($noref, $iderror, $keterangan) {

        $function = new functions();

        $data = $function->get_data();
        $infoData = array(
            'keterangan' => $keterangan,
            'kodeid' => $iderror,
            'nomorref' => $noref
        );

        // Print XML
        $xml = new DOMDOcument();
        $parent = $xml->appendChild($xml->createElement("data"));

        // Looping $infoData
        foreach ($infoData as $key => $value) {
            $parent->appendChild($xml->createElement($key, $value));
        }
        
        // Looping array $data 
        foreach ($data as $items) {
            if(!empty($items)){
                $child = $parent->appendChild($xml->createElement("item"));
                foreach ($items as $key => $value) {
                    $child->appendChild($xml->createElement($key, $value));
                }
            }
        }
        // $xml->formatOutput = true;
        header("Content-Type:application/xml");
        $output = $xml->saveXML();
        
        return $output;
    }

}
?>