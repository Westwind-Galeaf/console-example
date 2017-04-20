<?php

namespace Tests\Commands;

use App\Commands\ExampleCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\BufferedOutput;
use Tests\TestCase;

class ExampleCommandTest extends TestCase
{
    /**
     * Проверяем добавляемость комманды.
     *
     * @group ExampleCommand
     */
    public function testFindExampleCommand()
    {
        $application = new Application();
        $command = new ExampleCommand();

        $application->add($command);

        $allCommands = $application->all();

        $this->assertArrayHasKey($command->command, $allCommands);
    }

    /**
     * Проверяем выполняемость команды.
     *
     * @group ExampleCommand
     */
    public function testExecuteExampleCommand()
    {
        $application = new Application();
        $command = new ExampleCommand();
        $application->add($command);
        $input = new ArrayInput(['command' => $command->command]);
        $output = new BufferedOutput();

        $application->doRun($input, $output);

        $this->assertContains($command->message, $output->fetch());
    }

}