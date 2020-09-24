<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200923105548 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE membre ADD pseudo VARCHAR(30) NOT NULL, ADD prenom VARCHAR(30) NOT NULL, ADD nom VARCHAR(40) NOT NULL, ADD tel VARCHAR(20) NOT NULL, ADD birthday VARCHAR(10) NOT NULL, ADD adresse VARCHAR(100) NOT NULL, ADD ville VARCHAR(30) NOT NULL, ADD cp INT NOT NULL, ADD email VARCHAR(40) NOT NULL, ADD mdp VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE membre DROP pseudo, DROP prenom, DROP nom, DROP tel, DROP birthday, DROP adresse, DROP ville, DROP cp, DROP email, DROP mdp');
    }
}
