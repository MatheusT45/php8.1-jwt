<?php
/**
 * This file is part of Matheust45\JWT, a simple library to handle JWT and JWS
 *
 * @license http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 */

namespace Matheust45\JWT\Signer\Ecdsa;

/**
 * @author Matheus Andrade Tavares <matheus.tavares45@gmail.com>
 * @since 2.1.0
 */
class Sha256Test extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     *
     * @uses Matheust45\JWT\Signer\Ecdsa
     * @uses Matheust45\JWT\Signer\Ecdsa\KeyParser
     *
     * @covers Matheust45\JWT\Signer\Ecdsa\Sha256::getAlgorithmId
     */
    public function getAlgorithmIdMustBeCorrect()
    {
        $signer = new Sha256();

        $this->assertEquals('ES256', $signer->getAlgorithmId());
    }

    /**
     * @test
     *
     * @uses Matheust45\JWT\Signer\Ecdsa
     * @uses Matheust45\JWT\Signer\Ecdsa\KeyParser
     *
     * @covers Matheust45\JWT\Signer\Ecdsa\Sha256::getAlgorithm
     */
    public function getAlgorithmMustBeCorrect()
    {
        $signer = new Sha256();

        $this->assertEquals('sha256', $signer->getAlgorithm());
    }

    /**
     * @test
     *
     * @uses Matheust45\JWT\Signer\Ecdsa
     * @uses Matheust45\JWT\Signer\Ecdsa\KeyParser
     *
     * @covers Matheust45\JWT\Signer\Ecdsa\Sha256::getSignatureLength
     */
    public function getSignatureLengthMustBeCorrect()
    {
        $signer = new Sha256();

        $this->assertEquals(64, $signer->getSignatureLength());
    }
}
