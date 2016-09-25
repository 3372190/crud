<?php
require 'vendor/autoload.php';

//use crud\Database;
use crud\Models\Task;
use crud\Storage\DatabaseTaskStorage;
use crud\TaskManager;

$db = new PDO('mysql:localhost=127.0.0.1; dbname=todo','root','');


$manager = new TaskManager(new DatabaseTaskStorage($db));


//get all the tasks
// $getTasks = $manager->getTasks();
// var_dump($getTasks);
//
// //get specific Task
// $getTask = $manager->getTask(27);
// var_dump($getTask);
//
// //update specific Task
// $getTask->setDescription('I Done Workout');
// $updateTask = $manager->updateTask($getTask);
// var_dump($updateTask);

//create a new Task
      // $newTask = new Task;
      // $newTask->setDescription('Second Round Workout will Begin Soon');
      // $newTask->setComplete();
      // $newTask->setDue(new DateTime);
      //
      // $newTask = $manager->addTask($newTask);
      // var_dump($newTask);

//delete a exisiting Task
// $manager->deleteTask([30]);

/**
 * Display All Record in database!
 * Step 1 : Instantiate the $storage Object
 * $storage = new DatabaseTaskStorage($db);
 *
 * Step 2 : call to the method all() in $storage Object
 * $storage->all();
 */
// $storage = new DatabaseTaskStorage($db);
// var_dump($storage->all());



/**
 * To get Specific Database Record!
 * - Instantiate DatabaseTaskStorage Object! with Dependency Injection, PDO Object
 *       $storage = new DatabaseTaskStorage($db);
 * GET specific database Record by match the record Id.
 * $storage->get();
 */
//$storage = new DatabaseTaskStorage($db);
// $taskId = $storage->get(3);
// var_dump($taskId);


/**
 * Create/Insert a new Task into database Record!!
 * By Passing the Task Object into $storage->store(Task $task) function!
 * (Task $task) typehinting of Task, is to make sure only instance of Object Task
 * will be able to passes into the function $storage->store();
 *
 * Step : 1
 *  - Instantiate Task Object!
 *        $task = new Task;
 *  - Instantiate DatabaseTaskStorage Object! with Dependency Injection, PDO Object
 *        $storage = new DatabaseTaskStorage($db);
 * Step : 2
 *  - Set Propertie's value in $task object.
 *        $task->setDescription('OMG');
 *        $task->setDue(new DateTime('+ 5 minutes', new DataTimeZone('Australia/Melbourne')));
 * Step : 3
 * - Pass Everything of $task Object into $storage->store(Task $task) Method!
 *    By $storage->store($task);  //$task Object Passed into store()Method in $storage Object
 * - To Create New Record in Database!! task!!
 */
        // $task = new Task;
        // $storage = new DatabaseTaskStorage($db);
        //
        // $task->setDescription("It is 4PM NOW. ");
        // $task->setDue(new DateTime('+ 2 Hours', new DateTimeZone('Australia/Melbourne')));
        // $storage->store($task);


/**
 * Update Existing database Record!!!
 * Step 1 : Instantiate DatabaseTaskStorage Object!!
 *     $storage = new DatabaseTaskStorage($db);
 * Step 2 :
 * To update the Existing Database Record,
 * We Need To Know Which Records We want to UPDATE!! By Knowing the exact Record ($id);
 * To do this we need to Retrieve the $database Record First.
 * - By calling $storage-get($id); Method
 *     $taskId = $storage->get(25); //Eg : Record $id = 25;
 * Step 3:
 * - Reset the value of Record that been retreived!!
 *        $taskId->setDescription('OverWrite the Record');
 *        $taskId->setDue(new DataTime('now'));
 *        $taskId->setComplete(false);
 * Why We Are Able to Use Method Belong to $task Object???
 *     - WITHOUT Instantiate OR Pass the Object Task Into get() or update() Method??
 *     - Because, THE Database Record Fetch Back As A Task Object
 *     $statement->setFetchMode(PDO::FETCH_CLASS, Task::class);
 *     SO WHEN WE GET THE RECORD, IT Involve Methods And Property of $task Object!
 *     SO Setter/Getter and Properties of $task Object can be used!
 * Step 4:
 *   - Pass the $task Object into Update Method Existing In $storage Object!
 *         $storage->update($taskId)!!
 */
    //  $storage = new DatabaseTaskStorage($db);
     //
    //  $taskId  = $storage->get(30);
    //  $taskId->setComplete(true);
     //
    //  $storage->update($taskId);

/**
 * Delete an Exisiting Record!
 * To do This, We must Know the Exact Record Id we Want to Delete!!
 *
 * Step 1 : Instantiate DatabaseTaskStorage($db) Object
 *     $storage = new DatabaseTaskStorage($db);
 *
 * Step 2: Retrieve the Object by Id;
 *     $taskId = $storage->get(25);
 *
 * Step 3: Pass the Object Into delete Method in $storage Object!!
 *     $storage->delete($taskId);
 */
      //
      // $storage = new DatabaseTaskStorage($db);
      // $taskId = $storage->get(26);
      // $storage->delete($taskId);
