<?php

namespace Tests\Unit;

use App\Http\Controllers\OperationController;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

    public function test_percentage_result(): void
    {
        $controller = new OperationController;

        $result = $controller->calculatePercentage(150, 20);

        $this->assertIsFloat($result);
        $this->assertNotNull($result);
        $this->assertEquals(30, $result);
        $this->assertGreaterThan(0, $result);
    }
}
