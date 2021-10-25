<?php

use yii\db\Migration;

/**
 * Class m211013_090726_init_rbac
 */
class m211013_090726_init_rbac extends Migration
{
    public function up()
    {
        $auth = Yii::$app->authManager;

        /*Criacao Roles */

        // Role Cliente 
        $client = $auth->createRole('client');
        $auth->add($client);

        //Role Personal Trainer
        $personalTrainer = $auth->createRole('personalTrainer');
        $auth->add($personalTrainer);

        //Role Adminstrador
        $admin = $auth->createRole('admin');
        $auth->add($admin);

        /*Criacao Permissoes */

        # - - - - - - - - - Create - - - - - - - - - 
        // Create Users
        $createUser = $auth->createPermission('createUser');
        $createUser->description = 'Create an User';
        $auth->add($createUser);

        // Create Exercises
        $createExercise = $auth->createPermission('createExercise');
        $createExercise->description = 'Create an Exercise';
        $auth->add($createExercise);

        // Create Workouts | Treinos | 
        $createWorkout = $auth->createPermission('createWorkout');
        $createWorkout->description = 'Create a Workout';
        $auth->add($createWorkout);

        // Create Plans | Planos de Treino |
        $createPlan = $auth->createPermission('createPlan');
        $createPlan->description = 'Create a Plan';
        $auth->add($createPlan);

        // Create Products
        $createProduct = $auth->createPermission('createProduct');
        $createProduct->description = 'Create a Product';
        $auth->add($createProduct);

        // Create Parcel | Encomenda |
        $createParcel = $auth->createPermission('createParcel');
        $createParcel->description = 'Create an Parcel';
        $auth->add($createParcel);

        // Create Parcel Payment | Pagamento Encomenda |
        $createParcelPayment = $auth->createPermission('createParcelPayment');
        $createParcelPayment->description = 'Create a Parcel Payment';
        $auth->add($createParcelPayment);

        // Create PTPayment | Pagamento Personal Trainer |
        $createPTPayment = $auth->createPermission('createPTPayment');
        $createPTPayment->description = 'Create a Personal Trainer Payment';
        $auth->add($createPTPayment);

        //Create ClientRating | Avaliacao Cliente pelo PT |
        $createClientRating = $auth->createPermission('createClientRating');
        $createClientRating->description = 'Create a Client Rating';
        $auth->add($createClientRating);

        # - - - - - - - - - Read - - - - - - - - - 
        // Read Users
        $readUser = $auth->createPermission('readUser');
        $readUser->description = 'Read an User';
        $auth->add($readUser);

        // Read Personal Trainer
        $readPT = $auth->createPermission('readPT');
        $readPT->description = 'Read a Personal Trainer';
        $auth->add($readPT);

        // Read Exercises
        $readExercise = $auth->createPermission('readExercise');
        $readExercise->description = 'Read an Exercise';
        $auth->add($readExercise);

        // Read Workouts | Ver Treinos |
        $readWorkout = $auth->createPermission('readWorkout');
        $readWorkout->description = 'Read a Workout';
        $auth->add($readWorkout);

        // Read Plans | Ver Planos Treino |
        $readPlan = $auth->createPermission('readPlan');
        $readPlan->description = 'Read a Plan';
        $auth->add($readPlan);

        // Read Products
        $readProduct = $auth->createPermission('readProduct');
        $readProduct->description = 'Read a Product';
        $auth->add($readProduct);

        // Read Parcel | Ver Encomenda |
        $readParcel = $auth->createPermission('readParcel');
        $readParcel->description = 'Read a Parcel';
        $auth->add($readParcel);

        //Read ClientRating | Avaliacao Cliente pelo PT |
        $readClientRating = $auth->createPermission('ReadClientRating');
        $readClientRating->description = 'Read a Client Rating';
        $auth->add($readClientRating);

        # - - - - - - - - - Update - - - - - - - - -  
        // Update Users
        $updateUser = $auth->createPermission('updateUser');
        $updateUser->description = 'Update an User';
        $auth->add($updateUser);

        // Update Exercises
        $updateExercise = $auth->createPermission('updateExercise');
        $updateExercise->description = 'Update an Exercise';
        $auth->add($updateExercise);

        // Update Workouts | Ver Treinos |
        $updateWorkout = $auth->createPermission('updateWorkout');
        $updateWorkout->description = 'Update a Workout';
        $auth->add($updateWorkout);

        // Update Plans | Ver Planos Treino |
        $updatePlan = $auth->createPermission('updatePlan');
        $updatePlan->description = 'Update a Plan';
        $auth->add($updatePlan);

        // Update Products
        $updateProduct = $auth->createPermission('updateProduct');
        $updateProduct->description = 'Update a Product';
        $auth->add($updateProduct);

        //Update Parcel
        $updateParcel = $auth->createPermission('updateParcel');
        $updateParcel->description = 'Update an Parcel';
        $auth->add($updateParcel);

        //Update User Profile
        $updateUserProfile = $auth->createPermission('updateUserProfile');
        $updateUserProfile->description = 'Update an User Profile';
        $auth->add($updateUserProfile);

        //Update ClientRating | Avaliacao Cliente pelo PT |
        $updateClientRating = $auth->createPermission('updateClientRating');
        $updateClientRating->description = 'Update a Client Rating';
        $auth->add($updateClientRating);

        # - - - - - - - - Delete - - - - - - - - - 
        // Delete Exercises
        $deleteExercise = $auth->createPermission('deleteExercise');
        $deleteExercise->description = 'Update an Exercise';
        $auth->add($deleteExercise);

        // Delete Workouts | Apagar Treinos |
        $deleteWorkout = $auth->createPermission('deleteWorkout');
        $deleteWorkout->description = 'Delete a Workout';
        $auth->add($deleteWorkout);

        // Delete Plans | Apagar Planos de Treino |
        $deletePlan = $auth->createPermission('deletePlan');
        $deletePlan->description = 'Update a Plan';
        $auth->add($deletePlan);

        // Delete Products
        $deleteProduct = $auth->createPermission('deleteProduct');
        $deleteProduct->description = 'Update a Product';
        $auth->add($deleteProduct);

        /* Atribuição Permissões aos Roles */
        //Admin
        $auth->addChild($admin, $createUser);
        $auth->addChild($admin, $createExercise);
        $auth->addChild($admin, $createProduct);

        $auth->addChild($admin, $readUser);
        $auth->addChild($admin, $readExercise);
        $auth->addChild($admin, $readProduct);
        $auth->addChild($admin, $readParcel);

        $auth->addChild($admin, $updateUser);
        $auth->addChild($admin, $updateExercise);
        $auth->addChild($admin, $updateProduct);
        $auth->addChild($admin, $updateParcel);

        $auth->addChild($admin, $deleteExercise);
        $auth->addChild($admin, $deleteProduct);

        //Cliente
        $auth->addChild($client, $createWorkout);
        $auth->addChild($client, $createParcel);
        $auth->addChild($client, $createParcelPayment);
        $auth->addChild($client, $createPTPayment);

        $auth->addChild($client, $readPT);
        $auth->addChild($client, $readExercise);
        $auth->addChild($client, $readWorkout);
        $auth->addChild($client, $readPlan);
        $auth->addChild($client, $readProduct);
        $auth->addChild($client, $readParcel);
        $auth->addChild($client, $readClientRating);

        $auth->addChild($client, $updateUserProfile);

        $auth->addChild($client, $deletePlan);
        $auth->addChild($client, $updateUserProfile);
        $auth->addChild($client, $updateUserProfile);

        //Personal Trainer
        $auth->addChild($personalTrainer, $createWorkout);
        $auth->addChild($personalTrainer, $createPlan);
        $auth->addChild($personalTrainer, $createClientRating);
        $auth->addChild($personalTrainer, $createUser);
        $auth->addChild($personalTrainer, $createUser);

        $auth->addChild($personalTrainer, $readUser);
        $auth->addChild($personalTrainer, $readExercise);
        $auth->addChild($personalTrainer, $readWorkout);
        $auth->addChild($personalTrainer, $readPlan);
        $auth->addChild($personalTrainer, $readClientRating);

        $auth->addChild($personalTrainer, $updateWorkout);
        $auth->addChild($personalTrainer, $updatePlan);
        $auth->addChild($personalTrainer, $updateUserProfile);
        $auth->addChild($personalTrainer, $readClientRating);

        $auth->addChild($personalTrainer, $deleteWorkout);
        $auth->addChild($personalTrainer, $deletePlan);
        $auth->addChild($personalTrainer, $deleteProduct);
    }

    public function down()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();
        return false;
    }
}