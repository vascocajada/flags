<?php

namespace Tests\Unit;

use App\Services\FlagApis\FlagApiInterface;
use PHPUnit\Framework\TestCase;
use App\Services\FlagService;

class FlagServiceTest extends TestCase
{
    /**
     * @return void
     */
    public function test_it_returns_flags()
    {
        $flagApiMock = $this->getMockBuilder(FlagApiInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $flagService = new FlagService($flagApiMock);
        $flags = $flagService->getFlags();

        $this->assertCount(3, $flags);
    }
}
