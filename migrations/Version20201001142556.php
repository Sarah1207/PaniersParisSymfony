<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201001142556 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, producteur_id INT NOT NULL, nom_produit VARCHAR(100) NOT NULL, INDEX IDX_6EEAA67DAB9BB300 (producteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, email VARCHAR(100) NOT NULL, commentaire LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE newsletter (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE paniers (id INT AUTO_INCREMENT NOT NULL, nom_panier VARCHAR(50) NOT NULL, description_panier VARCHAR(255) NOT NULL, prix_panier INT NOT NULL, poids_panier DOUBLE PRECISION NOT NULL, stock INT NOT NULL, composition VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE producteurs (id INT AUTO_INCREMENT NOT NULL, prenom VARCHAR(70) NOT NULL, nom VARCHAR(70) NOT NULL, type VARCHAR(100) NOT NULL, ville VARCHAR(100) NOT NULL, departement VARCHAR(10) NOT NULL, description_producteur LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produits (id INT AUTO_INCREMENT NOT NULL, producteur_id INT NOT NULL, nom_produit VARCHAR(100) NOT NULL, INDEX IDX_BE2DDF8CAB9BB300 (producteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quantity_command (id INT AUTO_INCREMENT NOT NULL, panier_id INT NOT NULL, command_id INT NOT NULL, quantite INT NOT NULL, INDEX IDX_7D7E23D1F77D927C (panier_id), INDEX IDX_7D7E23D133E1689A (command_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, pseudo VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, tel VARCHAR(20) NOT NULL, dob VARCHAR(10) NOT NULL, adresse VARCHAR(60) NOT NULL, ville VARCHAR(20) NOT NULL, cp INT NOT NULL, email VARCHAR(40) NOT NULL, is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D64986CC499D (pseudo), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DAB9BB300 FOREIGN KEY (producteur_id) REFERENCES producteurs (id)');
        $this->addSql('ALTER TABLE produits ADD CONSTRAINT FK_BE2DDF8CAB9BB300 FOREIGN KEY (producteur_id) REFERENCES producteurs (id)');
        $this->addSql('ALTER TABLE quantity_command ADD CONSTRAINT FK_7D7E23D1F77D927C FOREIGN KEY (panier_id) REFERENCES paniers (id)');
        $this->addSql('ALTER TABLE quantity_command ADD CONSTRAINT FK_7D7E23D133E1689A FOREIGN KEY (command_id) REFERENCES commande (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE quantity_command DROP FOREIGN KEY FK_7D7E23D133E1689A');
        $this->addSql('ALTER TABLE quantity_command DROP FOREIGN KEY FK_7D7E23D1F77D927C');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DAB9BB300');
        $this->addSql('ALTER TABLE produits DROP FOREIGN KEY FK_BE2DDF8CAB9BB300');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE newsletter');
        $this->addSql('DROP TABLE paniers');
        $this->addSql('DROP TABLE producteurs');
        $this->addSql('DROP TABLE produits');
        $this->addSql('DROP TABLE quantity_command');
        $this->addSql('DROP TABLE user');
    }
}
