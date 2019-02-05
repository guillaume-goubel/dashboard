<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190125220653 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE profession (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sales ADD seller_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sales ADD CONSTRAINT FK_6B8170448DE820D9 FOREIGN KEY (seller_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_6B8170448DE820D9 ON sales (seller_id)');
        $this->addSql('ALTER TABLE user ADD professions_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649FEE064DD FOREIGN KEY (professions_id) REFERENCES profession (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649FEE064DD ON user (professions_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649FEE064DD');
        $this->addSql('DROP TABLE profession');
        $this->addSql('ALTER TABLE sales DROP FOREIGN KEY FK_6B8170448DE820D9');
        $this->addSql('DROP INDEX IDX_6B8170448DE820D9 ON sales');
        $this->addSql('ALTER TABLE sales DROP seller_id');
        $this->addSql('DROP INDEX IDX_8D93D649FEE064DD ON user');
        $this->addSql('ALTER TABLE user DROP professions_id');
    }
}
