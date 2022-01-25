<?php

namespace App\Contracts\Dao\Todo;

/**
 * Interface for todo DAO
 */
interface TodoDaoInterface
{
    public function saveTodo($name, $instruction);  // save $name and $instruction
    public function getTodo();  // get todos data
    public function getTodoById($id);  // get todos data by $id
    public function updateToDo($id, $name, $instruction);  // update todos data by $id
    public function deleteTodo($id);  // delete todos by $id
}
