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

        //Definicao manual dos dados do administrador
        $adminUsername = '{adminUsernameExemplo}';
        $adminPassword = '{adminPasswordExemplo}';
        $adminEmail = '{admin@exemplo.com}';

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

        /*Criacao Permissoes */

        # - - - - - - - - - Create - - - - - - - - - 
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
        $createPTApplication->description = 'Create an Request to be a Personal Trainer';
        $auth->add($createPTApplication);

        // Create Exercises
        $createExercise = $auth->createPermission('createExercise');
        $createExercise->description = 'Create an Exercise';
        $auth->add($createExercise);

        // Create Products
        $createProduct = $auth->createPermission('createProduct');
        $createProduct->description = 'Create an Product';
        $auth->add($createProduct);

        // Create Workout Plans
        $createWorkoutPlan = $auth->createPermission('createWorkoutPlan');
        $createWorkoutPlan->description = 'Create an Workout Plans';
        $auth->add($createWorkoutPlan);

        // Create Workouts Personal Trainer
        $createWorkoutPT = $auth->createPermission('createWorkoutPT');
        $createWorkoutPT->description = 'Create an Workout Personal Trainer';
        $auth->add($createWorkoutPT);

        // Create Workouts Admin
        $createWorkoutAdmin = $auth->createPermission('createWorkoutAdmin');
        $createWorkoutAdmin->description = 'Create an Workout Admin';
        $auth->add($createWorkoutAdmin);

        // Create ExerciseSuggestion
        $createExerciseSuggestion = $auth->createPermission('createExerciseSuggestion');
        $createExerciseSuggestion->description = 'Create an  Exercise Suggestion';
        $auth->add($createExerciseSuggestion);

        # - - - - - - - - - Read - - - - - - - - - 
        // Read Statistics
        $readStatistics = $auth->createPermission('readStatistics');
        $readStatistics->description = 'Read Statistics';
        $auth->add($readStatistics);

        // Read Products
        $readProducts = $auth->createPermission('readProducts');
        $readProducts->description = 'Read Products';
        $auth->add($readProducts);

        // Read Profile Data Client
        $readProfileDataClient = $auth->createPermission('readProfileDataClient');
        $readProfileDataClient->description = 'Read Profile Data Client';
        $auth->add($readProfileDataClient);

        // Read Profile Data Personal Trainer
        $readProfileDataPT = $auth->createPermission('readProfileDataPT');
        $readProfileDataPT->description = 'Read Profile Data Personal Trainer';
        $auth->add($readProfileDataPT);

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
        $readChatClient->description = 'Read an Chat Client Side';
        $auth->add($readChatClient);

        // Read Chat Personal Trainer
        $readChatPersonalTrainer = $auth->createPermission('readChatPersonalTrainer');
        $readChatPersonalTrainer->description = 'Read an Chat Personal Trainer Side';
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

        # - - - - - - - - - Update - - - - - - - - -  
        // Update Client Profile Data
        $updateProfileDataClient  = $auth->createPermission('updateProfileDataClient');
        $updateProfileDataClient->description = 'Update Client Profile Data';
        $auth->add($updateProfileDataClient);

        // Update Personal Trainer Profile Data
        $updateProfileDataPersonalTrainer  = $auth->createPermission('updateProfileDataPersonalTrainer');
        $updateProfileDataPersonalTrainer->description = 'Update Personal Trainer Profile Data';
        $auth->add($updateProfileDataPersonalTrainer);

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

        # - - - - - - - - Delete - - - - - - - - - 
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

        /* Atribuição Permissões aos Roles */
        //Admin
        $auth->addChild($admin, $createExercise);
        $auth->addChild($admin, $createProduct);
        $auth->addChild($admin, $createWorkoutAdmin);

        $auth->addChild($admin, $readUsers);
        $auth->addChild($admin, $readExercises);
        $auth->addChild($admin, $readProducts);
        $auth->addChild($admin, $readOrders);
        $auth->addChild($admin, $readExercisesSuggestionsAdmin);
        $auth->addChild($admin, $readPTApplication);
        $auth->addChild($admin, $readWorkouts);

        $auth->addChild($admin, $updateUsers);
        $auth->addChild($admin, $updateExercises);
        $auth->addChild($admin, $updateProducts);
        $auth->addChild($admin, $updateOrdersStatus);
        $auth->addChild($admin, $updateExercisesSuggestions);
        $auth->addChild($admin, $updatePTApplication);
        $auth->addChild($admin, $updateWorkoutsAdmin);

        $auth->addChild($admin, $deleteExercises);
        $auth->addChild($admin, $deleteWorkoutsAdmin);

        //Cliente
        $auth->addChild($client, $createOrder);
        $auth->addChild($client, $createPayment);
        $auth->addChild($client, $createContract);
        $auth->addChild($client, $createChatClient);
        $auth->addChild($client, $createPTApplication);

        $auth->addChild($client, $readStatistics);
        $auth->addChild($client, $readProducts);
        $auth->addChild($client, $readProfileDataClient);
        $auth->addChild($client, $readOrderStatus);
        $auth->addChild($client, $readPersonalTrainers);
        $auth->addChild($client, $readChatClient);

        $auth->addChild($client, $updateProfileDataClient);
        $auth->addChild($client, $updatePersonalTrainerContract);

        //Personal Trainer
        $auth->addChild($personalTrainer, $createChatPersonalTrainer);
        $auth->addChild($personalTrainer, $createWorkoutPlan);
        $auth->addChild($personalTrainer, $createWorkoutPT);
        $auth->addChild($personalTrainer, $createExerciseSuggestion);

        $auth->addChild($personalTrainer, $readChatPersonalTrainer);
        $auth->addChild($personalTrainer, $readWorkoutPlansPT);
        $auth->addChild($personalTrainer, $readProfileDataPT);
        $auth->addChild($personalTrainer, $readWorkoutsPT);
        $auth->addChild($personalTrainer, $readExercisesSuggestionsPT);

        $auth->addChild($personalTrainer, $updateWorkoutPlansPT);
        $auth->addChild($personalTrainer, $updateProfileDataPersonalTrainer);
        $auth->addChild($personalTrainer, $updateWorkoutsPT);

        $auth->addChild($personalTrainer, $deleteWorkoutPlans);
        $auth->addChild($personalTrainer, $deleteWorkoutsPT);
    }

    public function down()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();
        return false;
    }
}
