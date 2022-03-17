<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220317114212 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE items ADD COLUMN condition_description VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__items AS SELECT id, title, photo, created, changed, condition FROM items');
        $this->addSql('DROP TABLE items');
        $this->addSql('CREATE TABLE items (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, title VARCHAR(255) NOT NULL, photo VARCHAR(255) NOT NULL, created DATETIME NOT NULL, changed DATETIME NOT NULL, condition VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO items (id, title, photo, created, changed, condition) SELECT id, title, photo, created, changed, condition FROM __temp__items');
        $this->addSql('DROP TABLE __temp__items');
    }
}
