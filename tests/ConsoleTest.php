<?php

namespace Tests;

use App\Commands\ExampleCommand;
use Symfony\Component\Console\Application;
use App\Console;

class ConsoleTest extends TestCase
{
    /**
     * Проверям наличия связи с консольным приложением;
     *
     * @group Console
     */
    public function testCheckConsoleApplication()
    {
        $console = new Console;

        $this->assertNotNull($console->application);
        $this->assertInstanceOf(Application::class, $console->application);
    }

    /**
     * Проверяем наличие списка команд;
     *
     * @group Console
     */
    public function testCheckCommandList()
    {
        $console = new Console;

        $this->assertNotNull($console->commands);
        $this->assertInternalType('array', $console->commands);
    }

    /**
     * Проверям заполнение консольного приложения нашими командами;
     *
     * @group Console
     */
    public function testCheckAddCommandToConsoleApplicationFromCommandList()
    {
        $console = new Console;
        $console->commands = [];
        $defaultCommandInApplication = $console->application->all();
        $command = ExampleCommand::class;
        $commandInstance = new $command;
        $console->commands = [$command];

        $console->fire();

        $this->assertArrayNotHasKey($commandInstance->command, $defaultCommandInApplication);
        $this->assertArrayHasKey($commandInstance->command, $console->application->all());
    }

    /**
     * Проверяем факт запуска консольного приложения;
     *
     * @group Console
     */
    public function testCheckRunMethod()
    {
        $console = new Console;
        $mock = $this->getMockBuilder(Application::class)
            ->setMethods(['run'])
            ->getMock();

        $mock->expects($this->once())
            ->method('run')
            ->willReturn(true);

        $console->application = $mock;

        $this->assertTrue($console->run());
    }
}