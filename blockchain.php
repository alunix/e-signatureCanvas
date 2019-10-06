<?php 
require_once('proofofwork.php');
// --------------- Block Class -----------------
// ---------------------------------------------
// Mendefinisikan Data dan HAsh pada Block Data

class Block {
    public $previous;
    public $hash;
    public $message;
    public function __construct($message, ?Block $previous)
    {
        $this->previous = $previous ? $previous->hash : null;
        $this->message = $message;
        $this->mine();
    }
    public function mine()
    {
        $data = $this->message.$this->previous;
        $this->nonce = PoW::findNonce($data);
        $this->hash = Pow::hash($data.$this->nonce);

    }
    public function isValid():bool
    {
        return Pow::isValidNonce($this->message.$this->previous, $this->nonce);
    }
    public function __toString() : string
    {
        return sprintf("Previous : %s\nNonce : %s \nHash: %s \nMessage: %s\n", $this->previous, $this->nonce, $this->hash, $this->message);
    }
}

class Blockchain{
    public $blocks = [];

    public function __construct($message)
    {
        $this->blocks[] = new Block($message, null);
    }
    public function add($message)
    {
        $this->blocks[] = new Block($message, $this->blocks[count($this->blocks) - 1 ]);
    }

    public function isValid() : bool
    {
       foreach ($this->blocks as $i => $block) {
           if(!$block->isValid()){
               return false;
           }
           if($i != 0 && $this->blocks[$i -1]->hash != $block->previous){
               return false;
           }
           return true;
       }
    }
    public function __toString()
    {
        return implode("\n\n", $this->blocks);
    }
}
