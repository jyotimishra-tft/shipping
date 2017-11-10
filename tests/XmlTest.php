<?php
/**
 * Created by PhpStorm.
 * User: johan
 * Date: 2017-05-22
 * Time: 21:48
 */

namespace Vinnia\Shipping\Tests;


use PHPUnit\Framework\TestCase;
use Vinnia\Shipping\Xml;

class XmlTest extends TestCase
{

    public function xmlProvider()
    {
        return [
            [[
                'key' => 'value',
            ], '<key><![CDATA[value]]></key>'],
            [[
               'a' => [
                   'b' => 'c',
                   'd' => 'e',
               ],
            ], '<a><b><![CDATA[c]]></b><d><![CDATA[e]]></d></a>'],
            [[
                'a' => [
                    'one',
                    'two',
                ],
            ], '<a><![CDATA[one]]></a><a><![CDATA[two]]></a>'],
        ];
    }

    /**
     * @dataProvider xmlProvider
     * @param array $data
     * @param string $expected
     */
    public function testFromArray(array $data, string $expected)
    {
        $xml = Xml::fromArray($data);

        $this->assertEquals($expected, $xml);
    }

    public function testToArray()
    {
        $xml = <<<EOD
<One>
    <Two>1</Two>
    <Two>2</Two>
    <Two>3</Two>
    <Three>
        <Hello>World</Hello>
        <Hello>World Again</Hello>
    </Three>    
</One>
EOD;
        $el = new \SimpleXMLElement($xml);
        $arrayed = Xml::toArray($el);

        $this->assertEquals([
            'Two' => [1, 2, 3],
            'Three' => [
                'Hello' => [
                    'World',
                    'World Again',
                ],
            ],
        ], $arrayed);
    }

}
