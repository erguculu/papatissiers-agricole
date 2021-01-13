<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210113141048 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE buyer (id INT AUTO_INCREMENT NOT NULL, city_id INT NOT NULL, transaction_id INT NOT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_84905FB38BAC62AF (city_id), INDEX IDX_84905FB32FC0CB0F (transaction_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE city (id INT AUTO_INCREMENT NOT NULL, zipcode INT NOT NULL, city VARCHAR(255) NOT NULL, lat DOUBLE PRECISION NOT NULL, `long` DOUBLE PRECISION NOT NULL, insee_code INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE farmer (id INT AUTO_INCREMENT NOT NULL, city_id INT NOT NULL, transaction_id INT NOT NULL, registred_at DATETIME NOT NULL, first_name INT NOT NULL, last_name INT NOT NULL, farm_size INT NOT NULL, INDEX IDX_EC85AC8F8BAC62AF (city_id), INDEX IDX_EC85AC8F2FC0CB0F (transaction_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, transaction_id INT NOT NULL, name VARCHAR(255) NOT NULL, category VARCHAR(255) NOT NULL, INDEX IDX_D34A04AD2FC0CB0F (transaction_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transaction (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, price INT NOT NULL, quantity DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE buyer ADD CONSTRAINT FK_84905FB38BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE buyer ADD CONSTRAINT FK_84905FB32FC0CB0F FOREIGN KEY (transaction_id) REFERENCES transaction (id)');
        $this->addSql('ALTER TABLE farmer ADD CONSTRAINT FK_EC85AC8F8BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE farmer ADD CONSTRAINT FK_EC85AC8F2FC0CB0F FOREIGN KEY (transaction_id) REFERENCES transaction (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD2FC0CB0F FOREIGN KEY (transaction_id) REFERENCES transaction (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE buyer DROP FOREIGN KEY FK_84905FB38BAC62AF');
        $this->addSql('ALTER TABLE farmer DROP FOREIGN KEY FK_EC85AC8F8BAC62AF');
        $this->addSql('ALTER TABLE buyer DROP FOREIGN KEY FK_84905FB32FC0CB0F');
        $this->addSql('ALTER TABLE farmer DROP FOREIGN KEY FK_EC85AC8F2FC0CB0F');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD2FC0CB0F');
        $this->addSql('DROP TABLE buyer');
        $this->addSql('DROP TABLE city');
        $this->addSql('DROP TABLE farmer');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE transaction');
    }
}
