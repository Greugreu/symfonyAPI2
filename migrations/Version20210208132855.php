<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210208132855 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE school_class ADD school_has_classes_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE school_class ADD CONSTRAINT FK_33B1AF85B92DADB0 FOREIGN KEY (school_has_classes_id) REFERENCES schools (id)');
        $this->addSql('CREATE INDEX IDX_33B1AF85B92DADB0 ON school_class (school_has_classes_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE school_class DROP FOREIGN KEY FK_33B1AF85B92DADB0');
        $this->addSql('DROP INDEX IDX_33B1AF85B92DADB0 ON school_class');
        $this->addSql('ALTER TABLE school_class DROP school_has_classes_id');
    }
}
