<?php

namespace Napoleon\Support\Transformer;

/**
 * Undocumented interface
 */
interface TransformerInterface
{
    /**
     * Undocumented function
     *
     * @param [type] $filePath
     *
     * @return void
     */
    public function stub($filePath);

    /**
     * Undocumented function
     *
     * @param array $arguments
     *
     * @return void
     */
    public function transform(array $arguments);
}
