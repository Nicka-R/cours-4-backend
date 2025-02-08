<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250208213716 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__personne AS SELECT id, name, age, prenom FROM personne');
        $this->addSql('DROP TABLE personne');
        $this->addSql('CREATE TABLE personne (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, batiment_id INTEGER DEFAULT NULL, name VARCHAR(255) NOT NULL, age INTEGER NOT NULL, prenom VARCHAR(255) NOT NULL, CONSTRAINT FK_FCEC9EFD6F6891B FOREIGN KEY (batiment_id) REFERENCES batiment (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO personne (id, name, age, prenom) SELECT id, name, age, prenom FROM __temp__personne');
        $this->addSql('DROP TABLE __temp__personne');
        $this->addSql('CREATE INDEX IDX_FCEC9EFD6F6891B ON personne (batiment_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__personne AS SELECT id, name, prenom, age FROM personne');
        $this->addSql('DROP TABLE personne');
        $this->addSql('CREATE TABLE personne (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, age INTEGER NOT NULL)');
        $this->addSql('INSERT INTO personne (id, name, prenom, age) SELECT id, name, prenom, age FROM __temp__personne');
        $this->addSql('DROP TABLE __temp__personne');
    }
}
