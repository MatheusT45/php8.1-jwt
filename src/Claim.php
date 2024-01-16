<?php
/**
 * This file is part of Matheust45\JWT, a simple library to handle JWT and JWS
 *
 * @license http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 */

namespace Matheust45\JWT;

use JsonSerializable;

/**
 * Basic interface for token claims
 *
 * @author Matheus Andrade Tavares <matheus.tavares45@gmail.com>
 * @since 2.0.0
 */
interface Claim extends JsonSerializable
{
    /**
     * Returns the claim name
     *
     * @return string
     */
    public function getName();

    /**
     * Returns the claim value
     *
     * @return string
     */
    public function getValue();

    /**
     * Returns the string representation of the claim
     *
     * @return string
     */
    public function __toString();
}
