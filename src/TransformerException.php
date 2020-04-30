<?php

namespace Napoleon\Support\Transformer;

/**
 * Undocumented class
 */
class TransformerException extends \Exception
{
    /**
     * Undocumented function
     *
     * @param string $defaultMessage
     */
    public function __construct($defaultMessage = 'There is an error in your transformer')
    {
        parent::__construct($defaultMessage);
    }
}
