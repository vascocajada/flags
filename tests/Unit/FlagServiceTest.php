<?php

namespace Tests\Unit;

use App\Services\FlagApis\FlagApiInterface;
use PHPUnit\Framework\TestCase;
use App\Services\FlagService;
use App\Services\RedisRepository;

class FlagServiceTest extends TestCase
{
    const MOCK_RESPONSE = [
        [
            "name" => "flag1",
            "image" => "image1"
        ],
        [
            "name" => "flag2",
            "image" => "image2"
        ],
        [
            "name" => "flag3",
            "image" => "image3"
        ]
    ];

    /**
     * @return void
     */
    public function test_it_returns_flags()
    {
        $flagApiMock = $this->getMockBuilder(FlagApiInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $redisRepositoryMock = $this->getMockBuilder(RedisRepository::class)
            ->disableOriginalConstructor()
            ->getMock();

        $redisRepositoryMock->expects($this->once())
            ->method('get')
            ->willReturn(json_encode(self::MOCK_RESPONSE));

        $flagService = new FlagService($flagApiMock, $redisRepositoryMock);
        $flags = $flagService->getFlags();

        $this->assertCount(3, $flags);
    }

    public function test_it_calls_external_api_when_flags_are_not_cached()
    {
        $flagApiMock = $this->getMockBuilder(FlagApiInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $redisRepositoryMock = $this->getMockBuilder(RedisRepository::class)
            ->disableOriginalConstructor()
            ->getMock();

        $flagApiMock->expects($this->once())
            ->method('getFlags');

        $redisRepositoryMock->expects($this->once())
            ->method('get')
            ->willReturn(null);

        $redisRepositoryMock->expects($this->once())
            ->method('set');

        $flagService = new FlagService($flagApiMock, $redisRepositoryMock);

        $flagService->getFlags();
    }
}
