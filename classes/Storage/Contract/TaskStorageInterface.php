<?php

namespace crud\Storage\Contract;

use crud\Models\Task;

interface TaskStorageInterface
{
    public function get($id);
    public function all();
    public function store(Task $task);
    public function update(Task $task);
    public function delete($id);

}
