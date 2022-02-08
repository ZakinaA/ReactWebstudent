<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210102124146 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activite (id INT AUTO_INCREMENT NOT NULL, etudiant_id INT NOT NULL, nom VARCHAR(50) NOT NULL, description VARCHAR(255) DEFAULT NULL, date_debut_activite DATE DEFAULT NULL, contexte VARCHAR(255) DEFAULT NULL, INDEX IDX_B8755515DDEAB1A3 (etudiant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE activite_competence (activite_id INT NOT NULL, competence_id INT NOT NULL, INDEX IDX_C824F60A9B0F88B1 (activite_id), INDEX IDX_C824F60A15761DAB (competence_id), PRIMARY KEY(activite_id, competence_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE competence (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE patronus (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, chemin_img VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE statut (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(30) NOT NULL, descriptif VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE activite ADD CONSTRAINT FK_B8755515DDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('ALTER TABLE activite_competence ADD CONSTRAINT FK_C824F60A9B0F88B1 FOREIGN KEY (activite_id) REFERENCES activite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE activite_competence ADD CONSTRAINT FK_C824F60A15761DAB FOREIGN KEY (competence_id) REFERENCES competence (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE section');
        $this->addSql('ALTER TABLE etudiant ADD statut_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT FK_717E22E3F6203804 FOREIGN KEY (statut_id) REFERENCES statut (id)');
        $this->addSql('CREATE INDEX IDX_717E22E3F6203804 ON etudiant (statut_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activite_competence DROP FOREIGN KEY FK_C824F60A9B0F88B1');
        $this->addSql('ALTER TABLE activite_competence DROP FOREIGN KEY FK_C824F60A15761DAB');
        $this->addSql('ALTER TABLE etudiant DROP FOREIGN KEY FK_717E22E3F6203804');
        $this->addSql('CREATE TABLE section (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(5) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, libelle VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE activite');
        $this->addSql('DROP TABLE activite_competence');
        $this->addSql('DROP TABLE competence');
        $this->addSql('DROP TABLE patronus');
        $this->addSql('DROP TABLE statut');
        $this->addSql('DROP INDEX IDX_717E22E3F6203804 ON etudiant');
        $this->addSql('ALTER TABLE etudiant DROP statut_id');
    }
}
