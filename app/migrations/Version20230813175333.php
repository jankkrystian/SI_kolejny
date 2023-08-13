<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230813175333 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE creators (id INT AUTO_INCREMENT NOT NULL, nick VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, surname VARCHAR(255) NOT NULL, UNIQUE INDEX uq_creators_nick (nick), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE books ADD creator_id INT DEFAULT NULL, DROP author');
        $this->addSql('ALTER TABLE books ADD CONSTRAINT FK_4A1B2A9261220EA6 FOREIGN KEY (creator_id) REFERENCES creators (id)');
        $this->addSql('CREATE INDEX IDX_4A1B2A9261220EA6 ON books (creator_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE books DROP FOREIGN KEY FK_4A1B2A9261220EA6');
        $this->addSql('DROP TABLE creators');
        $this->addSql('DROP INDEX IDX_4A1B2A9261220EA6 ON books');
        $this->addSql('ALTER TABLE books ADD author VARCHAR(255) NOT NULL, DROP creator_id');
    }
}
