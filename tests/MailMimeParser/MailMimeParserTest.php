<?php
namespace ZBateson\MailMimeParser;

use PHPUnit\Framework\TestCase;

/**
 * Description of MailMimeParserTest
 *
 * @group MailMimeParser
 * @group Base
 * @covers ZBateson\MailMimeParser\MailMimeParser
 * @author Zaahid Bateson
 */
class MailMimeParserTest extends TestCase
{
    public function testConstructMailMimeParser()
    {
        $mmp = new MailMimeParser();
        $this->assertNotNull($mmp);
    }

    public function testParseFromHandle()
    {
        $mmp = new MailMimeParser();

        $handle = fopen('php://memory', 'r+');
        fwrite($handle, 'This is a test');
        rewind($handle);

        $ret = $mmp->parse($handle);
        $this->assertNotNull($ret);
        $this->assertInstanceOf('ZBateson\MailMimeParser\Message', $ret);
    }

    public function testParseFromString()
    {
        $mmp = new MailMimeParser();

        $ret = $mmp->parse('This is a test');
        $this->assertNotNull($ret);
        $this->assertInstanceOf('ZBateson\MailMimeParser\Message', $ret);
    }
}
