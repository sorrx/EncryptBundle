<?php

namespace SpecShaper\EncryptBundle\Encryptors;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class EncryptorFactory
{
    public const SUPPORTED_EXTENSION_OPENSSL = AesCbcEncryptor::class;

    private EventDispatcherInterface $dispatcher;

    public function __construct(EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    /**
     * Create service will return the desired encryption service.
     */
    public function createService(string $encryptKey, ?string $defaultAssociatedData = null, ?string $encryptorClass = self::SUPPORTED_EXTENSION_OPENSSL): EncryptorInterface
    {
        $encryptor = new $encryptorClass($this->dispatcher);
        $encryptor->setSecretKey($encryptKey);

        if (method_exists($encryptorClass, 'setDefaultAssociatedData')) {
            $encryptor->setDefaultAssociatedData($defaultAssociatedData);
        }

        return $encryptor;
    }
}
