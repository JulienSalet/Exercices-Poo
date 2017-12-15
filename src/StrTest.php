<?php

namespace Strings;

use PHPUnit\Framework\TestCase;

class StrTest extends TestCase
{
    public function testExo1()
    {

        $string = (string) Str::on('my_string')
            ->replace('_', ' ')
            ->ucwords()
            ->replace(' ', '')
            ->lcfirst();

        $this->assertSame('myString', $string);
    }

    public function testExo1_5()
    {
        $this->assertTrue(Str::on('my_string')->camelCase()->toString() === 'myString');
    }

    public function testExo2()
    {
        $this->assertTrue(Str::on('my_string')->camelCase()->toString() === 'myString');
        $this->assertTrue(Str::on('myString')->camelCase()->toString() === 'myString');
        $this->assertTrue(Str::on('my-String')->camelCase()->toString() === 'myString');
        $this->assertTrue(Str::on('my string')->camelCase()->toString() === 'myString');
        $this->assertTrue(Str::on('My String')->camelCase()->toString() === 'myString');
    }

    public function testExo3()
    {
        $this->assertSame('my_string', Str::on('my_string')->snakeCase()->toString());
        $this->assertSame('my_string', Str::on('my-String')->snakeCase()->toString());
        $this->assertSame('my_string', Str::on('my string')->snakeCase()->toString());
        $this->assertSame('my_string', Str::on('My String')->snakeCase()->toString());
        /*$this->assertSame('my_string', Str::on('myString')->snakeCase()->toString());*/
    }
}