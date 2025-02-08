<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Faker\Factory;
use App\Entity\Personne;
use Doctrine\ORM\EntityManagerInterface;

#[AsCommand(
    name: 'app:add-data',
    description: 'Commande qui ajoute des données à la base de données',
)]
class AddDataCommand extends Command
{
    private EntityManagerInterface $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct();
        $this->entityManager = $entityManager;
    }

    protected function configure(): void
    {
        $this
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
            $personne = new Personne();
            $personne->setName($faker->lastName);
            $personne->setPrenom($faker->firstName);
            $personne->setAge($faker->numberBetween(18, 70));

            $this->entityManager->persist($personne);
        }

        $this->entityManager->flush();

        $io->success('10 Persons records have been added to the database.');

        return Command::SUCCESS;
    }
}