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
         * Tabela Perfil de Utilizador
         */
        //region userProfile
        // Tabela
        $this->createTable('userProfile', [
            'userId' => $this->primaryKey(),
            'address' => $this->string(255),
            'nif' => $this->integer(9),
            'postalCode' => $this->string(45),
            'city' => $this->string(45),
        ], $tableOptions);

        // Index da Chave Estrangeira
        $this->createIndex(
            'idx_userProfile_userId',
            'userProfile',
            'userId'
        );

        // Designação da Chave Estrangeira
        $this->addForeignKey(
            'fk_userProfile_userId',
            'userProfile',
            'userId',
            'user',
            'id'
        );
        //endregion

        /**
         * Tabela Dados de Utilizador
         */
        //region userData
        // Tabela
        $this->createTable('userData', [
            'id' => $this->primaryKey(),
            'timeStamp' => $this->timestamp(),
            'weight' => $this->integer(),
            'bmi' => $this->decimal(2,2),
            'imc' => $this->decimal(2,2),
            'userProfileId' => $this->integer(),
        ], $tableOptions);

        // Index da Chave Estrangeira
        $this->createIndex(
            'idx_userData_userProfileId',
            'userData',
            'userProfileId'
        );

        // Designação da Chave Estrangeira
        $this->addForeignKey(
            'fk_userData_userProfileId',
            'userData',
            'userProfileId',
            'userProfile',
            'userId'
        );
        //endregion

        /**
         * Tabela do Chat
         */
        //region chatMessage
        // Tabela
        $this->createTable('chatMessage', [
            'id' => $this->primaryKey(),
            'message' => $this->string(255)->notNull(),
            'datetime' => $this->dateTime()->notNull(),
            'from' => $this->integer()->notNull(),
            'to' => $this->integer()->notNull(),
        ], $tableOptions);

        /* Chave Estrangeira (Remetente) */
        // Index da Chave Estrangeira
        $this->createIndex(
            'idx_chatMessage_from',
            'chatMessage',
            'from'
        );

        // Designação da Chave Estrangeira
        $this->addForeignKey(
            'fk_chatMessage_from',
            'chatMessage',
            'from',
            'userProfile',
            'userId'
        );

        /* Chave Estrangeira (Destinatário) */
        // Index da Chave Estrangeira
        $this->createIndex(
            'idx_chatMessage_to',
            'chatMessage',
            'to'
        );

        // Designação da Chave Estrangeira
        $this->addForeignKey(
            'fk_chatMessage_to',
            'chatMessage',
            'to',
            'userProfile',
            'userId'
        );
        //endregion

        /**
         * Tabela Aplicação a Personal Trainer
         */
        //region ptApplication
        // Tabela
        $this->createTable('ptApplication', [
            'id' => $this->primaryKey(),
            'cvFilename' => $this->string(45)->notNull(),
            'qualificationFilename' => $this->string(45)->notNull(),
            'jobTime' => $this->integer(),
            'comment' => $this->string(255),
            'approved' => $this->boolean()->notNull(),
            'userId' => $this->integer()->notNull(),
        ], $tableOptions);

        // Index da Chave Estrangeira
        $this->createIndex(
            'idx_ptApplication_userId',
            'ptApplication',
            'userId'
        );

        // Designação da Chave Estrangeira
        $this->addForeignKey(
            'fk_ptApplication_userId',
            'ptApplication',
            'userId',
            'userProfile',
            'userId'
        );
        //endregion

        /**
         * Tabela Tipo de Exercício
         */
        //region exerciseType
        // Tabela
        $this->createTable('exerciseType', [
            'id' => $this->primaryKey(),
            'name' => $this->string(45)->notNull()->unique(),
            'description' => $this->string(255),
        ], $tableOptions);
        //endregion

        /**
         * Tabela Categoria de Exercício
         */
        //region exerciseCategory
        // Tabela
        $this->createTable('exerciseCategory', [
            'id' => $this->primaryKey(),
            'name' => $this->string(45)->notNull()->unique(),
            'description' => $this->string(255),
        ], $tableOptions);
        //endregion

        /**
         * Tabela Exercício
         */
        //region exercise
        // Tabela
        $this->createTable('exercise', [
            'id' => $this->primaryKey(),
            'name' => $this->string(45)->notNull(),
            'description' => $this->string(255),
            'approved' => $this->boolean(),
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
            'exerciseType',
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
            'exerciseCategory',
            'id'
        );
        //endregion

        /**
         * Tabela Treino
         */
        //region workout
        // Tabela
        $this->createTable('workout', [
            'id' => $this->primaryKey(),
            'name' => $this->string(45)->notNull(),
            'date' => $this->date(),
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
            'userProfile',
            'userId'
        );
        //endregion

        /**
         * Tabela de Relacionamente Treino -> Exercicio
         */
        //region workoutExercise
        // Tabela
        $this->createTable('workoutExercise', [
            'exerciseId' => $this->integer()->notNull(),
            'workoutId' => $this->integer()->notNull(),
            'exerciseCalories' => $this->integer()->notNull(),
            'equipmentWeight' => $this->integer(),
            'seriesSize' => $this->integer()->notNull(),
            'seriesNum' => $this->integer()->notNull(),
            'restTime' => $this->integer(),
        ], $tableOptions);

        /* Chave Estrangeira (Id do Exercício) */
        // Index da Chave Estrangeira
        $this->createIndex(
            'idx_workoutExercise_exerciseId',
            'workoutExercise',
            'exerciseId'
        );

        // Designação da Chave Estrangeira
        $this->addForeignKey(
            'fk_workoutExercise_exerciseId',
            'workoutExercise',
            'exerciseId',
            'exercise',
            'id'
        );

        /* Chave Estrangeira (Id do Treino) */
        // Index da Chave Estrangeira
        $this->createIndex(
            'idx_workoutExercise_workoutId',
            'workoutExercise',
            'workoutId'
        );

        // Designação da Chave Estrangeira
        $this->addForeignKey(
            'fk_workoutExercise_workoutId',
            'workoutExercise',
            'workoutId',
            'workout',
            'id'
        );

        // Definir as Chaves Primárias (Chave Composta)
        $this->addPrimaryKey(
            'pk_workoutExercise',
            'workoutExercise',
            ['exerciseId', 'workoutId']
        );
        //endregion

        /**
         * Tabela Histórico de Exercícios
         */
        //region exerciseHistory
        // Tabela
        $this->createTable('exerciseHistory', [
            'id' => $this->primaryKey(),
            'timeStamp' => $this->timestamp()->notNull(),
            'duration' => $this->integer()->notNull(),
            'equipmentWeight' => $this->integer(),
            'seriesSize' => $this->integer()->notNull(),
            'seriesNum' => $this->integer()->notNull(),
            'userId' => $this->integer()->notNull(),
            'workoutExercise_exerciseId' => $this->integer()->notNull(),
            'workoutExercise_workoutId' => $this->integer()->notNull(),
        ], $tableOptions);

        /* Chave Estrangeira (Cliente do Histórico) */
        // Index da Chave Estrangeira
        $this->createIndex(
            'idx_exerciseHistory_userId',
            'exerciseHistory',
            'userId'
        );

        // Designação da Chave Estrangeira
        $this->addForeignKey(
            'fk_exerciseHistory_userId',
            'exerciseHistory',
            'userId',
            'userProfile',
            'userId'
        );

        /* Chave Estrangeira (Exercicio Realizado) */
        // Index da Chave Estrangeira
        $this->createIndex(
            'idx_exerciseHistory_exerciseId',
            'exerciseHistory',
            'workoutExercise_exerciseId'
        );

        // Designação da Chave Estrangeira
        $this->addForeignKey(
            'fk_exerciseHistory_exerciseId',
            'exerciseHistory',
            'workoutExercise_exerciseId',
            'workoutExercise',
            'exerciseId'
        );

        // Index da Chave Estrangeira
        $this->createIndex(
            'idx_exerciseHistory_workoutId',
            'exerciseHistory',
            'workoutExercise_workoutId'
        );

        // Designação da Chave Estrangeira
        $this->addForeignKey(
            'fk_workouthistory_workoutId',
            'exerciseHistory',
            'workoutExercise_workoutId',
            'workoutExercise',
            'workoutId'
        );
        //endregion

        /**
         * Tabela Plano de Treinos
         */
        //region plan
        // Tabela
        $this->createTable('plan', [
            'id' => $this->primaryKey(),
            'dateStart' => $this->date()->notNull(),
            'dateEnd' => $this->date()->notNull(),
            'description' => $this->string(45)->notNull(),
            'ptPlan' => $this->integer()->notNull(),
            'userId' => $this->integer()->notNull(),
        ], $tableOptions);

        /* Chave Estrangeira (Personal Trainer que criou o plano) */
        // Index da Chave Estrangeira
        $this->createIndex(
            'idx_plan_ptPlan',
            'plan',
            'ptPlan'
        );

        // Designação da Chave Estrangeira
        $this->addForeignKey(
            'fk_plan_ptPlan',
            'plan',
            'ptPlan',
            'userProfile',
            'userId'
        );

        /* Chave Estrangeira (Cliente que segue o plano) */
        // Index da Chave Estrangeira
        $this->createIndex(
            'idx_plan_userId',
            'plan',
            'userId'
        );

        // Designação da Chave Estrangeira
        $this->addForeignKey(
            'fk_plan_userId',
            'plan',
            'userId',
            'userProfile',
            'userId'
        );
        //endregion

        /**
         * Tabela de Relacionamente Plano de Treinos -> Treino
         */
        //region planWorkout
        // Tabela
        $this->createTable('planWorkout', [
            'workoutId' => $this->integer()->notNull(),
            'planId' => $this->integer()->notNull(),
        ], $tableOptions);

        /* Chave Estrangeira (Id do Treino) */
        // Index da Chave Estrangeira
        $this->createIndex(
            'idx_planWorkout_workoutId',
            'planWorkout',
            'workoutId'
        );

        // Designação da Chave Estrangeira
        $this->addForeignKey(
            'fk_planWorkout_workoutId',
            'planWorkout',
            'workoutId',
            'workout',
            'id'
        );

        /* Chave Estrangeira (Id do Plano) */
        // Index da Chave Estrangeira
        $this->createIndex(
            'idx_planWorkout_planId',
            'planWorkout',
            'planId'
        );

        // Designação da Chave Estrangeira
        $this->addForeignKey(
            'fk_planWorkout_planId',
            'planWorkout',
            'planId',
            'plan',
            'id'
        );

        // Definir as Chaves Primárias (Chave Composta)
        $this->addPrimaryKey(
            'pk_planWorkout',
            'planWorkout',
            ['workoutId', 'planId']
        );
        //endregion

        /**
         * Tabela Categoria Produto
         */
        //region productCategory
        // Tabela
        $this->createTable('productCategory', [
            'id' => $this->primaryKey(),
            'name' => $this->string(45)->notNull()->unique(),
            'description' => $this->string(255),
        ], $tableOptions);
        //endregion

        /**
         * Tabela Produtos
         */
        //region product
        // Tabela
        $this->createTable('product', [
            'id' => $this->primaryKey(),
            'name' => $this->string(45)->notNull()->unique(),
            'description' => $this->string(255),
            'stock' => $this->integer()->notNull(),
            'price' => $this->integer()->notNull(),
            'imageFileName' => $this->string(255),
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
            'productCategory',
            'id'
        );
        //endregion

        /**
         * Tabela Encomenda
         */
        //region order
        // Tabela
        $this->createTable('order', [
            'id' => $this->primaryKey(),
            'date' => $this->date()->notNull(),
            'priceTotal' => $this->integer()->notNull(),
            'status' => $this->integer()->notNull(),
            'userId' => $this->integer()->notNull(),
        ], $tableOptions);

        // Index da Chave Estrangeira
        $this->createIndex(
            'idx_order_userId',
            'order',
            'userId'
        );

        // Designação da Chave Estrangeira
        $this->addForeignKey(
            'fk_order_userId',
            'order',
            'userId',
            'userProfile',
            'userId'
        );
        //endregion

        /**
         * Tabela Produtos da Encomenda
         */
        //region orderItems
        // Tabela
        $this->createTable('orderItems', [
            'id' => $this->primaryKey(),
            'price' => $this->integer()->notNull(),
            'productId' => $this->integer()->notNull(),
            'orderId' => $this->integer()->notNull(),
        ], $tableOptions);

        /* Chave Estrangeira (Produto da Encomenda) */
        // Index da Chave Estrangeira
        $this->createIndex(
            'idx_orderItems_productId',
            'orderItems',
            'productId'
        );

        // Designação da Chave Estrangeira
        $this->addForeignKey(
            'fk_orderItems_productId',
            'orderItems',
            'productId',
            'product',
            'id'
        );

        /* Chave Estrangeira (Encomenda do Produto) */
        // Index da Chave Estrangeira
        $this->createIndex(
            'idx_orderItems_orderId',
            'orderItems',
            'orderId'
        );

        // Designação da Chave Estrangeira
        $this->addForeignKey(
            'fk_orderItems_orderId',
            'orderItems',
            'orderId',
            'order',
            'id'
        );
        //endregion
    }

    public function down()
    {
        $this->dropTable('userProfile');
        $this->dropTable('userData');
        $this->dropTable('chatMessage');
        $this->dropTable('ptApplication');
        $this->dropTable('exerciseType');
        $this->dropTable('exerciseCategory');
        $this->dropTable('exercise');
        $this->dropTable('workout');
        $this->dropTable('workoutExercise');
        $this->dropTable('exerciseHistory');
        $this->dropTable('plan');
        $this->dropTable('planWorkout');
        $this->dropTable('productCategory');
        $this->dropTable('product');
        $this->dropTable('order');
        $this->dropTable('orderItems');
    }
}
