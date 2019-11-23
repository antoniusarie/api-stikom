<?php
require_once("functions.php");

class XML {

    public function semua_mahasiswa($iderror, $noref, $keterangan) {

    $function = new functions();

        $iderror == "000";
        $data = $function->get_semua_mahasiswa();

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

    public function mahasiswa($nim, $iderror, $noref, $keterangan) {

    $function = new functions();

    if($iderror == "000") {
        $data = $function->get_data_mahasiswa($nim);
        $arr = explode("|", $data);

        $infoData = array(
            "kode" => !empty($iderror) ? $iderror : 'null',
            "keterangan" => !empty($keterangan) ? $keterangan : 'null',
            "nomorref" => !empty($noref) ? $noref : 'null',
            "nim" => !empty($nim) ? $nim : 'null',
            "nama" => !empty($arr[0]) ? $arr[0] : 'null',
            "alamat" => !empty($arr[1]) ? $arr[1] : 'null'
            );
        } else {
        $infoData = array(
            "kode" => !empty($iderror) ? $iderror : 'null',
            "keterangan" => !empty($keterangan) ? $keterangan : 'null',
            "nomorref" => !empty($noref) ? $noref : 'null',
            );
        }

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

    public function noakses($iderror, $noref, $keterangan) {
        $infoData = array(
            "kode" => !empty($iderror) ? $iderror : 'null',
            "keterangan" => !empty($keterangan) ? $keterangan : 'null',
            "nomorref" => !empty($noref) ? $noref : 'null',
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

}
?>