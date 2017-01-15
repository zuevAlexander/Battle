<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170113014935 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE battle_field ADD battle_field_status_id INT NOT NULL');
        $this->addSql('ALTER TABLE battle_field ADD CONSTRAINT FK_42CE14EA4B3F1E30 FOREIGN KEY (battle_field_status_id) REFERENCES battle_field_status (id)');
        $this->addSql('CREATE INDEX IDX_42CE14EA4B3F1E30 ON battle_field (battle_field_status_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE battle_field DROP FOREIGN KEY FK_42CE14EA4B3F1E30');
        $this->addSql('DROP INDEX IDX_42CE14EA4B3F1E30 ON battle_field');
        $this->addSql('ALTER TABLE battle_field DROP battle_field_status_id');
    }
}
