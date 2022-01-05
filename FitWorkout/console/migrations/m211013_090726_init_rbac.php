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

        //region Criação de Roles

        // Role Cliente 
        $client = $auth->createRole('client');
        $auth->add($client);

        //Role Personal Trainer
        $personalTrainer = $auth->createRole('personalTrainer');
        $auth->add($personalTrainer);

        //Role Adminstrador
        $admin = $auth->createRole('admin');
        $auth->add($admin);

        //endregion

        //region Criação do User Admin

        $adminUsername = 'admin';
        $adminPassword = 'adminadmin';
        $adminEmail = 'admin@admin.pt';

        $authKey = Yii::$app->getSecurity()->generateRandomString();
        $hash = Yii::$app->getSecurity()->generatePasswordHash($adminPassword);

        //Criação do User Admin
        $this->insert('user', [
            'username' => $adminUsername,
            'auth_key' => $authKey,
            'password_hash' => $hash,
            'email' => $adminEmail,
            'status' => 10,
            'created_at' => Yii::$app->formatter->asTimestamp('now'),
            'updated_at' => Yii::$app->formatter->asTimestamp('now'),
        ]);

        $auth->assign($admin, $this->db->getLastInsertID());

        //endregion

        //region Criação de Permissões

        #region - - - - - - - - - Create - - - - - - - - -
        // Create Order
        $createOrder = $auth->createPermission('createOrder');
        $createOrder->description = 'Create an Order';
        $auth->add($createOrder);

        // Create Payment
        $createPayment = $auth->createPermission('createPayment');
        $createPayment->description = 'Create a Payment';
        $auth->add($createPayment);

        // Create Contract
        $createContract = $auth->createPermission('createContract');
        $createContract->description = 'Create a Contract';
        $auth->add($createContract);

        // Create Chat Cliente 
        $createChatClient = $auth->createPermission('createChatClient');
        $createChatClient->description = 'Create an Chat Client Side';
        $auth->add($createChatClient);

        // Create Chat Personal Trainer
        $createChatPersonalTrainer = $auth->createPermission('createChatPersonalTrainer');
        $createChatPersonalTrainer->description = 'Create an Chat Personal Trainer Side';
        $auth->add($createChatPersonalTrainer);

        // Create Request to be a Personal Trainer
        $createPTApplication  = $auth->createPermission('createPTApplication');
        $createPTApplication->description = 'Create a Request to be a Personal Trainer';
        $auth->add($createPTApplication);

        // Create Exercises
        $createExercise = $auth->createPermission('createExercise');
        $createExercise->description = 'Create an Exercise';
        $auth->add($createExercise);

        // Create Products
        $createProduct = $auth->createPermission('createProduct');
        $createProduct->description = 'Create a Product';
        $auth->add($createProduct);

        // Create Workout Plans
        $createWorkoutPlan = $auth->createPermission('createWorkoutPlan');
        $createWorkoutPlan->description = 'Create a Workout Plan';
        $auth->add($createWorkoutPlan);

        // Create Workouts Personal Trainer
        $createWorkoutPT = $auth->createPermission('createWorkoutPT');
        $createWorkoutPT->description = 'Create a Workout as a Personal Trainer';
        $auth->add($createWorkoutPT);

        // Create Workouts Admin
        $createWorkoutAdmin = $auth->createPermission('createWorkoutAdmin');
        $createWorkoutAdmin->description = 'Create an Workout as an Admin';
        $auth->add($createWorkoutAdmin);

        // Create Exercise Suggestion
        $createExerciseSuggestion = $auth->createPermission('createExerciseSuggestion');
        $createExerciseSuggestion->description = 'Create an Exercise Suggestion';
        $auth->add($createExerciseSuggestion);

        // Create Exercise Category
        $createExerciseCategory = $auth->createPermission('createExerciseCategory');
        $createExerciseCategory->description = 'Create an Exercise Category';
        $auth->add($createExerciseCategory);

        // Create Exercise Type
        $createExerciseType = $auth->createPermission('createExerciseType');
        $createExerciseType->description = 'Create an Exercise Type';
        $auth->add($createExerciseType);

        // Create Product Category
        $createProductCategory = $auth->createPermission('createProductCategory');
        $createProductCategory->description = 'Create a Product Category';
        $auth->add($createProductCategory);
        #endregion

        #region - - - - - - - - -  Read  - - - - - - - - -
        // Read Statistics
        $readStatistics = $auth->createPermission('readStatistics');
        $readStatistics->description = 'Read Statistics';
        $auth->add($readStatistics);

        // Read Products
        $readProducts = $auth->createPermission('readProducts');
        $readProducts->description = 'Read Products';
        $auth->add($readProducts);

        // Read User Profile
        $readUserProfile = $auth->createPermission('readUserProfile');
        $readUserProfile->description = 'Read Users Profile';
        $auth->add($readUserProfile);

        // Read User Data
        $readUserData = $auth->createPermission('readUserData');
        $readUserData->description = 'Read Users Data';
        $auth->add($readUserData);

        // Read Personal Trainers
        $readPersonalTrainers = $auth->createPermission('readPersonalTrainers');
        $readPersonalTrainers->description = 'Read Personal Trainers';
        $auth->add($readPersonalTrainers);

        // Read Order Status
        $readOrderStatus = $auth->createPermission('readOrderStatus');
        $readOrderStatus->description = 'Read Order Status';
        $auth->add($readOrderStatus);

        // Read Chat Cliente 
        $readChatClient = $auth->createPermission('readChatClient');
        $readChatClient->description = 'Read a Chat Client Side';
        $auth->add($readChatClient);

        // Read Chat Personal Trainer
        $readChatPersonalTrainer = $auth->createPermission('readChatPersonalTrainer');
        $readChatPersonalTrainer->description = 'Read a Chat Personal Trainer Side';
        $auth->add($readChatPersonalTrainer);

        // Read Users
        $readUsers = $auth->createPermission('readUsers');
        $readUsers->description = 'Read Users';
        $auth->add($readUsers);

        // Read Exercises
        $readExercises = $auth->createPermission('readExercises');
        $readExercises->description = 'Read Exercises';
        $auth->add($readExercises);

        // Read Orders Admin
        $readOrders = $auth->createPermission('readOrders');
        $readOrders->description = 'Read Orders Admin';
        $auth->add($readOrders);

        // Read WorkoutPlansPT
        $readWorkoutPlansPT = $auth->createPermission('readWorkoutPlansPT');
        $readWorkoutPlansPT->description = 'Read Workout Plans Personal Trainer';
        $auth->add($readWorkoutPlansPT);

        // Read WorkoutsPT
        $readWorkoutsPT = $auth->createPermission('readWorkoutsPT');
        $readWorkoutsPT->description = 'Read Workout Personal Trainer';
        $auth->add($readWorkoutsPT);

        // Read Exercises Suggestions PT
        $readExercisesSuggestionsPT = $auth->createPermission('readExercisesSuggestionsPT');
        $readExercisesSuggestionsPT->description = 'Read Exercises Suggestions PT';
        $auth->add($readExercisesSuggestionsPT);

        // Read Exercises Suggestions Admin
        $readExercisesSuggestionsAdmin = $auth->createPermission('readExercisesSuggestionsAdmin');
        $readExercisesSuggestionsAdmin->description = 'Read Exercises Suggestions Admin';
        $auth->add($readExercisesSuggestionsAdmin);

        // Read Apllications for Personal Trainer
        $readPTApplication  = $auth->createPermission('readPTApplication');
        $readPTApplication->description = 'Read Apllications for Personal Trainer';
        $auth->add($readPTApplication);

        // Read Workouts Admin
        $readWorkouts  = $auth->createPermission('readWorkouts');
        $readWorkouts->description = 'Read Workouts';
        $auth->add($readWorkouts);

        // Read Exercise Category
        $readExerciseCategory = $auth->createPermission('readExerciseCategory');
        $readExerciseCategory->description = 'Read an Exercise Category';
        $auth->add($readExerciseCategory);

        // Read Exercise Type
        $readExerciseType = $auth->createPermission('readExerciseType');
        $readExerciseType->description = 'Read an Exercise Type';
        $auth->add($readExerciseType);

        // Read Product Category
        $readProductCategory = $auth->createPermission('readProductCategory');
        $readProductCategory->description = 'Read a Product Category';
        $auth->add($readProductCategory);
        #endregion

        #region - - - - - - - - - Update - - - - - - - - -
        // Update User Profile
        $updateUserProfile  = $auth->createPermission('updateUserProfile');
        $updateUserProfile->description = 'Update Users Profile';
        $auth->add($updateUserProfile);

        // Update User Data
        $updateUserData  = $auth->createPermission('updateUserData');
        $updateUserData->description = 'Update Users Data';
        $auth->add($updateUserData);

        // Update Personal Trainer Contract
        $updatePersonalTrainerContract  = $auth->createPermission('updatePersonalTrainerContract');
        $updatePersonalTrainerContract->description = 'Update Personal Trainer Contract';
        $auth->add($updatePersonalTrainerContract);

        // Update Users
        $updateUsers = $auth->createPermission('updateUsers');
        $updateUsers->description = 'Update Users';
        $auth->add($updateUsers);

        // Update Exercises
        $updateExercises = $auth->createPermission('updateExercises');
        $updateExercises->description = 'Update Exercises';
        $auth->add($updateExercises);

        // Update Products
        $updateProducts = $auth->createPermission('updateProducts');
        $updateProducts->description = 'Update Products';
        $auth->add($updateProducts);

        // Update Orders Status
        $updateOrdersStatus = $auth->createPermission('updateOrdersStatus');
        $updateOrdersStatus->description = 'Update Order Status';
        $auth->add($updateOrdersStatus);

        // Update WorkoutPlans Personal Trainer
        $updateWorkoutPlansPT = $auth->createPermission('updateWorkoutPlansPT');
        $updateWorkoutPlansPT->description = 'Update Workout Plans Personal Trainer';
        $auth->add($updateWorkoutPlansPT);

        // Update Workouts Personal Trainer
        $updateWorkoutsPT = $auth->createPermission('updateWorkoutsPT');
        $updateWorkoutsPT->description = 'Update Plans Personal Trainer';
        $auth->add($updateWorkoutsPT);

        // Update Exercises Suggestions
        $updateExercisesSuggestions = $auth->createPermission('updateExercisesSuggestions');
        $updateExercisesSuggestions->description = 'Update Exercises Suggestions';
        $auth->add($updateExercisesSuggestions);

        // Update Apllications for Personal Trainer
        $updatePTApplication  = $auth->createPermission('updatePTApplication');
        $updatePTApplication->description = 'Update Apllications for Personal Trainer';
        $auth->add($updatePTApplication);

        // Update Workouts Admin
        $updateWorkoutsAdmin  = $auth->createPermission('updateWorkoutsAdmin');
        $updateWorkoutsAdmin->description = 'Update Workouts Admin';
        $auth->add($updateWorkoutsAdmin);

        // Update Exercise Category
        $updateExerciseCategory = $auth->createPermission('updateExerciseCategory');
        $updateExerciseCategory->description = 'Update an Exercise Category';
        $auth->add($updateExerciseCategory);

        // Update Exercise Type
        $updateExerciseType = $auth->createPermission('updateExerciseType');
        $updateExerciseType->description = 'Update an Exercise Type';
        $auth->add($updateExerciseType);

        // Update Product Category
        $updateProductCategory = $auth->createPermission('updateProductCategory');
        $updateProductCategory->description = 'Update a Product Category';
        $auth->add($updateProductCategory);
        #endregion

        #region - - - - - - - - - Delete - - - - - - - - -
        // Delete Exercises
        $deleteExercises  = $auth->createPermission('deleteExercises');
        $deleteExercises->description = 'Delete Exercises';
        $auth->add($deleteExercises);

        // Delete WorkoutPlans
        $deleteWorkoutPlans = $auth->createPermission('deleteWorkoutPlans');
        $deleteWorkoutPlans->description = 'Delete Workout Plans';
        $auth->add($deleteWorkoutPlans);

        // Delete Workouts Personal Trainer
        $deleteWorkoutsPT = $auth->createPermission('deleteWorkoutsPT');
        $deleteWorkoutsPT->description = 'Delete Workouts Personal Trainer';
        $auth->add($deleteWorkoutsPT);

        // Delete Workouts Admin
        $deleteWorkoutsAdmin = $auth->createPermission('deleteWorkoutsAdmin');
        $deleteWorkoutsAdmin->description = 'Delete Workouts';
        $auth->add($deleteWorkoutsAdmin);

        // Delete Exercise Category
        $deleteExerciseCategory = $auth->createPermission('deleteExerciseCategory');
        $deleteExerciseCategory->description = 'Delete an Exercise Category';
        $auth->add($deleteExerciseCategory);

        // Delete Exercise Type
        $deleteExerciseType = $auth->createPermission('deleteExerciseType');
        $deleteExerciseType->description = 'Delete an Exercise Type';
        $auth->add($deleteExerciseType);

        // Delete Product Category
        $deleteProductCategory = $auth->createPermission('deleteProductCategory');
        $deleteProductCategory->description = 'Delete a Product Category';
        $auth->add($deleteProductCategory);
        #endregion

        //endregion

        //region Atribuição Permissões aos Roles

        //Admin
        $auth->addChild($admin, $createExerciseCategory);
        $auth->addChild($admin, $createExerciseType);
        $auth->addChild($admin, $createExercise);
        $auth->addChild($admin, $createProductCategory);
        $auth->addChild($admin, $createProduct);
        $auth->addChild($admin, $createWorkoutAdmin);

        $auth->addChild($admin, $readUsers);
        $auth->addChild($admin, $readExerciseCategory);
        $auth->addChild($admin, $readExerciseType);
        $auth->addChild($admin, $readExercises);
        $auth->addChild($admin, $readProductCategory);
        $auth->addChild($admin, $readProducts);
        $auth->addChild($admin, $readOrders);
        $auth->addChild($admin, $readExercisesSuggestionsAdmin);
        $auth->addChild($admin, $readPTApplication);
        $auth->addChild($admin, $readWorkouts);

        $auth->addChild($admin, $updateUsers);
        $auth->addChild($admin, $updateExerciseCategory);
        $auth->addChild($admin, $updateExerciseType);
        $auth->addChild($admin, $updateExercises);
        $auth->addChild($admin, $updateProductCategory);
        $auth->addChild($admin, $updateProducts);
        $auth->addChild($admin, $updateOrdersStatus);
        $auth->addChild($admin, $updateExercisesSuggestions);
        $auth->addChild($admin, $updatePTApplication);
        $auth->addChild($admin, $updateWorkoutsAdmin);

        $auth->addChild($admin, $deleteExerciseCategory);
        $auth->addChild($admin, $deleteExerciseType);
        $auth->addChild($admin, $deleteExercises);
        $auth->addChild($admin, $deleteProductCategory);
        $auth->addChild($admin, $deleteWorkoutsAdmin);

        //Cliente
        $auth->addChild($client, $createOrder);
        $auth->addChild($client, $createPayment);
        $auth->addChild($client, $createContract);
        $auth->addChild($client, $createChatClient);
        $auth->addChild($client, $createPTApplication);

        $auth->addChild($client, $readStatistics);
        $auth->addChild($client, $readProducts);
        $auth->addChild($client, $readUserProfile);
        $auth->addChild($client, $readUserData);
        $auth->addChild($client, $readOrderStatus);
        $auth->addChild($client, $readPersonalTrainers);
        $auth->addChild($client, $readChatClient);

        $auth->addChild($client, $updateUserProfile);
        $auth->addChild($client, $updateUserData);
        $auth->addChild($client, $updatePersonalTrainerContract);

        //Personal Trainer
        $auth->addChild($personalTrainer, $createChatPersonalTrainer);
        $auth->addChild($personalTrainer, $createWorkoutPlan);
        $auth->addChild($personalTrainer, $createWorkoutPT);
        $auth->addChild($personalTrainer, $createExerciseSuggestion);

        $auth->addChild($personalTrainer, $readChatPersonalTrainer);
        $auth->addChild($personalTrainer, $readWorkoutPlansPT);
        $auth->addChild($personalTrainer, $readWorkoutsPT);
        $auth->addChild($personalTrainer, $readExercisesSuggestionsPT);

        $auth->addChild($personalTrainer, $updateWorkoutPlansPT);
        $auth->addChild($personalTrainer, $updateWorkoutsPT);

        $auth->addChild($personalTrainer, $deleteWorkoutPlans);
        $auth->addChild($personalTrainer, $deleteWorkoutsPT);

        $auth->addChild($personalTrainer, $client);

        //endregion
    }

    public function down()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();
        return false;
    }
}
