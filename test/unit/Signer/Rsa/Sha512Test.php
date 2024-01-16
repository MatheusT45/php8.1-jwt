<?php
/**
 * This file is part of Matheust45\JWT, a simple library to handle JWT and JWS
 *
 * @license http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 */

namespace Matheust45\JWT\Signer\Rsa;

/**
 * @author Matheus Andrade Tavares <matheus.tavares45@gmail.com>
 * @since 2.1.0
 */
class Sha512Test extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     *
     * @covers Matheust45\JWT\Signer\Rsa\Sha512::getAlgorithmId
     */
    public function getAlgorithmIdMustBeCorrect()
    {
        $signer = new Sha512();

        $this->assertEquals('RS512', $signer->getAlgorithmId());
    }

    /**
     * @test
     *
     * @covers Matheust45\JWT\Signer\Rsa\Sha512::getAlgorithm
     */
    public function getAlgorithmMustBeCorrect()
    {
        $signer = new Sha512();

        $this->assertEquals(OPENSSL_ALGO_SHA512, $signer->getAlgorithm());
    }
}
