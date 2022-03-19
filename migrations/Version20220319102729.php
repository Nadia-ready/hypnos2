<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220319102729 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE suites ADD establishment_id INT DEFAULT NULL, ADD is_reserved TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE suites ADD CONSTRAINT FK_C91676128565851 FOREIGN KEY (establishment_id) REFERENCES establishments (id)');
        $this->addSql('CREATE INDEX IDX_C91676128565851 ON suites (establishment_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE suites DROP FOREIGN KEY FK_C91676128565851');
        $this->addSql('DROP INDEX IDX_C91676128565851 ON suites');
        $this->addSql('ALTER TABLE suites DROP establishment_id, DROP is_reserved');
    }
}
