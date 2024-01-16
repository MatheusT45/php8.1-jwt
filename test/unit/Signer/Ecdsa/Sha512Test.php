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
class Sha512Test extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     *
     * @uses Matheust45\JWT\Signer\Ecdsa
     * @uses Matheust45\JWT\Signer\Ecdsa\KeyParser
     *
     * @covers Matheust45\JWT\Signer\Ecdsa\Sha512::getAlgorithmId
     */
    public function getAlgorithmIdMustBeCorrect()
    {
        $signer = new Sha512();

        $this->assertEquals('ES512', $signer->getAlgorithmId());
    }

    /**
     * @test
     *
     * @uses Matheust45\JWT\Signer\Ecdsa
     * @uses Matheust45\JWT\Signer\Ecdsa\KeyParser
     *
     * @covers Matheust45\JWT\Signer\Ecdsa\Sha512::getAlgorithm
     */
    public function getAlgorithmMustBeCorrect()
    {
        $signer = new Sha512();

        $this->assertEquals('sha512', $signer->getAlgorithm());
    }

    /**
     * @test
     *
     * @uses Matheust45\JWT\Signer\Ecdsa
     * @uses Matheust45\JWT\Signer\Ecdsa\KeyParser
     *
     * @covers Matheust45\JWT\Signer\Ecdsa\Sha512::getSignatureLength
     */
    public function getSignatureLengthMustBeCorrect()
    {
        $signer = new Sha512();

        $this->assertEquals(132, $signer->getSignatureLength());
    }
}
