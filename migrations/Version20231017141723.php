<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231017141723 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE entrepot (id INT AUTO_INCREMENT NOT NULL, adresse LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prod_entrepot (id INT AUTO_INCREMENT NOT NULL, prod_entrepot_id INT DEFAULT NULL, relation_id INT DEFAULT NULL, module VARCHAR(255) NOT NULL, rangee VARCHAR(255) NOT NULL, section VARCHAR(255) NOT NULL, etagere VARCHAR(255) NOT NULL, quantitee_produits INT NOT NULL, INDEX IDX_761DA50DDEEF7260 (prod_entrepot_id), INDEX IDX_761DA50D3256915B (relation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE prod_entrepot ADD CONSTRAINT FK_761DA50DDEEF7260 FOREIGN KEY (prod_entrepot_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE prod_entrepot ADD CONSTRAINT FK_761DA50D3256915B FOREIGN KEY (relation_id) REFERENCES entrepot (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prod_entrepot DROP FOREIGN KEY FK_761DA50DDEEF7260');
        $this->addSql('ALTER TABLE prod_entrepot DROP FOREIGN KEY FK_761DA50D3256915B');
        $this->addSql('DROP TABLE entrepot');
        $this->addSql('DROP TABLE prod_entrepot');
    }
}
