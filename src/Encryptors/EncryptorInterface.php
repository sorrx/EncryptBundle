<?php

namespace SpecShaper\EncryptBundle\Encryptors;

/**
 * Encryptor interface for encryptors.
 */
interface EncryptorInterface
{
    public function setSecretKey(string $key): void;

    /**
     * Must accept data and return encrypted data.
     */
    public function encrypt(?string $data, ?string $columnName = null): ?string;

    /**
     * Must accept data and return decrypted data.
     */
    public function decrypt(?string $data, ?string $columnName = null): ?string;
}
