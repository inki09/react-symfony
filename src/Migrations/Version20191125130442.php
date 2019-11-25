<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191125130442 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE Commune (id INT AUTO_INCREMENT NOT NULL, region_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_2D5FE87298260155 (region_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Movie (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Province (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Region (id INT AUTO_INCREMENT NOT NULL, province_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_8CEF440E946114A (province_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE Commune ADD CONSTRAINT FK_2D5FE87298260155 FOREIGN KEY (region_id) REFERENCES Region (id)');
        $this->addSql('ALTER TABLE Region ADD CONSTRAINT FK_8CEF440E946114A FOREIGN KEY (province_id) REFERENCES Province (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Region DROP FOREIGN KEY FK_8CEF440E946114A');
        $this->addSql('ALTER TABLE Commune DROP FOREIGN KEY FK_2D5FE87298260155');
        $this->addSql('DROP TABLE Commune');
        $this->addSql('DROP TABLE Movie');
        $this->addSql('DROP TABLE Province');
        $this->addSql('DROP TABLE Region');
    }
}
