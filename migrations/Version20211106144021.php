<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211106144021 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD sword_shield VARCHAR(2) DEFAULT NULL, ADD lance VARCHAR(2) DEFAULT NULL, ADD arc VARCHAR(2) DEFAULT NULL, ADD baton_feu VARCHAR(2) DEFAULT NULL, ADD rapiere VARCHAR(2) DEFAULT NULL, ADD hache_double VARCHAR(2) DEFAULT NULL, ADD mousquet VARCHAR(2) DEFAULT NULL, ADD baton_vie VARCHAR(2) DEFAULT NULL, ADD hachette VARCHAR(2) DEFAULT NULL, ADD marteau_darmes VARCHAR(2) DEFAULT NULL, ADD gantelets_glace VARCHAR(2) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP sword_shield, DROP lance, DROP arc, DROP baton_feu, DROP rapiere, DROP hache_double, DROP mousquet, DROP baton_vie, DROP hachette, DROP marteau_darmes, DROP gantelets_glace');
    }
}
