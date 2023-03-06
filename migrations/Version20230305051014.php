<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230305051014 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '0002. Update some fields to nullable';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE users ADD telegram_chat_id VARCHAR(255) DEFAULT NULL, CHANGE username_canonical username_canonical VARCHAR(180) DEFAULT NULL, CHANGE email email VARCHAR(180) DEFAULT NULL, CHANGE email_canonical email_canonical VARCHAR(180) DEFAULT NULL, CHANGE password password VARCHAR(255) DEFAULT NULL, CHANGE name name VARCHAR(255) DEFAULT NULL, CHANGE phone_number phone_number VARCHAR(255) DEFAULT NULL, CHANGE is_receiver is_receiver TINYINT(1) DEFAULT NULL, CHANGE telegram_user_id telegram_user_id VARCHAR(255) DEFAULT NULL, CHANGE address address VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE users DROP telegram_chat_id, CHANGE username_canonical username_canonical VARCHAR(180) NOT NULL, CHANGE email email VARCHAR(180) NOT NULL, CHANGE email_canonical email_canonical VARCHAR(180) NOT NULL, CHANGE password password VARCHAR(255) NOT NULL, CHANGE name name VARCHAR(255) NOT NULL, CHANGE phone_number phone_number VARCHAR(255) NOT NULL, CHANGE is_receiver is_receiver TINYINT(1) NOT NULL, CHANGE telegram_user_id telegram_user_id VARCHAR(255) NOT NULL, CHANGE address address VARCHAR(255) NOT NULL');
    }
}
