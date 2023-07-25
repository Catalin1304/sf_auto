<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230725115252 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE car_order (id INT AUTO_INCREMENT NOT NULL, vehicle_id INT NOT NULL, worker_id INT NOT NULL, details VARCHAR(255) NOT NULL, INDEX IDX_2A82164F545317D1 (vehicle_id), INDEX IDX_2A82164F6B20BA36 (worker_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE car_order ADD CONSTRAINT FK_2A82164F545317D1 FOREIGN KEY (vehicle_id) REFERENCES vehicle (id)');
        $this->addSql('ALTER TABLE car_order ADD CONSTRAINT FK_2A82164F6B20BA36 FOREIGN KEY (worker_id) REFERENCES worker (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vehicle DROP FOREIGN KEY FK_1B80E486CFFE9AD6');
        $this->addSql('ALTER TABLE car_order DROP FOREIGN KEY FK_2A82164F545317D1');
        $this->addSql('ALTER TABLE car_order DROP FOREIGN KEY FK_2A82164F6B20BA36');
        $this->addSql('DROP TABLE car_order');
    }
}
