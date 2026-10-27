<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260902000642 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE evento_usuario (evento_id INT NOT NULL, usuario_id INT NOT NULL, INDEX IDX_3EF0782287A5F842 (evento_id), INDEX IDX_3EF07822DB38439E (usuario_id), PRIMARY KEY (evento_id, usuario_id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE evento_usuario ADD CONSTRAINT FK_3EF0782287A5F842 FOREIGN KEY (evento_id) REFERENCES evento (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE evento_usuario ADD CONSTRAINT FK_3EF07822DB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE usuario_evento DROP FOREIGN KEY `FK_BD94E80C87A5F842`');
        $this->addSql('ALTER TABLE usuario_evento DROP FOREIGN KEY `FK_BD94E80CDB38439E`');
        $this->addSql('DROP TABLE usuario_evento');
        $this->addSql('ALTER TABLE evento ADD disertante_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE evento ADD CONSTRAINT FK_47860B0554115B4B FOREIGN KEY (disertante_id) REFERENCES disertante (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_47860B05989D9B62 ON evento (slug)');
        $this->addSql('CREATE INDEX IDX_47860B0554115B4B ON evento (disertante_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE usuario_evento (usuario_id INT NOT NULL, evento_id INT NOT NULL, INDEX IDX_BD94E80CDB38439E (usuario_id), INDEX IDX_BD94E80C87A5F842 (evento_id), PRIMARY KEY (usuario_id, evento_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE usuario_evento ADD CONSTRAINT `FK_BD94E80C87A5F842` FOREIGN KEY (evento_id) REFERENCES evento (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE usuario_evento ADD CONSTRAINT `FK_BD94E80CDB38439E` FOREIGN KEY (usuario_id) REFERENCES usuario (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE evento_usuario DROP FOREIGN KEY FK_3EF0782287A5F842');
        $this->addSql('ALTER TABLE evento_usuario DROP FOREIGN KEY FK_3EF07822DB38439E');
        $this->addSql('DROP TABLE evento_usuario');
        $this->addSql('ALTER TABLE evento DROP FOREIGN KEY FK_47860B0554115B4B');
        $this->addSql('DROP INDEX UNIQ_47860B05989D9B62 ON evento');
        $this->addSql('DROP INDEX IDX_47860B0554115B4B ON evento');
        $this->addSql('ALTER TABLE evento DROP disertante_id');
    }
}
