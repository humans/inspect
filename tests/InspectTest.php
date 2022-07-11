<?php

namespace Tests;

use Humans\Inspect\Inspect;
use PHPUnit\Framework\TestCase;

class Voice
{
    public $greeting = 'I am a public greeting.';
    public function greeting()
    {
        return $this->greeting;
    }

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

    private $farewell = 'I am a private farewell';
    private function farewell()
    {
        return $this->farewell;
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
    function it_assigns_public_variables()
    {
        $inspect = new Inspect(new Voice);
        $inspect->greeting = 'Shout, shout, let it all out!';

        $this->assertEquals($inspect->greeting(), 'Shout, shout, let it all out!');
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

    /** @test */
    function it_assigns_private_variables()
    {
        $inspect = new Inspect(new Voice);
        $inspect->farewell = "In case I don't see ya: Good afternoon, good evening, and good night!";

        $this->assertEquals($inspect->farewell(), "In case I don't see ya: Good afternoon, good evening, and good night!");
    }
}