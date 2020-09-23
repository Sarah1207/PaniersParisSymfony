<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200923130453 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE paniers (id INT AUTO_INCREMENT NOT NULL, nom_panier VARCHAR(50) NOT NULL, description_panier LONGTEXT NOT NULL, prix_panier INT NOT NULL, poids_panier DOUBLE PRECISION NOT NULL, stock INT NOT NULL, composition LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE producteurs (id INT AUTO_INCREMENT NOT NULL, prenom VARCHAR(70) NOT NULL, nom VARCHAR(70) NOT NULL, type VARCHAR(100) NOT NULL, ville VARCHAR(100) NOT NULL, departement VARCHAR(10) NOT NULL, description_producteur LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produits (id INT AUTO_INCREMENT NOT NULL, producteur_id INT NOT NULL, nom_produit VARCHAR(100) NOT NULL, INDEX IDX_BE2DDF8CAB9BB300 (producteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE produits ADD CONSTRAINT FK_BE2DDF8CAB9BB300 FOREIGN KEY (producteur_id) REFERENCES producteurs (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produits DROP FOREIGN KEY FK_BE2DDF8CAB9BB300');
        $this->addSql('DROP TABLE paniers');
        $this->addSql('DROP TABLE producteurs');
        $this->addSql('DROP TABLE produits');
    }
}
