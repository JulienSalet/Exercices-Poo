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
        $this->assertSame('my_string', Str::on('myString')->snakeCase()->toString());
    }

    public function testExo4()
    {
        $this->assertSame('my-string', Str::on('my_string')->slugcase()->toString());
        $this->assertSame('my-string', Str::on('my-String')->slugcase()->toString());
        $this->assertSame('my-string', Str::on('my string')->slugcase()->toString());
        $this->assertSame('my-string', Str::on('My String')->slugcase()->toString());
        $this->assertSame('my-string', Str::on('myString')->slugcase()->toString());
    }

    public function testExo5()
    {
        $this->assertSame('MyString', Str::on('my_string')->studlycase()->toString());
        $this->assertSame('MyString', Str::on('my-String')->studlycase()->toString());
        $this->assertSame('MyString', Str::on('my string')->studlycase()->toString());
        $this->assertSame('MyString', Str::on('My String')->studlycase()->toString());
        $this->assertSame('MyString', Str::on('myString')->studlycase()->toString());
    }

    public function testExo6()
    {
        $str = Str::on('mY StrIng');
        $this->assertSame('myString', $str->camelCase()->toString());
        $this->assertSame('my_string',$str->snakeCase()->toString());
        $this->assertSame('MyString',$str->studlyCase()->toString());
        $this->assertSame('MyString',$str->titleCase()->toString());
        $this->assertSame('my-string',$str->slugCase()->toString());
        $this->assertSame('my-string',$str->kebabCase()->toString());
        $this->assertSame('mY StrIng',$str->toString());
        $this->assertSame('mY StrIng',(string) $str);
    }

    public function testExo7()
    {
        $str = str('mY StrIng');
        $str->camelCase === 'myString';
        /*$str->snakeCase === 'my_string';
        $str->studlyCase === 'MyString';
        $str->titleCase === 'MyString';
        $str->slugCase === 'my-string';
        $str->kebabCase === 'my-string';
        $str() === 'mY StrIng';*/
    }
}