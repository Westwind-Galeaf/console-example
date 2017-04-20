<?php

namespace App\Commands;

use Symfony\Component\Console\Command\Command;

class BaseCommand extends Command {

    /**
     * Название команды
     *
     * @var string
     */
    public $command;

    /**
     * Описание команды
     *
     * @var string
     */
    public $description;

    /**
     * Конфигурируем команду
     */
    public function configure()
    {
        $this->setName($this->command)
            ->setDescription($this->description);
    }
}