<?php

namespace Tests;

use Humans\Inspect\Inspect;
use PHPUnit\Framework\TestCase;

class Voice
{
    public $shout = 'I am a public property.';
    public function shout()
    {
        return 'I am a public method.';
    }

    private $whisper = 'I am a private property.';
    private function whisper()
    {
        return 'I am a private method.';
    }
}

class InspectTest extends TestCase
{
    /** @test */
    function it_accesses_public_properties()
    {
        $inspect = new Inspect(new Voice);

        $this->assertEquals($inspect->shout, 'I am a public property.');
    }

    /** @test */
    function it_accesses_public_methods()
    {
        $inspect = new Inspect(new Voice);

        $this->assertEquals($inspect->shout(), 'I am a public method.');
    }

    /** @test */
    function it_accesses_private_properties()
    {
        $inspect = new Inspect(new Voice);

        $this->assertEquals($inspect->whisper, 'I am a private property.');
    }

    /** @test */
    function it_accesses_private_methods()
    {
        $inspect = new Inspect(new Voice);

        $this->assertEquals($inspect->whisper(), 'I am a private method.');
    }
}