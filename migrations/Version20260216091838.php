<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260216091838 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE produit_image (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, url VARCHAR(255) NOT NULL, produit_id INT NOT NULL, INDEX IDX_F5A163CBF347EFB (produit_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE tag_product (tag_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_E17B2907BAD26311 (tag_id), INDEX IDX_E17B29074584665A (product_id), PRIMARY KEY (tag_id, product_id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE produit_image ADD CONSTRAINT FK_F5A163CBF347EFB FOREIGN KEY (produit_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE tag_product ADD CONSTRAINT FK_E17B2907BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tag_product ADD CONSTRAINT FK_E17B29074584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C74404554DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DBE2F0A35 FOREIGN KEY (adresse_livraison_id) REFERENCES adresse (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D83A10B6F FOREIGN KEY (client_commande_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD4827B9B2 FOREIGN KEY (marque_id) REFERENCES brand (id)');
        $this->addSql('ALTER TABLE profil ADD CONSTRAINT FK_E6D6B29719EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit_image DROP FOREIGN KEY FK_F5A163CBF347EFB');
        $this->addSql('ALTER TABLE tag_product DROP FOREIGN KEY FK_E17B2907BAD26311');
        $this->addSql('ALTER TABLE tag_product DROP FOREIGN KEY FK_E17B29074584665A');
        $this->addSql('DROP TABLE produit_image');
        $this->addSql('DROP TABLE tag');
        $this->addSql('DROP TABLE tag_product');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C74404554DE7DC5C');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D19EB6921');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DBE2F0A35');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D83A10B6F');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD4827B9B2');
        $this->addSql('ALTER TABLE profil DROP FOREIGN KEY FK_E6D6B29719EB6921');
    }
}
