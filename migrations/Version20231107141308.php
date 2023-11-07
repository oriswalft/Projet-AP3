<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231107141308 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE etagere (id INT AUTO_INCREMENT NOT NULL, section_id INT NOT NULL, libelle VARCHAR(255) NOT NULL, INDEX IDX_B83FE5C4D823E37A (section_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etagere_produit (etagere_id INT NOT NULL, produit_id INT NOT NULL, INDEX IDX_27023B8A6588D180 (etagere_id), INDEX IDX_27023B8AF347EFB (produit_id), PRIMARY KEY(etagere_id, produit_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE modulee (id INT AUTO_INCREMENT NOT NULL, ilbelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rangee (id INT AUTO_INCREMENT NOT NULL, modulee_id INT NOT NULL, libelle VARCHAR(255) NOT NULL, INDEX IDX_E049043415A4D401 (modulee_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE section (id INT AUTO_INCREMENT NOT NULL, rangee_id INT NOT NULL, libelle VARCHAR(255) NOT NULL, INDEX IDX_2D737AEF2E4FB4AC (rangee_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE etagere ADD CONSTRAINT FK_B83FE5C4D823E37A FOREIGN KEY (section_id) REFERENCES section (id)');
        $this->addSql('ALTER TABLE etagere_produit ADD CONSTRAINT FK_27023B8A6588D180 FOREIGN KEY (etagere_id) REFERENCES etagere (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE etagere_produit ADD CONSTRAINT FK_27023B8AF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE rangee ADD CONSTRAINT FK_E049043415A4D401 FOREIGN KEY (modulee_id) REFERENCES modulee (id)');
        $this->addSql('ALTER TABLE section ADD CONSTRAINT FK_2D737AEF2E4FB4AC FOREIGN KEY (rangee_id) REFERENCES rangee (id)');
        $this->addSql('ALTER TABLE prod_com DROP FOREIGN KEY FK_2F0CE3F98BF5C2E6');
        $this->addSql('ALTER TABLE prod_com DROP FOREIGN KEY FK_2F0CE3F9CD11A2CF');
        $this->addSql('DROP TABLE prod_com');
        $this->addSql('DROP TABLE prod_entrepot');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE prod_com (id INT AUTO_INCREMENT NOT NULL, produits_id INT DEFAULT NULL, commandes_id INT DEFAULT NULL, prix NUMERIC(10, 2) NOT NULL, quantite INT NOT NULL, INDEX IDX_2F0CE3F9CD11A2CF (produits_id), INDEX IDX_2F0CE3F98BF5C2E6 (commandes_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE prod_entrepot (id INT AUTO_INCREMENT NOT NULL, module VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, rangee VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, section VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, etagere VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, quantitee_produits INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE prod_com ADD CONSTRAINT FK_2F0CE3F98BF5C2E6 FOREIGN KEY (commandes_id) REFERENCES commande (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE prod_com ADD CONSTRAINT FK_2F0CE3F9CD11A2CF FOREIGN KEY (produits_id) REFERENCES produit (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE etagere DROP FOREIGN KEY FK_B83FE5C4D823E37A');
        $this->addSql('ALTER TABLE etagere_produit DROP FOREIGN KEY FK_27023B8A6588D180');
        $this->addSql('ALTER TABLE etagere_produit DROP FOREIGN KEY FK_27023B8AF347EFB');
        $this->addSql('ALTER TABLE rangee DROP FOREIGN KEY FK_E049043415A4D401');
        $this->addSql('ALTER TABLE section DROP FOREIGN KEY FK_2D737AEF2E4FB4AC');
        $this->addSql('DROP TABLE etagere');
        $this->addSql('DROP TABLE etagere_produit');
        $this->addSql('DROP TABLE modulee');
        $this->addSql('DROP TABLE rangee');
        $this->addSql('DROP TABLE section');
    }
}
