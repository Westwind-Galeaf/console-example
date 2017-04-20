<?php

namespace App;

use App\Commands\ExampleCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Console
{
    /**
     * Приложения обработки консольных комманд
     *
     * @var Application
     */
    public $application;

    /**
     * Список задействованных комманд
     *
     * @var array
     */
    public $commands = [
        ExampleCommand::class,
    ];

    /**
     * Console constructor.
     */
    public function __construct()
    {
        $this->application = new Application;
    }

    /**
     * Запуск консольной утилиты;
     *
     * @return $this
     */
    public function fire()
    {
        $this->buildCommandListInApplication();

        return $this;
    }

    /**
     * Запускаем консольное приложение;
     *
     * @param InputInterface|null $input
     * @param OutputInterface|null $output
     * @return int
     */
    public function run(InputInterface $input = null, OutputInterface $output = null)
    {
        return $this->application->run($input, $output);;
    }

    /**
     * Построение списка комманд в консольном приложении
     *
     * @return bool
     */
    private function buildCommandListInApplication()
    {
        if(empty($this->commands)) {
            return false;
        }

        foreach ($this->commands as $command) {
            $this->application->add(new $command);
        }
    }
}