<?php
/**
 * This file is part of Matheust45\JWT, a simple library to handle JWT and JWS
 *
 * @license http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 */

namespace Matheust45\JWT\Signer\Ecdsa;

use Matheust45\JWT\Signer\Ecdsa;

/**
 * Signer for ECDSA SHA-512
 *
 * @author Matheus Andrade Tavares <matheus.tavares45@gmail.com>
 * @since 2.1.0
 */
class Sha512 extends Ecdsa
{
    /**
     * {@inheritdoc}
     */
    public function getAlgorithmId()
    {
        return 'ES512';
    }

    /**
     * {@inheritdoc}
     */
    public function getAlgorithm()
    {
        return 'sha512';
    }

    /**
     * {@inheritdoc}
     */
    public function getSignatureLength()
    {
        return 132;
    }
}
