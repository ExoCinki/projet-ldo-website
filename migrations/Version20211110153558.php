<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211110153558 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE crafter (id INT AUTO_INCREMENT NOT NULL, pseudo VARCHAR(255) NOT NULL, craft_and_niveau VARCHAR(255) NOT NULL, disc_id VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE farm (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, details VARCHAR(255) NOT NULL, check_or_not DOUBLE PRECISION NOT NULL, created_at DATETIME NOT NULL, finished_at DATETIME DEFAULT NULL, name_user VARCHAR(255) NOT NULL, farmeur VARCHAR(255) DEFAULT NULL, quantity VARCHAR(10) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gemme (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, details VARCHAR(255) NOT NULL, tier VARCHAR(1) NOT NULL, picture VARCHAR(255) DEFAULT NULL, stuff VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE news (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, picture VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, fab_armes INT DEFAULT NULL, fab_armures INT DEFAULT NULL, ingenierie INT DEFAULT NULL, joaillerie INT DEFAULT NULL, arts_obscurs INT DEFAULT NULL, cuisine INT DEFAULT NULL, ameublement INT DEFAULT NULL, sword_shield INT DEFAULT NULL, lance INT DEFAULT NULL, arc INT DEFAULT NULL, baton_feu INT DEFAULT NULL, rapiere INT DEFAULT NULL, hache_double INT DEFAULT NULL, mousquet INT DEFAULT NULL, baton_vie INT DEFAULT NULL, hachette INT DEFAULT NULL, marteau_darmes INT DEFAULT NULL, gantelets_glace INT DEFAULT NULL, gear_score INT DEFAULT NULL, stat_for INT DEFAULT NULL, stat_dex INT DEFAULT NULL, stat_int INT DEFAULT NULL, stat_concen INT DEFAULT NULL, stat_forme INT DEFAULT NULL, discordid VARCHAR(255) NOT NULL, pseudo VARCHAR(255) NOT NULL, spe VARCHAR(255) NOT NULL, compagnie VARCHAR(255) DEFAULT NULL, first_weapon VARCHAR(255) NOT NULL, second_weapon VARCHAR(255) NOT NULL, level INT NOT NULL, tailleur_de_pierre INT NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE crafter');
        $this->addSql('DROP TABLE farm');
        $this->addSql('DROP TABLE gemme');
        $this->addSql('DROP TABLE news');
        $this->addSql('DROP TABLE user');
    }
}
