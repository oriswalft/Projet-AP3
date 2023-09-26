<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230926115117 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utilisateur ADD telephone INT NOT NULL, ADD date_naissance DATE NOT NULL, ADD nombre_enfant INT DEFAULT NULL, ADD age_enfants INT DEFAULT NULL, ADD sport_pratiquee VARCHAR(255) NOT NULL, ADD date_dernier_achat DATE DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utilisateur DROP telephone, DROP date_naissance, DROP nombre_enfant, DROP age_enfants, DROP sport_pratiquee, DROP date_dernier_achat');
    }
}
