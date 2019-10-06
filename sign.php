<?php 
// You can use include/include_once or require/require_once
require_once('blockchain.php');
$b = new Blockchain("Genesis Block");
$b->add('Block tambah 1');
$b->add('Block tambah lagi');

print $b."\n";
var_export($b->isValid());