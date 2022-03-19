<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220319103857 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reservations_suites (reservations_id INT NOT NULL, suites_id INT NOT NULL, INDEX IDX_F9695D0DD9A7F869 (reservations_id), INDEX IDX_F9695D0DF452D9C6 (suites_id), PRIMARY KEY(reservations_id, suites_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reservations_suites ADD CONSTRAINT FK_F9695D0DD9A7F869 FOREIGN KEY (reservations_id) REFERENCES reservations (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservations_suites ADD CONSTRAINT FK_F9695D0DF452D9C6 FOREIGN KEY (suites_id) REFERENCES suites (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE reservations_suites');
    }
}
