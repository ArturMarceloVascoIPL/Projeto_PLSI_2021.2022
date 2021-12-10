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
         * Tabela Sugestão de Exercícios
         */

        // Tabela
        $this->createTable('exercisesuggestions', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'description' => $this->string(),
            'caloriesBurned' => $this->integer()->notNull(),
            'type' => $this->integer()->notNull(),
            'category' => $this->integer()->notNull(),
            'status' => $this->integer()->notNull(),
            'personalTrainerId' => $this->integer()->notNull(),
        ], $tableOptions);

        // Index da Chave Estrangeira
        $this->createIndex(
            'idx_exercisesuggestions_personalTrainerId',
            'exercisesuggestions',
            'personalTrainerId'
        );

        // Designação da Chave Estrangeira
        $this->addForeignKey(
            'fk_exercisesuggestions_personalTrainerId',
            'exercisesuggestions',
            'personalTrainerId',
            'personaltrainer',
            'userId'
        );

        /**
         * Tabela Aplicação a Personal Trainer
         */

        // Tabela
        $this->createTable('application', [
            'id' => $this->primaryKey(),
            'qualificationProof' => $this->string()->notNull(),
            'comment' => $this->string(),
            'status' => $this->integer()->notNull(),
            'clientId' => $this->integer()->notNull(),
        ], $tableOptions);

        // Index da Chave Estrangeira
        $this->createIndex(
            'idx_application_userId',
            'application',
            'clientId'
        );

        // Designação da Chave Estrangeira
        $this->addForeignKey(
            'fk_application_userId',
            'application',
            'clientId',
            'client',
            'userId'
        );

        /**
         * Tabela Tipo de Exercício
         */

        // Tabela
        $this->createTable('exercisetype', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'description' => $this->string(),
        ], $tableOptions);

        /**
         * Tabela Categoria de Exercício
         */

        // Tabela
        $this->createTable('exercisecategory', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
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

        // Tabela
        $this->createTable('workout', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'date' => $this->date(),
            'totalCaloriesBurned' => $this->integer()->notNull(),
            'ptId' => $this->integer()->notNull(),
        ], $tableOptions);

        /* Chave Estrangeira (Personal Trainer que criou o treino) */
        // Index da Chave Estrangeira
        $this->createIndex(
            'idx_workout_ptId',
            'workout',
            'ptId'
        );

        // Designação da Chave Estrangeira
        $this->addForeignKey(
            'fk_workout_ptId',
            'workout',
            'ptId',
            'personaltrainer',
            'userId'
        );

        /**
         * Tabela Plano de Treinos
         */

        // Tabela
        $this->createTable('plan', [
            'id' => $this->primaryKey(),
            'dateStart' => $this->date()->notNull(),
            'dateEnd' => $this->date()->notNull(),
            'ptId' => $this->integer()->notNull(),
            'clientId' => $this->integer()->notNull(),
        ], $tableOptions);

        /* Chave Estrangeira (Personal Trainer que criou o plano) */
        // Index da Chave Estrangeira
        $this->createIndex(
            'idx_plan_ptId',
            'plan',
            'ptId'
        );

        // Designação da Chave Estrangeira
        $this->addForeignKey(
            'fk_plan_ptId',
            'plan',
            'ptId',
            'personaltrainer',
            'userId'
        );

        /* Chave Estrangeira (Cliente que segue o plano) */
        // Index da Chave Estrangeira
        $this->createIndex(
            'idx_plan_clientId',
            'plan',
            'clientId'
        );

        // Designação da Chave Estrangeira
        $this->addForeignKey(
            'fk_plan_clientId',
            'plan',
            'clientId',
            'client',
            'userId'
        );

        /**
         * Tabela Categoria Produto
         */

        // Tabela
        $this->createTable('productcategory', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'description' => $this->string(),
        ], $tableOptions);

        /**
         * Tabela Produtos
         */

        // Tabela
        $this->createTable('product', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'description' => $this->string(),
            'stock' => $this->integer()->notNull(),
            'price' => $this->integer()->notNull(),
            'image' => $this->string(),
            'categoryId' => $this->integer()->notNull(),
        ], $tableOptions);

        // Index da Chave Estrangeira
        $this->createIndex(
            'idx_product_categoryId',
            'product',
            'categoryId'
        );

        // Designação da Chave Estrangeira
        $this->addForeignKey(
            'fk_product_categoryId',
            'product',
            'categoryId',
            'productcategory',
            'id'
        );

        /**
         * Tabela Encomenda
         */

        // Tabela
        $this->createTable('order', [
            'id' => $this->primaryKey(),
            'date' => $this->date()->notNull(),
            'price' => $this->integer()->notNull(),
            'status' => $this->integer()->notNull(),
            'productId' => $this->integer()->notNull(),
            'clientId' => $this->integer()->notNull(),
        ], $tableOptions);

        /* Chave Estrangeira (Produto da Encomenda) */
        // Index da Chave Estrangeira
        $this->createIndex(
            'idx_order_productId',
            'order',
            'productId'
        );

        // Designação da Chave Estrangeira
        $this->addForeignKey(
            'fk_order_productId',
            'order',
            'productId',
            'product',
            'id'
        );

        /* Chave Estrangeira (Cliente que fez Encomenda) */
        // Index da Chave Estrangeira
        $this->createIndex(
            'idx_order_clientId',
            'order',
            'clientId'
        );

        // Designação da Chave Estrangeira
        $this->addForeignKey(
            'fk_order_clientId',
            'order',
            'clientId',
            'client',
            'userId'
        );

        /**
         * Tabela Chat
         */

        // Tabela
        $this->createTable('chat', [
            'id' => $this->primaryKey(),
            'isActive' => $this->boolean()->notNull(),
            'clientId' => $this->integer()->notNull(),
            'ptId' => $this->integer()->notNull(),
        ], $tableOptions);

        /* Chave Estrangeira (Personal Trainer) */
        // Index da Chave Estrangeira
        $this->createIndex(
            'idx_chat_ptId',
            'chat',
            'ptId'
        );

        // Designação da Chave Estrangeira
        $this->addForeignKey(
            'fk_chat_ptId',
            'chat',
            'ptId',
            'personaltrainer',
            'userId'
        );

        /* Chave Estrangeira (Cliente) */
        // Index da Chave Estrangeira
        $this->createIndex(
            'idx_chat_clientId',
            'chat',
            'clientId'
        );

        // Designação da Chave Estrangeira
        $this->addForeignKey(
            'fk_chat_clientId',
            'chat',
            'clientId',
            'client',
            'userId'
        );

        /**
         * Tabela Mensagem do Chat
         */

        // Tabela
        $this->createTable('chatmessage', [
            'id' => $this->primaryKey(),
            'message' => $this->string()->notNull(),
            'datetime' => $this->dateTime()->notNull(),
            'chatId' => $this->integer()->notNull(),
        ], $tableOptions);

        /* Chave Estrangeira (Chat) */
        // Index da Chave Estrangeira
        $this->createIndex(
            'idx_chat_message_chatId',
            'chatmessage',
            'chatId'
        );

        // Designação da Chave Estrangeira
        $this->addForeignKey(
            'fk_chat_message_chatId',
            'chatmessage',
            'chatId',
            'chat',
            'id'
        );

        /**
         * Tabela Histórico de Exercícios
         */

        // Tabela
        $this->createTable('workouthistory', [
            'id' => $this->primaryKey(),
            'duration' => $this->integer()->notNull(),
            'totalCaloriesBurned' => $this->integer()->notNull(),
            'clientId' => $this->integer()->notNull(),
            'workoutId' => $this->integer()->notNull(),
        ], $tableOptions);

        /* Chave Estrangeira (Cliente do Histórico) */
        // Index da Chave Estrangeira
        $this->createIndex(
            'idx_workouthistory_clientId',
            'workouthistory',
            'clientId'
        );

        // Designação da Chave Estrangeira
        $this->addForeignKey(
            'fk_workouthistory_clientId',
            'workouthistory',
            'clientId',
            'client',
            'userId'
        );

        /* Chave Estrangeira (Treino Realizado) */
        // Index da Chave Estrangeira
        $this->createIndex(
            'idx_workouthistory_workoutId',
            'workouthistory',
            'workoutId'
        );

        // Designação da Chave Estrangeira
        $this->addForeignKey(
            'fk_workouthistory_workoutId',
            'workouthistory',
            'workoutId',
            'workout',
            'id'
        );


        /** - - - - Tabelas de Relacionamentos - - - - **/

        /**
         * Tabela de Relacionamente Exercicio -> Treino
         */

        // Tabela
        $this->createTable('exerciseworkout', [
            'exerciseId' => $this->integer()->notNull(),
            'workoutId' => $this->integer()->notNull(),
            'exerciseNumber' => $this->integer()->notNull(),
            'exerciseCalories' => $this->integer()->notNull(),
            'totalCaloriesBurned' => $this->integer()->notNull(),
        ], $tableOptions);

        /* Chave Estrangeira (Id do Exercício) */
        // Index da Chave Estrangeira
        $this->createIndex(
            'idx_exercise_workout_exerciseId',
            'exerciseworkout',
            'exerciseId'
        );

        // Designação da Chave Estrangeira
        $this->addForeignKey(
            'fk_exerciseworkout_exerciseId',
            'exerciseworkout',
            'exerciseId',
            'exercise',
            'id'
        );

        /* Chave Estrangeira (Id do Treino) */
        // Index da Chave Estrangeira
        $this->createIndex(
            'idx_exerciseworkout_workoutId',
            'exerciseworkout',
            'workoutId'
        );

        // Designação da Chave Estrangeira
        $this->addForeignKey(
            'fk_exerciseworkout_workoutId',
            'exerciseworkout',
            'workoutId',
            'workout',
            'id'
        );

        // Definir as Chaves Primárias (Chave Composta)
        $this->addPrimaryKey(
            'pk_exerciseworkout',
            'exerciseworkout',
            ['exerciseId', 'workoutId']
        );

        /**
         * Tabela de Relacionamente Treino -> Plano
         */

        // Tabela
        $this->createTable('workoutplan', [
            'workoutId' => $this->integer()->notNull(),
            'planId' => $this->integer()->notNull(),
        ], $tableOptions);

        /* Chave Estrangeira (Id do Treino) */
        // Index da Chave Estrangeira
        $this->createIndex(
            'idx_workoutplan_workoutId',
            'workoutplan',
            'workoutId'
        );

        // Designação da Chave Estrangeira
        $this->addForeignKey(
            'fk_workoutplan_workoutId',
            'workoutplan',
            'workoutId',
            'workout',
            'id'
        );

        /* Chave Estrangeira (Id do Plano) */
        // Index da Chave Estrangeira
        $this->createIndex(
            'idx_workoutplan_planId',
            'workoutplan',
            'planId'
        );

        // Designação da Chave Estrangeira
        $this->addForeignKey(
            'fk_workoutplan_planId',
            'workoutplan',
            'planId',
            'plan',
            'id'
        );

        // Definir as Chaves Primárias (Chave Composta)
        $this->addPrimaryKey(
            'pk_workoutplan',
            'workoutplan',
            ['workoutId', 'planId']
        );
    }

    public function down()
    {
        $this->dropTable('personalTrainer');
        $this->dropTable('client');
        $this->dropTable('exercisesuggestions');
        $this->dropTable('application');
        $this->dropTable('exercisetype');
        $this->dropTable('exercisecategory');
        $this->dropTable('exercise');
        $this->dropTable('workout');
        $this->dropTable('plan');
        $this->dropTable('productcategory');
        $this->dropTable('product');
        $this->dropTable('order');
        $this->dropTable('chat');
        $this->dropTable('chatmessage');
        $this->dropTable('workouthistory');
        $this->dropTable('exerciseworkout');
        $this->dropTable('workoutplan');
    }
}
