<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191226133121 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE objets (id INT AUTO_INCREMENT NOT NULL, type_objets_id INT DEFAULT NULL, nom_objets VARCHAR(255) NOT NULL, photo_objets VARCHAR(255) NOT NULL, text_objets LONGTEXT DEFAULT NULL, footer_objets VARCHAR(255) DEFAULT NULL, INDEX IDX_334ABAD9D8FC6410 (type_objets_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE objets ADD CONSTRAINT FK_334ABAD9D8FC6410 FOREIGN KEY (type_objets_id) REFERENCES types (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE objets');
    }
}
