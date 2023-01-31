<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230217045205 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '0001. Create tables: boxes, categories, box_category, pallets, shipments.';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE boxes (id INT AUTO_INCREMENT NOT NULL, pallet_id INT DEFAULT NULL, receiver_id INT DEFAULT NULL, INDEX IDX_CDF1B2E915444D3A (pallet_id), INDEX IDX_CDF1B2E9CD53EDB6 (receiver_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE box_category (box_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_578BDB65D8177B3F (box_id), INDEX IDX_578BDB6512469DE2 (category_id), PRIMARY KEY(box_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, category_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pallets (id INT AUTO_INCREMENT NOT NULL, receiver_id INT DEFAULT NULL, shipment_id INT DEFAULT NULL, INDEX IDX_53DD94E2CD53EDB6 (receiver_id), INDEX IDX_53DD94E27BE036FC (shipment_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shipments (id INT AUTO_INCREMENT NOT NULL, send_date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, username_canonical VARCHAR(180) NOT NULL, email VARCHAR(180) NOT NULL, email_canonical VARCHAR(180) NOT NULL, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) DEFAULT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, confirmation_token VARCHAR(180) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, name VARCHAR(255) NOT NULL, phone_number VARCHAR(255) NOT NULL, is_receiver TINYINT(1) NOT NULL, user_comment VARCHAR(255) DEFAULT NULL, telegram_user_id VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1483A5E992FC23A8 (username_canonical), UNIQUE INDEX UNIQ_1483A5E9A0D96FBF (email_canonical), UNIQUE INDEX UNIQ_1483A5E9C05FB297 (confirmation_token), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE boxes ADD CONSTRAINT FK_CDF1B2E915444D3A FOREIGN KEY (pallet_id) REFERENCES pallets (id)');
        $this->addSql('ALTER TABLE boxes ADD CONSTRAINT FK_CDF1B2E9CD53EDB6 FOREIGN KEY (receiver_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE box_category ADD CONSTRAINT FK_578BDB65D8177B3F FOREIGN KEY (box_id) REFERENCES boxes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE box_category ADD CONSTRAINT FK_578BDB6512469DE2 FOREIGN KEY (category_id) REFERENCES categories (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pallets ADD CONSTRAINT FK_53DD94E2CD53EDB6 FOREIGN KEY (receiver_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE pallets ADD CONSTRAINT FK_53DD94E27BE036FC FOREIGN KEY (shipment_id) REFERENCES shipments (id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE boxes DROP FOREIGN KEY FK_CDF1B2E915444D3A');
        $this->addSql('ALTER TABLE boxes DROP FOREIGN KEY FK_CDF1B2E9CD53EDB6');
        $this->addSql('ALTER TABLE box_category DROP FOREIGN KEY FK_578BDB65D8177B3F');
        $this->addSql('ALTER TABLE box_category DROP FOREIGN KEY FK_578BDB6512469DE2');
        $this->addSql('ALTER TABLE pallets DROP FOREIGN KEY FK_53DD94E2CD53EDB6');
        $this->addSql('ALTER TABLE pallets DROP FOREIGN KEY FK_53DD94E27BE036FC');
        $this->addSql('DROP TABLE boxes');
        $this->addSql('DROP TABLE box_category');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE pallets');
        $this->addSql('DROP TABLE shipments');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
