<?php

namespace Napoleon\Support\Transformer;

/**
 * Undocumented class
 */
class Transformer implements TransformerInterface
{
    /**
     * Undocumented variable
     *
     * @var string
     */
    protected $stub;

    /**
     * Destination of the generation of file
     *
     * @var string
     */
    protected $destination;

    /**
     * Set and validate directory of the stub
     *
     * @param string $stub
     *
     * @return void
     */
    public function stub($stub = null)
    {
        $this->validateStub($stub);

        $this->stub = $stub;

        return $this;
    }

    /**
     * Make a file with duplicated stub and its value
     *
     * @param array $arguments
     *
     * @return void
     */
    public function transform(array $arguments)
    {
        try {
            return $this->validateStub($this->stub)
                 ->validateArgument($arguments)
                 ->createFile()
                 ->put($arguments);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * Undocumented function
     *
     * @todo create exception: file already exists and test
     *
     * @return void
     */
    protected function createFile()
    {
        if (is_file($this->getDestination())) {
            throw new \Exception('file already exists: ' . $this->getDestination());
        }

        $this->stubFile();

        return $this;
    }

    /**
     * Push the content to the copied stub file
     *
     * @return void
     */
    protected function stubFile()
    {
        if (file_exists(dirname($this->getDestination()))) {
            return copy($this->stub, $this->getDestination());
        }

        mkdir(dirname($this->getDestination()), 0755, true);

        copy($this->stub, $this->getDestination());
    }

    /**
     * Finalize stubbing of files
     *
     * @param [type] $arguments
     *
     * @return void
     */
    protected function put($arguments)
    {
        file_put_contents(
            $this->getDestination(),
            strtr(file_get_contents($this->stub), $arguments)
        );

        return true;
    }

    /**
     * Set the destination of the creation of file
     *
     * @param string $destination
     *
     * @return void
     */
    public function setDestination($destination = null)
    {
        if (is_null($destination)) {
            throw new \Exception('Destination is required');
        }

        $this->destination = $destination;

        return $this;
    }

    /**
     * Get destination
     *
     * @return void
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * Validate the stub location
     *
     * @param string $stub
     *
     * @return void
     */
    protected function validateStub($stub)
    {
        if (is_null($stub)) {
            throw new TransformerException();
        }

        return $this;
    }

    /**
     * Check if the argument is not available on the stub
     *
     * @param array $arguments
     *
     * @return void
     */
    protected function validateArgument($arguments)
    {
        foreach ($arguments as $index => $value) {
            if (strpos(file_get_contents($this->stub), $index) === false) {
                $errors[] = $index;
            }
        }

        if (! empty($errors)) {
            throw new ArgumentNotFoundException("Not found: " . implode(", ", $errors));
        }

        return $this;
    }
}
