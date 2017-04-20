<?php

namespace App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ExampleCommand extends BaseCommand
{
    /**
     * Название команды
     *
     * @var string
     */
    public $command = 'example';

    /**
     * Описание команды
     *
     * @var string
     */
    public $description = 'Example a command';

    /**
     * Сообщение, которое будет выводиться при выполнении команды
     *
     * @var string
     */
    public $message = "Hello world\n";

    /**
     * Метод исполнят команду
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return null|int null
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln($this->message);
    }
}