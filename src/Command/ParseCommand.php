<?php

namespace App\Command;

use App\Parser\Notifications;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'parse:notifications',
    description: 'Parse notifications.',
)]
class ParseCommand extends Command
{

    public function __construct(
        private Notifications $notifications
    )
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->notifications->handle();

        return Command::SUCCESS;
    }
}
