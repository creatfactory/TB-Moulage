<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200207185710 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE objets_photos');
        $this->addSql('ALTER TABLE types ADD CONSTRAINT FK_59308930301EC62 FOREIGN KEY (photos_id) REFERENCES photos (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_59308930301EC62 ON types (photos_id)');
        $this->addSql('ALTER TABLE photos DROP photo_types');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE objets_photos (objets_id INT NOT NULL, photos_id INT NOT NULL, INDEX IDX_84926678301EC62 (photos_id), INDEX IDX_849266786C3A2500 (objets_id), PRIMARY KEY(objets_id, photos_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE objets_photos ADD CONSTRAINT FK_84926678301EC62 FOREIGN KEY (photos_id) REFERENCES photos (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE objets_photos ADD CONSTRAINT FK_849266786C3A2500 FOREIGN KEY (objets_id) REFERENCES objets (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE photos ADD photo_types VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE types DROP FOREIGN KEY FK_59308930301EC62');
        $this->addSql('DROP INDEX UNIQ_59308930301EC62 ON types');
    }
}
