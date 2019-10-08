<?php 
require "vendor/autoload.php";
use Endroid\QrCode\QrCode;

class QRCodeGen{
    public function generateString($data)
    {
        $qrCode = new QrCode($data);
        header('Content-Type: '.$qrCode->getContentType());
        return $qrCode->writeString();
    }
    public function generateFile($data)
    {
        $qrCode = new QrCode($data);
        header('Content-Type: '.$qrCode->getContentType());
        return $qrCode->writeFile(__DIR__.'/qrgenerated'.'/'.time().'.png');
    }
}

$string = "Veris Juniardi";
$qrS = QRCodeGen::generateString($string);
$qrF = QRCodeGen::generateFile($string);

echo $qrS."\n";
echo $qrF."\n";

