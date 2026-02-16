<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260216090501 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adresse (id INT AUTO_INCREMENT NOT NULL, rue VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, pays VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, adresse_id INT NOT NULL, INDEX IDX_C74404554DE7DC5C (adresse_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, date DATE NOT NULL, montant DOUBLE PRECISION NOT NULL, client_id INT NOT NULL, adresse_livraison_id INT NOT NULL, client_commande_id INT NOT NULL, UNIQUE INDEX UNIQ_6EEAA67D19EB6921 (client_id), UNIQUE INDEX UNIQ_6EEAA67DBE2F0A35 (adresse_livraison_id), INDEX IDX_6EEAA67D83A10B6F (client_commande_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE profil (id INT AUTO_INCREMENT NOT NULL, image_profil VARCHAR(255) NOT NULL, client_id INT NOT NULL, UNIQUE INDEX UNIQ_E6D6B29719EB6921 (client_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C74404554DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DBE2F0A35 FOREIGN KEY (adresse_livraison_id) REFERENCES adresse (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D83A10B6F FOREIGN KEY (client_commande_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE profil ADD CONSTRAINT FK_E6D6B29719EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD4827B9B2 FOREIGN KEY (marque_id) REFERENCES brand (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C74404554DE7DC5C');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D19EB6921');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DBE2F0A35');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D83A10B6F');
        $this->addSql('ALTER TABLE profil DROP FOREIGN KEY FK_E6D6B29719EB6921');
        $this->addSql('DROP TABLE adresse');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE profil');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD4827B9B2');
    }
}
