<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210208154317 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE class_student DROP INDEX UNIQ_7256C8CF598B478B, ADD INDEX IDX_7256C8CF598B478B (student_class_id)');
        $this->addSql('ALTER TABLE class_student CHANGE student_age student_age INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE class_student DROP INDEX IDX_7256C8CF598B478B, ADD UNIQUE INDEX UNIQ_7256C8CF598B478B (student_class_id)');
        $this->addSql('ALTER TABLE class_student CHANGE student_age student_age VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
