<?php
/**
 * This file is part of Matheust45\JWT, a simple library to handle JWT and JWS
 *
 * @license http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 */

namespace Matheust45\JWT\Claim;

use Matheust45\JWT\ValidationData;

/**
 * @author Matheus Andrade Tavares <matheus.tavares45@gmail.com>
 * @since 2.0.0
 */
class EqualsToTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     *
     * @uses Matheust45\JWT\Claim\Basic::__construct
     * @uses Matheust45\JWT\Claim\Basic::getName
     * @uses Matheust45\JWT\ValidationData::__construct
     * @uses Matheust45\JWT\ValidationData::has
     *
     * @covers Matheust45\JWT\Claim\EqualsTo::validate
     */
    public function validateShouldReturnTrueWhenValidationDontHaveTheClaim()
    {
        $claim = new EqualsTo('iss', 'test');

        $this->assertTrue($claim->validate(new ValidationData()));
    }

    /**
     * @test
     *
     * @uses Matheust45\JWT\Claim\Basic::__construct
     * @uses Matheust45\JWT\Claim\Basic::getName
     * @uses Matheust45\JWT\Claim\Basic::getValue
     * @uses Matheust45\JWT\ValidationData::__construct
     * @uses Matheust45\JWT\ValidationData::setIssuer
     * @uses Matheust45\JWT\ValidationData::has
     * @uses Matheust45\JWT\ValidationData::get
     *
     * @covers Matheust45\JWT\Claim\EqualsTo::validate
     */
    public function validateShouldReturnTrueWhenValueIsEqualsToValidationData()
    {
        $claim = new EqualsTo('iss', 'test');

        $data = new ValidationData();
        $data->setIssuer('test');

        $this->assertTrue($claim->validate($data));
    }

    /**
     * @test
     *
     * @uses Matheust45\JWT\Claim\Basic::__construct
     * @uses Matheust45\JWT\Claim\Basic::getName
     * @uses Matheust45\JWT\Claim\Basic::getValue
     * @uses Matheust45\JWT\ValidationData::__construct
     * @uses Matheust45\JWT\ValidationData::setIssuer
     * @uses Matheust45\JWT\ValidationData::has
     * @uses Matheust45\JWT\ValidationData::get
     *
     * @covers Matheust45\JWT\Claim\EqualsTo::validate
     */
    public function validateShouldReturnFalseWhenValueIsNotEqualsToValidationData()
    {
        $claim = new EqualsTo('iss', 'test');

        $data = new ValidationData();
        $data->setIssuer('test1');

        $this->assertFalse($claim->validate($data));
    }
}
