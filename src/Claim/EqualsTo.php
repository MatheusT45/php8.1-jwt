<?php
/**
 * This file is part of Matheust45\JWT, a simple library to handle JWT and JWS
 *
 * @license http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 */

namespace Matheust45\JWT\Claim;

use Matheust45\JWT\Claim;
use Matheust45\JWT\ValidationData;

/**
 * Validatable claim that checks if value is strictly equals to the given data
 *
 * @author Matheus Andrade Tavares <matheus.tavares45@gmail.com>
 * @since 2.0.0
 */
class EqualsTo extends Basic implements Claim, Validatable
{
    /**
     * {@inheritdoc}
     */
    public function validate(ValidationData $data)
    {
        if ($data->has($this->getName())) {
            return $this->getValue() === $data->get($this->getName());
        }

        return true;
    }
}
