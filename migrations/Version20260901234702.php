<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260901234702 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE usuario_evento (usuario_id INT NOT NULL, evento_id INT NOT NULL, INDEX IDX_BD94E80CDB38439E (usuario_id), INDEX IDX_BD94E80C87A5F842 (evento_id), PRIMARY KEY (usuario_id, evento_id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750 (queue_name, available_at, delivered_at, id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE usuario_evento ADD CONSTRAINT FK_BD94E80CDB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE usuario_evento ADD CONSTRAINT FK_BD94E80C87A5F842 FOREIGN KEY (evento_id) REFERENCES evento (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE disertante DROP nombreCompleto, DROP especialidad, CHANGE nombre nombre VARCHAR(255) NOT NULL, CHANGE apellido apellido VARCHAR(255) NOT NULL, CHANGE telefono telefono VARCHAR(255) NOT NULL, CHANGE url url VARCHAR(255) NOT NULL, CHANGE twitter twitter VARCHAR(255) NOT NULL, CHANGE linkedin linkedin VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE evento DROP ubicacion, CHANGE slug slug VARCHAR(255) NOT NULL, CHANGE idioma idioma VARCHAR(255) NOT NULL, CHANGE hora hora TIME NOT NULL, CHANGE duracion duracion INT NOT NULL');
        $this->addSql('ALTER TABLE usuario DROP nombreCompleto, DROP institucion, CHANGE nombre nombre VARCHAR(255) NOT NULL, CHANGE apellido apellido VARCHAR(255) NOT NULL, CHANGE dni dni VARCHAR(255) NOT NULL, CHANGE direccion direccion VARCHAR(255) NOT NULL, CHANGE password password VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE usuario_evento DROP FOREIGN KEY FK_BD94E80CDB38439E');
        $this->addSql('ALTER TABLE usuario_evento DROP FOREIGN KEY FK_BD94E80C87A5F842');
        $this->addSql('DROP TABLE usuario_evento');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE disertante ADD nombreCompleto VARCHAR(40) NOT NULL, ADD especialidad VARCHAR(30) NOT NULL, CHANGE nombre nombre VARCHAR(255) DEFAULT \'\' NOT NULL, CHANGE apellido apellido VARCHAR(255) DEFAULT \'\' NOT NULL, CHANGE telefono telefono VARCHAR(255) DEFAULT \'\' NOT NULL, CHANGE url url VARCHAR(255) DEFAULT \'\' NOT NULL, CHANGE twitter twitter VARCHAR(255) DEFAULT \'\' NOT NULL, CHANGE linkedin linkedin VARCHAR(255) DEFAULT \'\' NOT NULL');
        $this->addSql('ALTER TABLE evento ADD ubicacion VARCHAR(30) NOT NULL, CHANGE slug slug VARCHAR(255) DEFAULT \'\' NOT NULL, CHANGE idioma idioma VARCHAR(255) DEFAULT \'\' NOT NULL, CHANGE hora hora TIME DEFAULT \'00:00:00\' NOT NULL, CHANGE duracion duracion INT DEFAULT 0 NOT NULL');
        $this->addSql('ALTER TABLE usuario ADD nombreCompleto VARCHAR(50) NOT NULL, ADD institucion VARCHAR(30) NOT NULL, CHANGE nombre nombre VARCHAR(255) DEFAULT \'\' NOT NULL, CHANGE apellido apellido VARCHAR(255) DEFAULT \'\' NOT NULL, CHANGE dni dni VARCHAR(255) DEFAULT \'\' NOT NULL, CHANGE direccion direccion VARCHAR(255) DEFAULT \'\' NOT NULL, CHANGE password password VARCHAR(255) DEFAULT \'\' NOT NULL');
    }
}
