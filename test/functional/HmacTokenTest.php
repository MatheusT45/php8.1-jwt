<?php
/**
 * This file is part of Matheust45\JWT, a simple library to handle JWT and JWS
 *
 * @license http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 */

namespace Matheust45\JWT\FunctionalTests;

use Matheust45\JWT\Builder;
use Matheust45\JWT\Parser;
use Matheust45\JWT\Token;
use Matheust45\JWT\Signature;
use Matheust45\JWT\Signer\Hmac\Sha256;
use Matheust45\JWT\Signer\Hmac\Sha512;

/**
 * @author Matheus Andrade Tavares <matheus.tavares45@gmail.com>
 * @since 2.1.0
 */
class HmacTokenTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Sha256
     */
    private $signer;

    /**
     * @before
     */
    public function createSigner()
    {
        $this->signer = new Sha256();
    }

    /**
     * @test
     *
     * @covers Matheust45\JWT\Builder
     * @covers Matheust45\JWT\Token
     * @covers Matheust45\JWT\Signature
     * @covers Matheust45\JWT\Claim\Factory
     * @covers Matheust45\JWT\Claim\Basic
     * @covers Matheust45\JWT\Parsing\Encoder
     * @covers Matheust45\JWT\Signer\Key
     * @covers Matheust45\JWT\Signer\BaseSigner
     * @covers Matheust45\JWT\Signer\Hmac
     * @covers Matheust45\JWT\Signer\Hmac\Sha256
     */
    public function builderCanGenerateAToken()
    {
        $user = (object) ['name' => 'testing', 'email' => 'testing@abc.com'];

        $token = (new Builder())->setId(1)
                              ->setAudience('http://client.abc.com')
                              ->setIssuer('http://api.abc.com')
                              ->set('user', $user)
                              ->setHeader('jki', '1234')
                              ->sign($this->signer, 'testing')
                              ->getToken();

        $this->assertAttributeInstanceOf(Signature::class, 'signature', $token);
        $this->assertEquals('1234', $token->getHeader('jki'));
        $this->assertEquals('http://client.abc.com', $token->getClaim('aud'));
        $this->assertEquals('http://api.abc.com', $token->getClaim('iss'));
        $this->assertEquals($user, $token->getClaim('user'));

        return $token;
    }

    /**
     * @test
     *
     * @depends builderCanGenerateAToken
     *
     * @covers Matheust45\JWT\Builder
     * @covers Matheust45\JWT\Parser
     * @covers Matheust45\JWT\Token
     * @covers Matheust45\JWT\Signature
     * @covers Matheust45\JWT\Claim\Factory
     * @covers Matheust45\JWT\Claim\Basic
     * @covers Matheust45\JWT\Parsing\Encoder
     * @covers Matheust45\JWT\Parsing\Decoder
     */
    public function parserCanReadAToken(Token $generated)
    {
        $read = (new Parser())->parse((string) $generated);

        $this->assertEquals($generated, $read);
        $this->assertEquals('testing', $read->getClaim('user')->name);
    }

    /**
     * @test
     *
     * @depends builderCanGenerateAToken
     *
     * @covers Matheust45\JWT\Builder
     * @covers Matheust45\JWT\Parser
     * @covers Matheust45\JWT\Token
     * @covers Matheust45\JWT\Signature
     * @covers Matheust45\JWT\Parsing\Encoder
     * @covers Matheust45\JWT\Claim\Factory
     * @covers Matheust45\JWT\Claim\Basic
     * @covers Matheust45\JWT\Signer\Key
     * @covers Matheust45\JWT\Signer\BaseSigner
     * @covers Matheust45\JWT\Signer\Hmac
     * @covers Matheust45\JWT\Signer\Hmac\Sha256
     */
    public function verifyShouldReturnFalseWhenKeyIsNotRight(Token $token)
    {
        $this->assertFalse($token->verify($this->signer, 'testing1'));
    }

    /**
     * @test
     *
     * @depends builderCanGenerateAToken
     *
     * @covers Matheust45\JWT\Builder
     * @covers Matheust45\JWT\Parser
     * @covers Matheust45\JWT\Token
     * @covers Matheust45\JWT\Signature
     * @covers Matheust45\JWT\Parsing\Encoder
     * @covers Matheust45\JWT\Claim\Factory
     * @covers Matheust45\JWT\Claim\Basic
     * @covers Matheust45\JWT\Signer\Key
     * @covers Matheust45\JWT\Signer\BaseSigner
     * @covers Matheust45\JWT\Signer\Hmac
     * @covers Matheust45\JWT\Signer\Hmac\Sha256
     * @covers Matheust45\JWT\Signer\Hmac\Sha512
     */
    public function verifyShouldReturnFalseWhenAlgorithmIsDifferent(Token $token)
    {
        $this->assertFalse($token->verify(new Sha512(), 'testing'));
    }

    /**
     * @test
     *
     * @depends builderCanGenerateAToken
     *
     * @covers Matheust45\JWT\Builder
     * @covers Matheust45\JWT\Parser
     * @covers Matheust45\JWT\Token
     * @covers Matheust45\JWT\Signature
     * @covers Matheust45\JWT\Parsing\Encoder
     * @covers Matheust45\JWT\Claim\Factory
     * @covers Matheust45\JWT\Claim\Basic
     * @covers Matheust45\JWT\Signer\Key
     * @covers Matheust45\JWT\Signer\BaseSigner
     * @covers Matheust45\JWT\Signer\Hmac
     * @covers Matheust45\JWT\Signer\Hmac\Sha256
     */
    public function verifyShouldReturnTrueWhenKeyIsRight(Token $token)
    {
        $this->assertTrue($token->verify($this->signer, 'testing'));
    }

    /**
     * @test
     *
     * @covers Matheust45\JWT\Builder
     * @covers Matheust45\JWT\Parser
     * @covers Matheust45\JWT\Token
     * @covers Matheust45\JWT\Signature
     * @covers Matheust45\JWT\Signer\Key
     * @covers Matheust45\JWT\Signer\BaseSigner
     * @covers Matheust45\JWT\Signer\Hmac
     * @covers Matheust45\JWT\Signer\Hmac\Sha256
     * @covers Matheust45\JWT\Claim\Factory
     * @covers Matheust45\JWT\Claim\Basic
     * @covers Matheust45\JWT\Parsing\Encoder
     * @covers Matheust45\JWT\Parsing\Decoder
     */
    public function everythingShouldWorkWhenUsingATokenGeneratedByOtherLibs()
    {
        $data = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXUyJ9.eyJoZWxsbyI6IndvcmxkIn0.Rh'
                . '7AEgqCB7zae1PkgIlvOpeyw9Ab8NGTbeOH7heHO0o';

        $token = (new Parser())->parse((string) $data);

        $this->assertEquals('world', $token->getClaim('hello'));
        $this->assertTrue($token->verify($this->signer, 'testing'));
    }
}
