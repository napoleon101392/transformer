<?php

namespace Napoleon\Support\Transformer\Tests;

use PHPUnit\Framework\TestCase;
use Napoleon\Support\Transformer\Transformer;
use Napoleon\Support\Transformer\ArgumentNotFoundException;

class ArgumentNotFoundExceptionTest extends TestCase
{
    /** @test */
    public function validateArguments()
    {
        $this->expectException(ArgumentNotFoundException::class);

        $transformer = new Transformer();

        $transformer
            ->stub($stub = __DIR__ . '/stubs/test-file.stub')
            ->transform([
                '{undefined_argument_sample}' => 'Foo'
            ]);
    }
}
