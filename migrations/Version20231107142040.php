<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231107142040 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE modulee ADD entrepot_id INT NOT NULL');
        $this->addSql('ALTER TABLE modulee ADD CONSTRAINT FK_DA63F68672831E97 FOREIGN KEY (entrepot_id) REFERENCES entrepot (id)');
        $this->addSql('CREATE INDEX IDX_DA63F68672831E97 ON modulee (entrepot_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE modulee DROP FOREIGN KEY FK_DA63F68672831E97');
        $this->addSql('DROP INDEX IDX_DA63F68672831E97 ON modulee');
        $this->addSql('ALTER TABLE modulee DROP entrepot_id');
    }
}
