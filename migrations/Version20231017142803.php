<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231017142803 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prod_entrepot DROP FOREIGN KEY FK_761DA50D3256915B');
        $this->addSql('DROP INDEX IDX_761DA50D3256915B ON prod_entrepot');
        $this->addSql('ALTER TABLE prod_entrepot CHANGE relation_id entrepot_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE prod_entrepot ADD CONSTRAINT FK_761DA50D72831E97 FOREIGN KEY (entrepot_id) REFERENCES entrepot (id)');
        $this->addSql('CREATE INDEX IDX_761DA50D72831E97 ON prod_entrepot (entrepot_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prod_entrepot DROP FOREIGN KEY FK_761DA50D72831E97');
        $this->addSql('DROP INDEX IDX_761DA50D72831E97 ON prod_entrepot');
        $this->addSql('ALTER TABLE prod_entrepot CHANGE entrepot_id relation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE prod_entrepot ADD CONSTRAINT FK_761DA50D3256915B FOREIGN KEY (relation_id) REFERENCES entrepot (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_761DA50D3256915B ON prod_entrepot (relation_id)');
    }
}
