<?php

namespace Napoleon\Support\Transformer\Tests;

use PHPUnit\Framework\TestCase;
use Napoleon\Support\Transformer\Transformer;
use Napoleon\Support\Transformer\ArgumentsNotFoundException;

class TransformerTest extends TestCase
{
    /** @test */
    public function transformStub()
    {
        $transformer = (new Transformer)
            ->stub(__DIR__ . '/stubs/test-file.stub')
            ->setDestination($generated = __DIR__ . "/generated/sample.txt")
            ->transform([
                '{TEST}' => 'Foo'
            ]);

        $this->assertTrue($transformer);
        $this->assertFileExists($generated);
        $this->assertContains("Foo", file_get_contents($generated), 'Cant find text in your test');
    }

    public function tearDown()
    {
        unlink(__DIR__ . "/generated/sample.txt");

        rmdir(dirname(__FILE__) . '/generated');
    }
}
