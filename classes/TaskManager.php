<?php

namespace crud;

use crud\Models\Task;
use crud\Storage\Contract\TaskStorageInterface;

class TaskManager
{
    protected $storage;

    //typehinting with Interface.
    //We dont want to typehinting with actual Implementation!!
    public function __construct(TaskStorageInterface $storage)
    {
        $this->storage = $storage;
    }

    public function addTask(Task $task)
    {
        return $this->storage->store($task);
    }

    public function updateTask(Task $task)
    {
        return $this->storage->update($task);
    }

    public function deleteTask($id)
    {
        return $this->storage->delete($id);
    }

    public function getTask($id)
    {
        return $this->storage->get($id);
    }

    public function getTasks()
    {
        return $this->storage->all();
    }
}
