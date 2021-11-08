<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211106143743 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD fab_armes VARCHAR(3) DEFAULT NULL, ADD fab_armures VARCHAR(3) DEFAULT NULL, ADD ingenierie VARCHAR(3) NOT NULL, ADD joaillerie VARCHAR(3) DEFAULT NULL, ADD arts_obscurs VARCHAR(3) DEFAULT NULL, ADD cuisine VARCHAR(3) NOT NULL, ADD ameublement VARCHAR(3) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP fab_armes, DROP fab_armures, DROP ingenierie, DROP joaillerie, DROP arts_obscurs, DROP cuisine, DROP ameublement');
    }
}
