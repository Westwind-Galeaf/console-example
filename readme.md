# Основа для создания консольной утилиты

Представляет собой обертку над Symfony Console Component. С удобным способом организации консольных команд.


## Установка:

1. Скачайте или склонируйте репозиторий

2. Выполните команду `composer install`


## Использование:

В директории приложения запустите `php do`. Будет отображен список доступных команд. Для запуска команды используйте `php do название_команды`. 


## Создание новой команды:

Создайте новый класс команды в директории `app/Commands`. Пример класса команды команды:

```php
<?php
namespace App\Commands;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ExampleCommand extends BaseCommand
{
    /**
     * Command name
     *
     * @var string
     */
    public $command = 'example';
    /**
     * Command description
     *
     * @var string
     */
    public $description = 'Example a command';
  
    /**
     * Execute a command
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return null
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        // TODO 
    }
}
```

## Добавление команды

Класс `App\Console` (`app/Console.php`) содержит свойство `$commands`, представленое в виде массива. Добавьте класс вашей команды в данный массив, после чего команда будет доступна на выполнение. 
