<?php

declare(strict_types = 1);

namespace LivingWorld;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DummyCommand extends Command
{

    protected function configure(): void
    {
        $this->setName('dummy:command')
            ->addArgument('dummyArgument', InputArgument::REQUIRED)
            ->setDescription('This command does nothing, but can be used as a application entry point template.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $dummyArgumentValue = $input->getArgument('dummyArgument');

        if (is_string($dummyArgumentValue) === false) {
            throw new \InvalidArgumentException('Argument "dummyArgument must be of type string"');
        }

        $output->writeln(
            sprintf(
                'Value of argument was %s',
                (string) $dummyArgumentValue
            )
        );

        return 0;
    }

}
