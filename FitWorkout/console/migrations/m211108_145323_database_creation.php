<?php

use yii\db\Migration;

/**
 * Class m211108_145323_databaseCreation
 */
class m211108_145323_database_creation extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        /**
         * Tabela Personal Trainer
         */

        // Tabela
        $this->createTable('personaltrainer', [
            'userId' => $this->primaryKey(),
            'qualificationProof' => $this->string()->notNull()
        ], $tableOptions);

        // Index da Chave Estrangeira
        $this->createIndex(
            'idx_pt_userId',
            'personalTrainer',
            'userId'
        );

        // Designação da Chave Estrangeira
        $this->addForeignKey(
            'fk_pt_userId',
            'personalTrainer',
            'userId',
            'user',
            'id'
        );

        /**
         * Tabela Cliente
         */

        // Tabela
        $this->createTable('client', [
            'userId' => $this->primaryKey(),
            'weight' => $this->integer(),
            'height' => $this->integer(),
            'weightLost' => $this->integer(),
            'lightestWeight' => $this->integer(),
            'heaviestWeight' => $this->integer(),
            'bmi' => $this->integer()
        ], $tableOptions);

        // Index da Chave Estrangeira
        $this->createIndex(
            'idx_client_userId',
            'client',
            'userId'
        );

        // Designação da Chave Estrangeira
        $this->addForeignKey(
            'fk_client_userId',
            'client',
            'userId',
            'user',
            'id'
        );

        /**
         * Tabela Aplicação a Personal Trainer
         */

        // Tabela
        $this->createTable('aplication', [
            'id' => $this->primaryKey(),
            'qualificationProof' => $this->string()->notNull(),
            'comment' => $this->string(),
            'status' => $this->integer(),
            'userId' => $this->integer(),
        ], $tableOptions);

        // Index da Chave Estrangeira
        $this->createIndex(
            'idx_aplication_userId',
            'aplication',
            'userId'
        );

        // Designação da Chave Estrangeira
        $this->addForeignKey(
            'fk_aplication_userId',
            'aplication',
            'userId',
            'user',
            'id'
        );
    }

    public function down()
    {
        $this->dropTable('personalTrainer');
        $this->dropTable('client');

        return false;
    }
}
