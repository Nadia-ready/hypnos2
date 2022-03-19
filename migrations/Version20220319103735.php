<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220319103735 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reservations_establishments (reservations_id INT NOT NULL, establishments_id INT NOT NULL, INDEX IDX_6F13A6B6D9A7F869 (reservations_id), INDEX IDX_6F13A6B6FB158A1F (establishments_id), PRIMARY KEY(reservations_id, establishments_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reservations_establishments ADD CONSTRAINT FK_6F13A6B6D9A7F869 FOREIGN KEY (reservations_id) REFERENCES reservations (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservations_establishments ADD CONSTRAINT FK_6F13A6B6FB158A1F FOREIGN KEY (establishments_id) REFERENCES establishments (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE reservations_establishments');
    }
}
