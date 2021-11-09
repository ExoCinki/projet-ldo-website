<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211109011435 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE farm_user');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE farm_user (farm_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_C38C06C65FCFA0D (farm_id), INDEX IDX_C38C06CA76ED395 (user_id), PRIMARY KEY(farm_id, user_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE farm_user ADD CONSTRAINT FK_C38C06C65FCFA0D FOREIGN KEY (farm_id) REFERENCES farm (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE farm_user ADD CONSTRAINT FK_C38C06CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
    }
}
