<?php 
// You can use include/include_once or require/require_once
require_once('encrypted.php');
require_once('blockchain.php');
// $b = new Blockchain("Genesis Block");
// $b->add('Block tambah 1');
// $b->add('Block tambah lagi');

// print $b[1]."\n";
// var_export($b->isValid());
// print $b;
$key = "1234567890";
$data = "Veris Juniardi";


$e = Encrypt::encryptedThis($data, $key);
print $e."\n";

$d = Encrypt::decryptedThis($e, $key);
print $d;
print "\n";