<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211106144315 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD gear_score VARCHAR(4) DEFAULT NULL, ADD stat_for VARCHAR(3) DEFAULT NULL, ADD stat_dex VARCHAR(3) DEFAULT NULL, ADD stat_int VARCHAR(3) DEFAULT NULL, ADD stat_concen VARCHAR(3) DEFAULT NULL, ADD stat_forme VARCHAR(3) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP gear_score, DROP stat_for, DROP stat_dex, DROP stat_int, DROP stat_concen, DROP stat_forme');
    }
}
