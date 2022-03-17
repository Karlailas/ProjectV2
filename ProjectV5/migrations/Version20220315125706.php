<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220315125706 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE items ADD COLUMN condition VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__items AS SELECT id, title, photo, created, changed FROM items');
        $this->addSql('DROP TABLE items');
        $this->addSql('CREATE TABLE items (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, title VARCHAR(255) NOT NULL, photo VARCHAR(255) NOT NULL, created DATETIME NOT NULL, changed DATETIME NOT NULL)');
        $this->addSql('INSERT INTO items (id, title, photo, created, changed) SELECT id, title, photo, created, changed FROM __temp__items');
        $this->addSql('DROP TABLE __temp__items');
    }
}
