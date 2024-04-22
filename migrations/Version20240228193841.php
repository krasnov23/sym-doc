<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240228193841 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE bus_info_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE passenger_info_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE trip_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE bus_info (id INT NOT NULL, model_name VARCHAR(255) NOT NULL, gos_number VARCHAR(255) NOT NULL, color VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE passenger_info (id INT NOT NULL, trip_id INT DEFAULT NULL, full_name VARCHAR(255) NOT NULL, passport_data VARCHAR(255) NOT NULL, seat_number INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_6A0EEBD6A5BC2E0E ON passenger_info (trip_id)');
        $this->addSql('CREATE TABLE trip (id INT NOT NULL, bus_info_id INT NOT NULL, departure_place VARCHAR(255) NOT NULL, arrival_place VARCHAR(255) NOT NULL, date_of_departures TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, seats_amount INT NOT NULL, driver_name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_7656F53BF690D035 ON trip (bus_info_id)');
        $this->addSql('COMMENT ON COLUMN trip.date_of_departures IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE passenger_info ADD CONSTRAINT FK_6A0EEBD6A5BC2E0E FOREIGN KEY (trip_id) REFERENCES trip (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE trip ADD CONSTRAINT FK_7656F53BF690D035 FOREIGN KEY (bus_info_id) REFERENCES bus_info (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE bus_info_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE passenger_info_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE trip_id_seq CASCADE');
        $this->addSql('ALTER TABLE passenger_info DROP CONSTRAINT FK_6A0EEBD6A5BC2E0E');
        $this->addSql('ALTER TABLE trip DROP CONSTRAINT FK_7656F53BF690D035');
        $this->addSql('DROP TABLE bus_info');
        $this->addSql('DROP TABLE passenger_info');
        $this->addSql('DROP TABLE trip');
    }
}
