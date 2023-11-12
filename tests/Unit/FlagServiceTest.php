<?php

namespace Tests\Unit;

use App\Interfaces\FlagApiInterface;
use PHPUnit\Framework\TestCase;
use App\Services\FlagService;
use App\Services\RedisRepository;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Redis;

class FlagServiceTest extends TestCase
{
    const MOCK_RESPONSE_API = [
        [
            "name" => ["common" => "flag1"],
            "flags" => ["svg" => "image1"]
        ],
        [
            "name" => ["common" => "flag2"],
            "flags" => ["svg" => "image2"]
        ],
        [
            "name" => ["common" => "flag3"],
            "flags" => ["svg" => "image3"]
        ]
    ];

    const MOCK_RESPONSE_REDIS = [
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
            ->willReturn(json_encode(self::MOCK_RESPONSE_REDIS));

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
            ->method('getFlags')
            ->willReturn(self::MOCK_RESPONSE_API);

        $redisRepositoryMock->expects($this->once())
            ->method('get')
            ->willReturn(null);

        $redisRepositoryMock->expects($this->once())
            ->method('set');

        $flagService = new FlagService($flagApiMock, $redisRepositoryMock);

        $flags = $flagService->getFlags();

        $this->assertCount(3, $flags);
        $this->assertEquals($flags[0]::class, 'App\DTO\FlagDTO');
        $this->assertEquals($flags[0]->name, 'flag1');
    }
}
