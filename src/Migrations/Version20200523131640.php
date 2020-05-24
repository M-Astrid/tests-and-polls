<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200523131640 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE questions (id INT AUTO_INCREMENT NOT NULL, test_id INT NOT NULL, type INT NOT NULL, text LONGTEXT NOT NULL, INDEX IDX_8ADC54D51E5D0459 (test_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_answers (id INT AUTO_INCREMENT NOT NULL, question_id INT NOT NULL, user_answer_set_id INT NOT NULL, text VARCHAR(255) DEFAULT NULL, INDEX IDX_8DDD80C1E27F6BF (question_id), INDEX IDX_8DDD80CC8C9AEF (user_answer_set_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_answer_answer_item (user_answer_id INT NOT NULL, answer_item_id INT NOT NULL, INDEX IDX_2C7AB006AAD3C5E3 (user_answer_id), INDEX IDX_2C7AB0065A2F9D2F (answer_item_id), PRIMARY KEY(user_answer_id, answer_item_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tests (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_answer_sets (id INT AUTO_INCREMENT NOT NULL, test_id INT NOT NULL, completed_at DATETIME NOT NULL, INDEX IDX_63BD6F841E5D0459 (test_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE answer_items (id INT AUTO_INCREMENT NOT NULL, text LONGTEXT NOT NULL, is_right TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE answer_item_question (answer_item_id INT NOT NULL, question_id INT NOT NULL, INDEX IDX_945CA4AE5A2F9D2F (answer_item_id), INDEX IDX_945CA4AE1E27F6BF (question_id), PRIMARY KEY(answer_item_id, question_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE questions ADD CONSTRAINT FK_8ADC54D51E5D0459 FOREIGN KEY (test_id) REFERENCES tests (id)');
        $this->addSql('ALTER TABLE user_answers ADD CONSTRAINT FK_8DDD80C1E27F6BF FOREIGN KEY (question_id) REFERENCES questions (id)');
        $this->addSql('ALTER TABLE user_answers ADD CONSTRAINT FK_8DDD80CC8C9AEF FOREIGN KEY (user_answer_set_id) REFERENCES user_answer_sets (id)');
        $this->addSql('ALTER TABLE user_answer_answer_item ADD CONSTRAINT FK_2C7AB006AAD3C5E3 FOREIGN KEY (user_answer_id) REFERENCES user_answers (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_answer_answer_item ADD CONSTRAINT FK_2C7AB0065A2F9D2F FOREIGN KEY (answer_item_id) REFERENCES answer_items (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_answer_sets ADD CONSTRAINT FK_63BD6F841E5D0459 FOREIGN KEY (test_id) REFERENCES tests (id)');
        $this->addSql('ALTER TABLE answer_item_question ADD CONSTRAINT FK_945CA4AE5A2F9D2F FOREIGN KEY (answer_item_id) REFERENCES answer_items (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE answer_item_question ADD CONSTRAINT FK_945CA4AE1E27F6BF FOREIGN KEY (question_id) REFERENCES questions (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user_answers DROP FOREIGN KEY FK_8DDD80C1E27F6BF');
        $this->addSql('ALTER TABLE answer_item_question DROP FOREIGN KEY FK_945CA4AE1E27F6BF');
        $this->addSql('ALTER TABLE user_answer_answer_item DROP FOREIGN KEY FK_2C7AB006AAD3C5E3');
        $this->addSql('ALTER TABLE questions DROP FOREIGN KEY FK_8ADC54D51E5D0459');
        $this->addSql('ALTER TABLE user_answer_sets DROP FOREIGN KEY FK_63BD6F841E5D0459');
        $this->addSql('ALTER TABLE user_answers DROP FOREIGN KEY FK_8DDD80CC8C9AEF');
        $this->addSql('ALTER TABLE user_answer_answer_item DROP FOREIGN KEY FK_2C7AB0065A2F9D2F');
        $this->addSql('ALTER TABLE answer_item_question DROP FOREIGN KEY FK_945CA4AE5A2F9D2F');
        $this->addSql('DROP TABLE questions');
        $this->addSql('DROP TABLE user_answers');
        $this->addSql('DROP TABLE user_answer_answer_item');
        $this->addSql('DROP TABLE tests');
        $this->addSql('DROP TABLE user_answer_sets');
        $this->addSql('DROP TABLE answer_items');
        $this->addSql('DROP TABLE answer_item_question');
    }
}
