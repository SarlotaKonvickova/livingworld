<?php

declare(strict_types = 1);

namespace LivingWorld;

use http\Exception\InvalidArgumentException;
use LivingWorld\World\Matrix;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class LivingCommand extends Command
{

    protected function configure(): void
    {
        $this->setName('living:command')
            ->addArgument('rows', InputArgument::REQUIRED)
            ->addArgument('columns', InputArgument::REQUIRED)
            ->addArgument('iterations', InputArgument::REQUIRED)
            ->setDescription('This command does write matrix of organism.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $rowsValue = $input->getArgument('rows');
        $columnValue = $input->getArgument('columns');
        $iterationsValue = $input->getArgument('iterations');

        if (is_numeric($rowsValue) === false) {
            throw new InvalidArgumentException('Argument rows must be Integer.');
        }
        $rowsValue = intval($rowsValue);

        if (is_numeric($columnValue) === false) {
            throw new InvalidArgumentException('Argument columns must be Integer.');
        }
        $columnValue = intval($columnValue);

        if (is_numeric($iterationsValue) === false) {
            throw new InvalidArgumentException('Argument iterations must be Integer.');
        }
        $iterationsValue = intval($iterationsValue);

        $output->writeln(
            sprintf(
                'Count of rows was %d.',
                $rowsValue
            )
        );
        $output->writeln(
            sprintf(
                'Count of columns was %d.',
                $columnValue
            )
        );

        $matrix = new Matrix($rowsValue, $columnValue);
        $this->fillMatrix($matrix, $rowsValue, $columnValue);
        $output->write($matrix->toString());

        return 0;
    }

    public function fillMatrix(Matrix $matrix, int $rows, int $columns): void
    {
        for ($i = 1; $i < $rows; $i++) {
            $matrix->getRows();
            for ($j = 1; $j < $columns; $j++) {
                $matrix->getColumns();
                $rand_keys = random_int(0, 100);
                if ($rand_keys > 50) {
                    $matrix->addOrganism($i, $j);
                }
            }
        }
    }

}
