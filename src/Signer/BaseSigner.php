<?php
/**
 * This file is part of Matheust45\JWT, a simple library to handle JWT and JWS
 *
 * @license http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 */

namespace Matheust45\JWT\Signer;

use Matheust45\JWT\Signature;
use Matheust45\JWT\Signer;

/**
 * Base class for signers
 *
 * @author Matheus Andrade Tavares <matheus.tavares45@gmail.com>
 * @since 0.1.0
 */
abstract class BaseSigner implements Signer
{
    /**
     * {@inheritdoc}
     */
    public function modifyHeader(array &$headers)
    {
        $headers['alg'] = $this->getAlgorithmId();
    }

    /**
     * {@inheritdoc}
     */
    public function sign($payload, $key)
    {
        return new Signature($this->createHash($payload, $this->getKey($key)));
    }

    /**
     * {@inheritdoc}
     */
    public function verify($expected, $payload, $key)
    {
        return $this->doVerify($expected, $payload, $this->getKey($key));
    }

    /**
     * @param Key|string $key
     *
     * @return Key
     */
    private function getKey($key)
    {
        if (is_string($key)) {
            $key = new Key($key);
        }

        return $key;
    }

    /**
     * Creates a hash with the given data
     *
     * @param string $payload
     * @param Key $key
     *
     * @return string
     */
    abstract public function createHash($payload, Key $key);

    /**
     * Creates a hash with the given data
     *
     * @param string $payload
     * @param Key $key
     *
     * @return boolean
     */
    abstract public function doVerify($expected, $payload, Key $key);
}
