<?php

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

include_once 'app/src/controllers/usercontroller.php';
include_once 'app/src/model/dbo.php';

class SelectByIdCommand extends Command
{
    private $id;

    protected function configure()
    {
        $this
            ->setName('getbyid')
            ->setDescription('Display specific user.')
            ->setHelp('This command allows you to get a single from DB...')
            ->addArgument('id', $this->id);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $userController = new UserController(new Dbo());
        $this->id = $input->getArgument('id');

        $output->writeln([
            'User List:',
            '=================================================================',
        ]);
        echo $userController->getById($this->id);

        return Command::SUCCESS;
    }
}
