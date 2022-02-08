<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210102125412 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE etudiant ADD patronus_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT FK_717E22E37602A6AC FOREIGN KEY (patronus_id) REFERENCES patronus (id)');
        $this->addSql('CREATE INDEX IDX_717E22E37602A6AC ON etudiant (patronus_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE etudiant DROP FOREIGN KEY FK_717E22E37602A6AC');
        $this->addSql('DROP INDEX IDX_717E22E37602A6AC ON etudiant');
        $this->addSql('ALTER TABLE etudiant DROP patronus_id');
    }
}
