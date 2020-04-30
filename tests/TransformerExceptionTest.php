<?php

namespace Napoleon\Support\Transformer\Tests;

use Napoleon\Support\Transformer\Transformer;
use Napoleon\Support\Transformer\TransformerException;
use PHPUnit\Framework\TestCase;

class TransformerExceptionTest extends TestCase
{
    /** @test */
    public function validateStubPathExistenceWithoutStub()
    {
        $this->expectException(TransformerException::class);

        $transformer = new Transformer();

        $transformer
            ->transform([
                '{TEST}' => 'Foo'
            ]);
    }

    /** @test */
    public function validateStubPathExistenceWithoutTransform()
    {
        $this->expectException(TransformerException::class);

        $transformer = new Transformer();

        $transformer
            ->stub()
            ->transform([
                '{TEST}' => 'Foo'
            ]);
    }
}
