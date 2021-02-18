<?php

namespace Test;

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/ide.php';

class IDETest extends TestCase
{
    /**
     * @dataProvider dataPopularIde
     */
    public function testPopularIde(int $fileNumber, string $expected)
    {
        $data = file_get_contents(__DIR__ . "/../data/responses-$fileNumber.json");
        $responses = json_decode($data, true);

        $this->assertEquals($expected, popularIDE($responses));
    }

    public function dataPopularIde(): array
    {
        return [
            'responses-1' => [1, 'VS Code'],
            'responses-2' => [2, 'PhpStorm'],
            'responses-3' => [3, 'Notepad'],
        ];
    }
}
