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
            'bmi' => $this->integer(),
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
         * Tabela Aplicação a Personal Trainer
         */

        // Tabela
        $this->createTable('aplication', [
            'id' => $this->primaryKey(),
            'qualificationProof' => $this->string()->notNull(),
            'comment' => $this->string(),
            'status' => $this->integer()->notNull(),
            'userId' => $this->integer()->notNull(),
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

        /**
         * Tabela Tipo de Exercício
         */

        // Tabela
        $this->createTable('exercisetype', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'description' => $this->string(),
        ], $tableOptions);

        /**
         * Tabela Categoria de Exercício
         */

        // Tabela
        $this->createTable('exercisecategory', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'description' => $this->string(),
        ], $tableOptions);

        /**
         * Tabela Exercício
         */

        // Tabela
        $this->createTable('exercise', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'description' => $this->string(),
            'caloriesBurned' => $this->integer()->notNull(),
            'typeId' => $this->integer()->notNull(),
            'categoryId' => $this->integer()->notNull(),
        ], $tableOptions);

        /* Chave Estrangeira (Tipo de Exercício) */
        // Index da Chave Estrangeira
        $this->createIndex(
            'idx_exercise_typeId',
            'exercise',
            'typeId'
        );

        // Designação da Chave Estrangeira
        $this->addForeignKey(
            'fk_exercise_typeId',
            'exercise',
            'typeId',
            'exercisetype',
            'id'
        );

        /* Chave Estrangeira (Categoria de Exercício) */
        // Index da Chave Estrangeira
        $this->createIndex(
            'idx_exercise_categoryId',
            'exercise',
            'categoryId'
        );

        // Designação da Chave Estrangeira
        $this->addForeignKey(
            'fk_exercise_categoryId',
            'exercise',
            'categoryId',
            'exercisecategory',
            'id'
        );

        /**
         * Tabela Treino
         */
        // TODO: Completar com chaves estrangeiras

        // Tabela
        $this->createTable('workout', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'date' => $this->date(),
            'totalCaloriesBurned' => $this->integer()->notNull(),
        ], $tableOptions);

        /**
         * Tabela de Relacionamente Exercicio -> Treino
         */
        // TODO: Completar as chaves estrangeiras

        // Tabela
        $this->createTable('exercise_workout', [
            'exerciseId' => $this->primaryKey(),
            'workoutId' => $this->primaryKey(),
            'exerciseNumber' => $this->integer()->notNull(),
            'exerciseCalories' => $this->integer()->notNull(),
            'totalCaloriesBurned' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('personalTrainer');
        $this->dropTable('client');
        // TODO: Atualizar com as tabelas todas

        return false;
    }
}
