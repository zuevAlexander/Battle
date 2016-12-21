<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161220132422 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE ship (id INT AUTO_INCREMENT NOT NULL, ship_type_id INT NOT NULL, battle_field_id INT NOT NULL, INDEX IDX_FA30EB24CB61BCFE (ship_type_id), INDEX IDX_FA30EB249046A8E6 (battle_field_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE map (id INT AUTO_INCREMENT NOT NULL, latitude INT NOT NULL, longitude INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shot_status (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE battle_field (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, battle_id INT NOT NULL, INDEX IDX_42CE14EAA76ED395 (user_id), INDEX IDX_42CE14EAC9732719 (battle_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, password VARCHAR(255) DEFAULT NULL, token VARCHAR(255) DEFAULT NULL, api_key VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649C912ED9D (api_key), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shot (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, map_id INT NOT NULL, shot_status_id INT NOT NULL, battle_field_id INT NOT NULL, INDEX IDX_AB0788BBA76ED395 (user_id), INDEX IDX_AB0788BB53C55F64 (map_id), INDEX IDX_AB0788BBC299FDB4 (shot_status_id), INDEX IDX_AB0788BB9046A8E6 (battle_field_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE battle (id INT AUTO_INCREMENT NOT NULL, battle_status_id INT NOT NULL, map_type_id INT NOT NULL, name VARCHAR(255) NOT NULL, deleted_at DATETIME DEFAULT NULL, INDEX IDX_13991734E92B85D3 (battle_status_id), INDEX IDX_13991734EA6774CF (map_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE count_ships (id INT AUTO_INCREMENT NOT NULL, ship_type_id INT NOT NULL, map_type_id INT NOT NULL, count INT NOT NULL, INDEX IDX_F922880DCB61BCFE (ship_type_id), INDEX IDX_F922880DEA6774CF (map_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shot_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ship_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ship_location (id INT AUTO_INCREMENT NOT NULL, ship_id INT NOT NULL, map_id INT NOT NULL, INDEX IDX_6D93B91EC256317D (ship_id), INDEX IDX_6D93B91E53C55F64 (map_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE battle_status (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE map_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, size INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ship ADD CONSTRAINT FK_FA30EB24CB61BCFE FOREIGN KEY (ship_type_id) REFERENCES ship_type (id)');
        $this->addSql('ALTER TABLE ship ADD CONSTRAINT FK_FA30EB249046A8E6 FOREIGN KEY (battle_field_id) REFERENCES battle_field (id)');
        $this->addSql('ALTER TABLE battle_field ADD CONSTRAINT FK_42CE14EAA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE battle_field ADD CONSTRAINT FK_42CE14EAC9732719 FOREIGN KEY (battle_id) REFERENCES battle (id)');
        $this->addSql('ALTER TABLE shot ADD CONSTRAINT FK_AB0788BBA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE shot ADD CONSTRAINT FK_AB0788BB53C55F64 FOREIGN KEY (map_id) REFERENCES map (id)');
        $this->addSql('ALTER TABLE shot ADD CONSTRAINT FK_AB0788BBC299FDB4 FOREIGN KEY (shot_status_id) REFERENCES shot_status (id)');
        $this->addSql('ALTER TABLE shot ADD CONSTRAINT FK_AB0788BB9046A8E6 FOREIGN KEY (battle_field_id) REFERENCES battle_field (id)');
        $this->addSql('ALTER TABLE battle ADD CONSTRAINT FK_13991734E92B85D3 FOREIGN KEY (battle_status_id) REFERENCES battle_status (id)');
        $this->addSql('ALTER TABLE battle ADD CONSTRAINT FK_13991734EA6774CF FOREIGN KEY (map_type_id) REFERENCES map_type (id)');
        $this->addSql('ALTER TABLE count_ships ADD CONSTRAINT FK_F922880DCB61BCFE FOREIGN KEY (ship_type_id) REFERENCES ship_type (id)');
        $this->addSql('ALTER TABLE count_ships ADD CONSTRAINT FK_F922880DEA6774CF FOREIGN KEY (map_type_id) REFERENCES map_type (id)');
        $this->addSql('ALTER TABLE ship_location ADD CONSTRAINT FK_6D93B91EC256317D FOREIGN KEY (ship_id) REFERENCES ship (id)');
        $this->addSql('ALTER TABLE ship_location ADD CONSTRAINT FK_6D93B91E53C55F64 FOREIGN KEY (map_id) REFERENCES map (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ship_location DROP FOREIGN KEY FK_6D93B91EC256317D');
        $this->addSql('ALTER TABLE shot DROP FOREIGN KEY FK_AB0788BB53C55F64');
        $this->addSql('ALTER TABLE ship_location DROP FOREIGN KEY FK_6D93B91E53C55F64');
        $this->addSql('ALTER TABLE shot DROP FOREIGN KEY FK_AB0788BBC299FDB4');
        $this->addSql('ALTER TABLE ship DROP FOREIGN KEY FK_FA30EB249046A8E6');
        $this->addSql('ALTER TABLE shot DROP FOREIGN KEY FK_AB0788BB9046A8E6');
        $this->addSql('ALTER TABLE battle_field DROP FOREIGN KEY FK_42CE14EAA76ED395');
        $this->addSql('ALTER TABLE shot DROP FOREIGN KEY FK_AB0788BBA76ED395');
        $this->addSql('ALTER TABLE battle_field DROP FOREIGN KEY FK_42CE14EAC9732719');
        $this->addSql('ALTER TABLE ship DROP FOREIGN KEY FK_FA30EB24CB61BCFE');
        $this->addSql('ALTER TABLE count_ships DROP FOREIGN KEY FK_F922880DCB61BCFE');
        $this->addSql('ALTER TABLE battle DROP FOREIGN KEY FK_13991734E92B85D3');
        $this->addSql('ALTER TABLE battle DROP FOREIGN KEY FK_13991734EA6774CF');
        $this->addSql('ALTER TABLE count_ships DROP FOREIGN KEY FK_F922880DEA6774CF');
        $this->addSql('DROP TABLE ship');
        $this->addSql('DROP TABLE map');
        $this->addSql('DROP TABLE shot_status');
        $this->addSql('DROP TABLE battle_field');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE shot');
        $this->addSql('DROP TABLE battle');
        $this->addSql('DROP TABLE count_ships');
        $this->addSql('DROP TABLE shot_type');
        $this->addSql('DROP TABLE ship_type');
        $this->addSql('DROP TABLE ship_location');
        $this->addSql('DROP TABLE battle_status');
        $this->addSql('DROP TABLE map_type');
    }
}
