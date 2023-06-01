<?php
// Encryption key
$encryptionKey = 'LALALA:))'; // Use a strong and secure key

// Encrypt function
function encryptData($data, $encryptionKey) {
    $ivLength = openssl_cipher_iv_length('aes-256-cbc');
    $iv = openssl_random_pseudo_bytes($ivLength);
    $encryptedData = openssl_encrypt($data, 'aes-256-cbc', $encryptionKey, 0, $iv);
    return base64_encode($iv . $encryptedData);
}


// Decrypt function
function decryptData($encryptedData, $encryptionKey) {
    $data = base64_decode($encryptedData);
    $ivLength = openssl_cipher_iv_length('aes-256-cbc');
    $iv = substr($data, 0, $ivLength);
    $encryptedPayload = substr($data, $ivLength);
    $decryptedData = openssl_decrypt($encryptedPayload, 'aes-256-cbc', $encryptionKey, 0, $iv);
    return $decryptedData;
}

// Example usage
$encryptedData = encryptData($dataToEncrypt, $encryptionKey);

echo "Encrypted Data: $encryptedData\n";

$encryptedData = 'R4GIJlZa2D6AXDxKa2Kr4C8yN2VVNFQ2M2ZudnBKQlM5cFBqU2c9PQ==';

$decryptedData = decryptData($encryptedData, $encryptionKey);

echo "Decrypted Data: $decryptedData\n";
?>
