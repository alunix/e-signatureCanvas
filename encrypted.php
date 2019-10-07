<?php 
class Encrypt{
    public function encryptedThis($data, $key)
    {
        $encrytion_key = base64_encode($key);
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encrytion_key, 0, $iv);
        return base64_encode($encrypted. '::'.$iv);
    }
    public function decryptedThis($data, $key)
    {
        $encrytion_key = base64_encode($key);
        list($encrypted_data, $iv) = array_pad(explode('::', base64_decode($data),2),2,null);
        return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encrytion_key, 0, $iv);
    }
}