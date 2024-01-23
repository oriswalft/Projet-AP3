<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240123132941 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE prod_com (id INT AUTO_INCREMENT NOT NULL, produits_id INT NOT NULL, commande_id INT NOT NULL, prix_unitaire DOUBLE PRECISION NOT NULL, quantite_prod INT NOT NULL, INDEX IDX_2F0CE3F9CD11A2CF (produits_id), INDEX IDX_2F0CE3F982EA2E54 (commande_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE prod_com ADD CONSTRAINT FK_2F0CE3F9CD11A2CF FOREIGN KEY (produits_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE prod_com ADD CONSTRAINT FK_2F0CE3F982EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prod_com DROP FOREIGN KEY FK_2F0CE3F9CD11A2CF');
        $this->addSql('ALTER TABLE prod_com DROP FOREIGN KEY FK_2F0CE3F982EA2E54');
        $this->addSql('DROP TABLE prod_com');
    }
}
