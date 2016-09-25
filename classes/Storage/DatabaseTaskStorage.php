<?php

/**
 * namespace is the Path Redirectory of the Class!!
 */
namespace crud\Storage;

/**
 * use Function is for composer/Vendor inorder to find the file Path Redirectory
 */
 use crud\Models\Task;
 use crud\Storage\Contract\TaskStorageInterface;
 use PDO;

/**
 * DatabaseTaskStorage's Class Goals is to control the
 * store, update, display and Delete Method of Task from database!!!!
 * implements with interface class!!! To make sure all other similiar function
 * class with $task has all these method implemented.
 */
class DatabaseTaskStorage implements TaskStorageInterface
{
    /**
      * Dependency Injection with __construct Method!!!
      * DatabaseTaskStorage Class Is Dependence On PDO Object!!
      * To Instantiate DatabaseTaskStorage object,
      * PDO Object must be injected as parameter in __construct Method.
    */

    //Save the Pdo Object into property.
    protected $db;

    public function __construct(PDO $db)
    {
      $this->db = $db;
    }

    /**
      * To Retrieve the Exact database Record by Knowing the Record ID!!
      * Also For update() AND delet() purposes
    */
    public function get($id){



      //Prepare statement will only prepare the query to be executed!!
      $statement = $this->db->prepare("
          SELECT id, description, due, complete
          FROM   task
          WHERE  id = :id
      ");

      //Set The Result Fetch back from database into Object Style!!
      //By PDO Object Fetch Back with Class, and belong to $task Class!!
      $statement->setFetchMode(PDO::FETCH_CLASS, Task::class);

      // Return True if placeHolder :id = actual value from parameter $id.
      $statement->execute([
        ':id' => $id,
      ]);

      //Retrieve /Fetch The Result from Database!
      return $statement->fetch();
    }


    /**
     * FetchAll all records in database and output it
    */
    public function all()
    {
        $statement = $this->db->prepare("
          SELECT id, description, due, complete
          FROM task
        ");

        //fetch the records back from database with class property
        //instead of database record. (mysqli_fetch_object);
        $statement->setFetchMode(PDO::FETCH_CLASS, Task::class);
        $statement->execute();
        return $statement->fetchAll();
    }




    /**
     *create and save inserted record into database!!!
     */
    public function store(Task $task)
    {
        $statement = $this->db->prepare("
            INSERT INTO task(description, due, complete)
            VALUES (:description, :due, :complete)
        ");

        //Because Task Object Passed Into store Method!!
        //So store Method also contain all Method and Property belong to Task Class!!
        //that's why we can use getters in Task Object!
        $statement->execute($this->buildColumns($task));

        //Returning the last performce Id, Bascially mean the return Id.
        return $this->get($this->db->lastInsertId());
    }

      /**
       * Updating the Record by Knowing the Exact Task Object ,
       * By calling $task->get(); method First with $id paramater!!
       *
       */
    public function update(Task $task)
    {
        $statement = $this->db->prepare("
            UPDATE task
            SET
                description = :description,
                due         = :due,
                complete    = :complete
            WHERE id = :id
        ");

        $statement->execute($this->buildColumns($task, [
            ':id' => $task->getId()
        ]));

        //Calling the get() Method with getter $id Passed back to get() Method!
        //What this is doing, is returning the current performce record back to retrieved record
        return $this->get($task->getId());
    }

      /**
       *Delete the Exisiting db Record by Task Object
       * First get the exact db Record
       * $task->getId() .... getting the id from $this->get() Method!!
       */
    public function delete($id = [])
    {

      $statement = $this->db->prepare("
          DELETE FROM task
          WHERE id = :id
      ");

      $statement->execute([
          ':id'=> $id,
      ]);

      return $this->db->lastInsertId();
    }

    /**
     * Refactory Method, Reduce Duplicated Code.
     * By Passing the Parameter of Task Object and an $addtional = Array();
     * Task Object will return an Array of Task Setters!!!
     * Array will be combining the additional data into the like ($id)
     * or any other addiontal data which need to be added into the same array to be executed
     *
     * Two combine two Array into one, we use array_merge([],[]) function to combine two diff Array
     * return array_merge($task,$addtioanl);
     */
    //
    protected function buildColumns(Task $task, $additional = [])
    {
        $task = [
          'description' => $task->getDescription(),
          'due'         => $task->getDue()->format('Y-m-d H:i:s'),
          'complete'    => $task->getComplete() ? 1 : 0,
        ];

        return array_merge($task , $additional);
    }
}
