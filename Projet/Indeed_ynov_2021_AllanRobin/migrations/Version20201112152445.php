<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201112152445 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contrat DROP FOREIGN KEY FK_603499936C83CD9F');
        $this->addSql('DROP INDEX UNIQ_603499936C83CD9F ON contrat');
        $this->addSql('ALTER TABLE contrat DROP offres_id');
        $this->addSql('ALTER TABLE offres ADD type_contrat_id INT NOT NULL, ADD contrat_id INT NOT NULL');
        $this->addSql('ALTER TABLE offres ADD CONSTRAINT FK_C6AC3544520D03A FOREIGN KEY (type_contrat_id) REFERENCES type_contrat (id)');
        $this->addSql('ALTER TABLE offres ADD CONSTRAINT FK_C6AC35441823061F FOREIGN KEY (contrat_id) REFERENCES contrat (id)');
        $this->addSql('CREATE INDEX IDX_C6AC3544520D03A ON offres (type_contrat_id)');
        $this->addSql('CREATE INDEX IDX_C6AC35441823061F ON offres (contrat_id)');
        $this->addSql('ALTER TABLE type_contrat DROP FOREIGN KEY FK_4815F6664CC8505A');
        $this->addSql('DROP INDEX UNIQ_4815F6664CC8505A ON type_contrat');
        $this->addSql('ALTER TABLE type_contrat DROP offre_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contrat ADD offres_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE contrat ADD CONSTRAINT FK_603499936C83CD9F FOREIGN KEY (offres_id) REFERENCES offres (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_603499936C83CD9F ON contrat (offres_id)');
        $this->addSql('ALTER TABLE offres DROP FOREIGN KEY FK_C6AC3544520D03A');
        $this->addSql('ALTER TABLE offres DROP FOREIGN KEY FK_C6AC35441823061F');
        $this->addSql('DROP INDEX IDX_C6AC3544520D03A ON offres');
        $this->addSql('DROP INDEX IDX_C6AC35441823061F ON offres');
        $this->addSql('ALTER TABLE offres DROP type_contrat_id, DROP contrat_id');
        $this->addSql('ALTER TABLE type_contrat ADD offre_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE type_contrat ADD CONSTRAINT FK_4815F6664CC8505A FOREIGN KEY (offre_id) REFERENCES offres (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4815F6664CC8505A ON type_contrat (offre_id)');
    }
}
