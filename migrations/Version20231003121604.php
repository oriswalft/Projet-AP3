<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231003121604 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE rayon_produit (rayon_id INT NOT NULL, produit_id INT NOT NULL, INDEX IDX_6FC614A4D3202E52 (rayon_id), INDEX IDX_6FC614A4F347EFB (produit_id), PRIMARY KEY(rayon_id, produit_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE rayon_produit ADD CONSTRAINT FK_6FC614A4D3202E52 FOREIGN KEY (rayon_id) REFERENCES rayon (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE rayon_produit ADD CONSTRAINT FK_6FC614A4F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27BCF5E72D FOREIGN KEY (categorie_id) REFERENCES rayon (id)');
        $this->addSql('CREATE INDEX IDX_29A5EC27BCF5E72D ON produit (categorie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rayon_produit DROP FOREIGN KEY FK_6FC614A4D3202E52');
        $this->addSql('ALTER TABLE rayon_produit DROP FOREIGN KEY FK_6FC614A4F347EFB');
        $this->addSql('DROP TABLE rayon_produit');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27BCF5E72D');
        $this->addSql('DROP INDEX IDX_29A5EC27BCF5E72D ON produit');
    }
}
