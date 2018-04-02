<?php

namespace EricKeyte\Archetyper\Test\Unit;

/**
 * Class TestCase
 */
class TestCase extends \PHPUnit\Framework\TestCase
{
    /**
     * @return \Mockery\MockInterface
     */
    public function mock()
    {
        $args = func_get_args();

        return \Mockery::mock($args);
    }
}
