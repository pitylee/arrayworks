<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use App\Entity\MyArray;
use Doctrine\Common\Collections\Criteria;

class AssessmentCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:assessment';

    private $l1;
    private $l2;

    protected function configure(): void
    {
        $this->l1 = [0, 2, 1, 3, 8, 5, 4];
        $this->l2 = [1, 2, 7, 4, 10];

        $this->setName('app:assessment')
            ->setDescription('Assessment')
            ->addArgument(
                'part',
                InputArgument::REQUIRED,
                'Which part'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $part = trim($input->getArgument('part'));

        if ($part === '1') {
            $this->partOne($output);
        }

        if ($part === '2') {
            $this->partTwo($output);
        }

        return Command::SUCCESS;
    }

    /*
     * An algorithm in PHP to implement this function using PHP functions (without Composer external dependencies).
     *
     * @param OutputInterface $output
     * @return void
     */
    private function partOne(OutputInterface $output): void
    {
        $result = array_intersect($this->l1, $this->l2);
        asort($result);

        $output->writeln(
            json_encode(array_values($result))
        );
    }

    /*
     * An algorithm in PHP that is not using any utility functions provided by PHP (no array function form PHP).
     *
     * @param OutputInterface $output
     * @return void
     */
    private function partTwo(OutputInterface $output): void
    {
        $l1MyArray = (new MyArray($this->l1));
        $result = $l1MyArray->intersect((new MyArray($this->l2))->instance())->sort()->toArray();

        $output->writeln(
            json_encode(array_values($result))
        );
    }
}
