<?php

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

include_once 'app/src/controllers/usercontroller.php';
include_once 'app/src/model/dbo.php';

class CreateCommand extends Command
{
    private $fname;
    private $lname;
    private $email;

    protected function configure()
    {
        $this
            ->setName('createuser')
            ->setDescription('Create users.')
            ->setHelp('This command allows you to create users in DB...')
            ->addArgument('fname', $this->fname)
            ->addArgument('lname', $this->lname)
            ->addArgument('email', $this->email);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $userController = new UserController(new Dbo());
        $this->fname = $input->getArgument('fname');
        $this->lname = $input->getArgument('lname');
        $this->email = $input->getArgument('email');
        $output->writeln([$this->fname, 'User Created............']);
        $userController->save($this->fname, $this->lname, $this->email);

        return Command::SUCCESS;
    }
}
