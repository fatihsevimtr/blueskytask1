<?php

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

include_once 'app/src/controllers/usercontroller.php';
include_once 'app/src/model/dbo.php';

class SelectCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('getuser')
            ->setDescription('Display retrieved users.')
            ->setHelp('This command allows you to get users from DB...');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $userController = new UserController(new Dbo());
        $output->writeln([
            'User List:',
            '=================================================================',
        ]);
        echo $userController->getAll();

        return Command::SUCCESS;
    }
}
