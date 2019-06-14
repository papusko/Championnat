<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190614125749 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE `match` (id INT AUTO_INCREMENT NOT NULL, equipe_adomicile_id INT DEFAULT NULL, equipe_exterieur_id INT DEFAULT NULL, score_equipe_domicile INT NOT NULL, score_equipe_exterieur INT NOT NULL, INDEX IDX_7A5BC505B0CD4ABC (equipe_adomicile_id), INDEX IDX_7A5BC50521ECD755 (equipe_exterieur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipes (id INT AUTO_INCREMENT NOT NULL, nom_equipe VARCHAR(255) NOT NULL, prenom_et_nom_coach VARCHAR(255) NOT NULL, nombre_de_joueur INT NOT NULL, nom_du_stade VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `match` ADD CONSTRAINT FK_7A5BC505B0CD4ABC FOREIGN KEY (equipe_adomicile_id) REFERENCES equipes (id)');
        $this->addSql('ALTER TABLE `match` ADD CONSTRAINT FK_7A5BC50521ECD755 FOREIGN KEY (equipe_exterieur_id) REFERENCES equipes (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE `match` DROP FOREIGN KEY FK_7A5BC505B0CD4ABC');
        $this->addSql('ALTER TABLE `match` DROP FOREIGN KEY FK_7A5BC50521ECD755');
        $this->addSql('DROP TABLE `match`');
        $this->addSql('DROP TABLE equipes');
    }
}
