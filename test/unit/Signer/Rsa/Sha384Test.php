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
class Sha384Test extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     *
     * @covers Matheust45\JWT\Signer\Rsa\Sha384::getAlgorithmId
     */
    public function getAlgorithmIdMustBeCorrect()
    {
        $signer = new Sha384();

        $this->assertEquals('RS384', $signer->getAlgorithmId());
    }

    /**
     * @test
     *
     * @covers Matheust45\JWT\Signer\Rsa\Sha384::getAlgorithm
     */
    public function getAlgorithmMustBeCorrect()
    {
        $signer = new Sha384();

        $this->assertEquals(OPENSSL_ALGO_SHA384, $signer->getAlgorithm());
    }
}
