<?php
/**
 * This file is part of Matheust45\JWT, a simple library to handle JWT and JWS
 *
 * @license http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 */

namespace Matheust45\JWT\Signer;

use org\bovigo\vfs\vfsStream;

/**
 * @author Matheus Andrade Tavares <matheus.tavares45@gmail.com>
 * @since 3.0.4
 */
class KeyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @before
     */
    public function configureRootDir()
    {
        vfsStream::setup(
            'root',
            null,
            ['test.pem' => 'testing']
        );
    }

    /**
     * @test
     *
     * @covers Matheust45\JWT\Signer\Key::__construct
     * @covers Matheust45\JWT\Signer\Key::setContent
     */
    public function constructShouldConfigureContentAndPassphrase()
    {
        $key = new Key('testing', 'test');

        $this->assertAttributeEquals('testing', 'content', $key);
        $this->assertAttributeEquals('test', 'passphrase', $key);
    }

    /**
     * @test
     *
     * @covers Matheust45\JWT\Signer\Key::__construct
     * @covers Matheust45\JWT\Signer\Key::setContent
     * @covers Matheust45\JWT\Signer\Key::readFile
     */
    public function constructShouldBeAbleToConfigureContentFromFile()
    {
        $key = new Key('file://' . vfsStream::url('root/test.pem'));

        $this->assertAttributeEquals('testing', 'content', $key);
        $this->assertAttributeEquals(null, 'passphrase', $key);
    }

    /**
     * @test
     *
     * @expectedException \InvalidArgumentException
     *
     * @covers Matheust45\JWT\Signer\Key::__construct
     * @covers Matheust45\JWT\Signer\Key::setContent
     * @covers Matheust45\JWT\Signer\Key::readFile
     */
    public function constructShouldRaiseExceptionWhenFileDoesNotExists()
    {
        new Key('file://' . vfsStream::url('root/test2.pem'));
    }

    /**
     * @test
     *
     * @uses Matheust45\JWT\Signer\Key::__construct
     * @uses Matheust45\JWT\Signer\Key::setContent
     *
     * @covers Matheust45\JWT\Signer\Key::getContent
     */
    public function getContentShouldReturnConfiguredData()
    {
        $key = new Key('testing', 'test');

        $this->assertEquals('testing', $key->getContent());
    }

    /**
     * @test
     *
     * @uses Matheust45\JWT\Signer\Key::__construct
     * @uses Matheust45\JWT\Signer\Key::setContent
     *
     * @covers Matheust45\JWT\Signer\Key::getPassphrase
     */
    public function getPassphraseShouldReturnConfiguredData()
    {
        $key = new Key('testing', 'test');

        $this->assertEquals('test', $key->getPassphrase());
    }
}
