<?php

namespace Test;

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/os.php';

class OSTest extends TestCase
{
    /**
     * @dataProvider dataTopOs
     */
    public function testTopOs(int $fileNumber, array $expected)
    {
        $data = file_get_contents(__DIR__ . "/../data/responses-$fileNumber.json");
        $responses = json_decode($data, true);

        $this->assertEquals($expected, topOS($responses));
    }

    public function dataTopOs(): array
    {
        return [
            'responses-1' => [
                1,
                [
                    'macOS' => 3,
                    'Windows' => 2,
                ],
            ],
            'responses-2' => [
                2,
                [
                    'Windows' => 3,
                    'Linux' => 1,
                ],
            ],
            'responses-3' => [
                3,
                [
                    'Linux' => 2,
                    'Windows' => 1,
                ],
            ],
        ];
    }
}
