<?php
/*
* Namespace to specify allocation!
*/
namespace crud\Models;


/**
 * use DateTime Object
 */
use DateTime;

/**
 *Task classes represent task table in database!
 *In order to preform it in Object Oriented Way
 *We need to set up property belong to task object
 *Which is compactable to Task Classes!!!!!
 */
class Task
{
  /**
   * Setting up property equivalent to  Table Task in Database
   * Database Attribute
   * id, description, due, complete
   */
  protected $id;
  protected $description;
  protected $due;
  protected $complete;

  //Getters & Setter
  //
  /**
   * Getters
   */

  public function getId()
  {
      return $this->id;
  }

  public function getDescription()
  {
      return $this->description;
  }

  public function getDue()
  {
    if(!$this->due instanceof DateTime){
      return new DateTime($this->due);
    }

      return $this->due;
  }

  public function getComplete()
  {
      return $this->complete;
  }

  /**
   * Setters
   */

  public function setDescription($description)
  {
      $this->description = $description;
  }

  public function setDue(DateTime $due)
  {
    	$this->due = $due;
  }

  public function setComplete($complete = false)
  {
      $this->complete = $complete;
  }

}
