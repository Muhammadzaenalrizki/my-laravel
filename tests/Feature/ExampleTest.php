<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Box;

// assertTrue() ->return yang di kembalikan harus true
// assertFalse()->return yang di kembalikan harus false
// assertEquals()->akan membandingkan nilai yang di pass dan yang di kembalian(nilai yang dikembalikan harus sama)
// assertNull()->nilai yang di kembalikan harus null
// assertContains()
// assertCount()
// assertEmpty()
// assertStatus()

class ExampleTest extends TestCase
{
    # Test function for Box class
    public function test_BoxContents()
    {
        $box = new Box(['toy']);
        $this->assertTrue($box->has('toy'));
        $this->assertFalse($box->has('ball'));
    }
    public function testTakeOneFromTheBox()
    {
        $box = new Box(['torch']);
        $this->assertEquals('torch', $box->takeOne());
        // Null, now the box is empty
        $this->assertNull($box->takeOne());
    }
}
