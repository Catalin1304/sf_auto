<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230524150755 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE brand (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fos_user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, username_canonical VARCHAR(180) NOT NULL, email VARCHAR(180) NOT NULL, email_canonical VARCHAR(180) NOT NULL, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) DEFAULT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, confirmation_token VARCHAR(180) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', UNIQUE INDEX UNIQ_957A647992FC23A8 (username_canonical), UNIQUE INDEX UNIQ_957A6479A0D96FBF (email_canonical), UNIQUE INDEX UNIQ_957A6479C05FB297 (confirmation_token), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE grade (id INT AUTO_INCREMENT NOT NULL, role VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE operation (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE operation_worker (operation_id INT NOT NULL, worker_id INT NOT NULL, INDEX IDX_E232060044AC3583 (operation_id), INDEX IDX_E23206006B20BA36 (worker_id), PRIMARY KEY(operation_id, worker_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE owner (id VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profile (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, brand_id INT NOT NULL, name VARCHAR(255) NOT NULL, fuel VARCHAR(255) NOT NULL, manufacture_year VARCHAR(255) NOT NULL, INDEX IDX_8CDE572944F5D008 (brand_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id VARCHAR(255) NOT NULL, role_id INT NOT NULL, profile_id INT DEFAULT NULL, owner_id VARCHAR(255) NOT NULL, INDEX IDX_8D93D649D60322AC (role_id), UNIQUE INDEX UNIQ_8D93D649CCFA12B8 (profile_id), UNIQUE INDEX UNIQ_8D93D6497E3C61F9 (owner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicle (id INT AUTO_INCREMENT NOT NULL, brand_id INT NOT NULL, user_id INT NOT NULL, owner_id INT NOT NULL, plate_number VARCHAR(255) NOT NULL, INDEX IDX_1B80E48644F5D008 (brand_id), INDEX IDX_1B80E486A76ED395 (user_id), INDEX IDX_1B80E4867E3C61F9 (owner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicle_operation (vehicle_id INT NOT NULL, operation_id INT NOT NULL, INDEX IDX_EE3EE33F545317D1 (vehicle_id), INDEX IDX_EE3EE33F44AC3583 (operation_id), PRIMARY KEY(vehicle_id, operation_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE worker (id INT AUTO_INCREMENT NOT NULL, grade_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_9FB2BF62FE19A1A8 (grade_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE operation_worker ADD CONSTRAINT FK_E232060044AC3583 FOREIGN KEY (operation_id) REFERENCES operation (id)');
        $this->addSql('ALTER TABLE operation_worker ADD CONSTRAINT FK_E23206006B20BA36 FOREIGN KEY (worker_id) REFERENCES worker (id)');
        $this->addSql('ALTER TABLE type ADD CONSTRAINT FK_8CDE572944F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649CCFA12B8 FOREIGN KEY (profile_id) REFERENCES profile (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6497E3C61F9 FOREIGN KEY (owner_id) REFERENCES owner (id)');
        $this->addSql('ALTER TABLE vehicle ADD CONSTRAINT FK_1B80E48644F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id)');
        $this->addSql('ALTER TABLE vehicle ADD CONSTRAINT FK_1B80E486A76ED395 FOREIGN KEY (user_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE vehicle ADD CONSTRAINT FK_1B80E4867E3C61F9 FOREIGN KEY (owner_id) REFERENCES vehicle (id)');
        $this->addSql('ALTER TABLE vehicle_operation ADD CONSTRAINT FK_EE3EE33F545317D1 FOREIGN KEY (vehicle_id) REFERENCES vehicle (id)');
        $this->addSql('ALTER TABLE vehicle_operation ADD CONSTRAINT FK_EE3EE33F44AC3583 FOREIGN KEY (operation_id) REFERENCES operation (id)');
        $this->addSql('ALTER TABLE worker ADD CONSTRAINT FK_9FB2BF62FE19A1A8 FOREIGN KEY (grade_id) REFERENCES grade (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE operation_worker DROP FOREIGN KEY FK_E232060044AC3583');
        $this->addSql('ALTER TABLE operation_worker DROP FOREIGN KEY FK_E23206006B20BA36');
        $this->addSql('ALTER TABLE type DROP FOREIGN KEY FK_8CDE572944F5D008');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649D60322AC');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649CCFA12B8');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6497E3C61F9');
        $this->addSql('ALTER TABLE vehicle DROP FOREIGN KEY FK_1B80E48644F5D008');
        $this->addSql('ALTER TABLE vehicle DROP FOREIGN KEY FK_1B80E486A76ED395');
        $this->addSql('ALTER TABLE vehicle DROP FOREIGN KEY FK_1B80E4867E3C61F9');
        $this->addSql('ALTER TABLE vehicle_operation DROP FOREIGN KEY FK_EE3EE33F545317D1');
        $this->addSql('ALTER TABLE vehicle_operation DROP FOREIGN KEY FK_EE3EE33F44AC3583');
        $this->addSql('ALTER TABLE worker DROP FOREIGN KEY FK_9FB2BF62FE19A1A8');
        $this->addSql('DROP TABLE brand');
        $this->addSql('DROP TABLE fos_user');
        $this->addSql('DROP TABLE grade');
        $this->addSql('DROP TABLE operation');
        $this->addSql('DROP TABLE operation_worker');
        $this->addSql('DROP TABLE owner');
        $this->addSql('DROP TABLE profile');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE vehicle');
        $this->addSql('DROP TABLE vehicle_operation');
        $this->addSql('DROP TABLE worker');
    }
}
