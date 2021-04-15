<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210407024730 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE astronaut (id UUID NOT NULL, grade_id UUID NOT NULL, pseudo VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_5DADB6E5FE19A1A8 ON astronaut (grade_id)');
        $this->addSql('COMMENT ON COLUMN astronaut.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN astronaut.grade_id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE grade (id UUID NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN grade.id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE planet (id UUID NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN planet.id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE planet_astronaut (planet_id UUID NOT NULL, astronaut_id UUID NOT NULL, PRIMARY KEY(planet_id, astronaut_id))');
        $this->addSql('CREATE INDEX IDX_DC60E91DA25E9820 ON planet_astronaut (planet_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_DC60E91DD390014D ON planet_astronaut (astronaut_id)');
        $this->addSql('COMMENT ON COLUMN planet_astronaut.planet_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN planet_astronaut.astronaut_id IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE astronaut ADD CONSTRAINT FK_5DADB6E5FE19A1A8 FOREIGN KEY (grade_id) REFERENCES grade (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE planet_astronaut ADD CONSTRAINT FK_DC60E91DA25E9820 FOREIGN KEY (planet_id) REFERENCES planet (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE planet_astronaut ADD CONSTRAINT FK_DC60E91DD390014D FOREIGN KEY (astronaut_id) REFERENCES astronaut (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE planet_astronaut DROP CONSTRAINT FK_DC60E91DD390014D');
        $this->addSql('ALTER TABLE astronaut DROP CONSTRAINT FK_5DADB6E5FE19A1A8');
        $this->addSql('ALTER TABLE planet_astronaut DROP CONSTRAINT FK_DC60E91DA25E9820');
        $this->addSql('DROP TABLE astronaut');
        $this->addSql('DROP TABLE grade');
        $this->addSql('DROP TABLE planet');
        $this->addSql('DROP TABLE planet_astronaut');
    }
}
