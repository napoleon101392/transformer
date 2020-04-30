<?php

namespace Napoleon\Support\Transformer;

/**
 * Undocumented class
 */
class ArgumentNotFoundException extends \Exception
{
    /**
     * Undocumented function
     *
     * @param string $defaultMessage
     */
    public function __construct($defaultMessage = 'Some arguments cant find in your stub')
    {
        parent::__construct($defaultMessage);
    }
}
