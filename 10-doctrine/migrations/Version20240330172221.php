<?php

declare(strict_types=1);

namespace Xlucaspx\CursoDoctrine\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240330172221 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE course (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(25) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE phone (id INT AUTO_INCREMENT NOT NULL, number VARCHAR(15) NOT NULL, student_id INT DEFAULT NULL, INDEX IDX_444F97DDCB944F1A (student_id), PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE student (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE student_course (student_id INT NOT NULL, course_id INT NOT NULL, INDEX IDX_98A8B739CB944F1A (student_id), INDEX IDX_98A8B739591CC992 (course_id), PRIMARY KEY(student_id, course_id))');
        $this->addSql('ALTER TABLE phone ADD CONSTRAINT FK_444F97DDCB944F1A FOREIGN KEY (student_id) REFERENCES student (id)');
        $this->addSql('ALTER TABLE student_course ADD CONSTRAINT FK_98A8B739CB944F1A FOREIGN KEY (student_id) REFERENCES student (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE student_course ADD CONSTRAINT FK_98A8B739591CC992 FOREIGN KEY (course_id) REFERENCES course (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE phone DROP FOREIGN KEY FK_444F97DDCB944F1A');
        $this->addSql('ALTER TABLE student_course DROP FOREIGN KEY FK_98A8B739CB944F1A');
        $this->addSql('ALTER TABLE student_course DROP FOREIGN KEY FK_98A8B739591CC992');
        $this->addSql('DROP TABLE course');
        $this->addSql('DROP TABLE phone');
        $this->addSql('DROP TABLE student');
        $this->addSql('DROP TABLE student_course');
    }
}
