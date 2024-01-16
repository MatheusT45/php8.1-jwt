<?php
/**
 * This file is part of Matheust45\JWT, a simple library to handle JWT and JWS
 *
 * @license http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 */

namespace Matheust45\JWT\Claim;

use Matheust45\JWT\ValidationData;

/**
 * Basic interface for validatable token claims
 *
 * @author Matheus Andrade Tavares <matheus.tavares45@gmail.com>
 * @since 2.0.0
 */
interface Validatable
{
    /**
     * Returns if claim is valid according with given data
     *
     * @param ValidationData $data
     *
     * @return boolean
     */
    public function validate(ValidationData $data);
}
