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
class Sha384Test extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     *
     * @uses Matheust45\JWT\Signer\Ecdsa
     * @uses Matheust45\JWT\Signer\Ecdsa\KeyParser
     *
     * @covers Matheust45\JWT\Signer\Ecdsa\Sha384::getAlgorithmId
     */
    public function getAlgorithmIdMustBeCorrect()
    {
        $signer = new Sha384();

        $this->assertEquals('ES384', $signer->getAlgorithmId());
    }

    /**
     * @test
     *
     * @uses Matheust45\JWT\Signer\Ecdsa
     * @uses Matheust45\JWT\Signer\Ecdsa\KeyParser
     *
     * @covers Matheust45\JWT\Signer\Ecdsa\Sha384::getAlgorithm
     */
    public function getAlgorithmMustBeCorrect()
    {
        $signer = new Sha384();

        $this->assertEquals('sha384', $signer->getAlgorithm());
    }

    /**
     * @test
     *
     * @uses Matheust45\JWT\Signer\Ecdsa
     * @uses Matheust45\JWT\Signer\Ecdsa\KeyParser
     *
     * @covers Matheust45\JWT\Signer\Ecdsa\Sha384::getSignatureLength
     */
    public function getSignatureLengthMustBeCorrect()
    {
        $signer = new Sha384();

        $this->assertEquals(96, $signer->getSignatureLength());
    }
}
