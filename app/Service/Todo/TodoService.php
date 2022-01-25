<?php

namespace App\Service\Todo;

use App\Contracts\Dao\Todo\TodoDaoInterface;
use App\Contracts\Services\Todo\TodoServiceInterface;

/**
 * Service class for todo.
 */
class TodoService implements TodoServiceInterface
{
    private $todoDao;

    /**
     * Class Constructor
     * @return
     */
    public function __construct(TodoDaoInterface $todoDaoInterface)
    {
        $this->todoDao = $todoDaoInterface;
    }

    /**
     * To save Todo
     * @param string $name, $instruction
     */
    public function saveTodo($name, $instruction)
    {
        $this->todoDao->saveTodo($name, $instruction);
    }

    /**
     * get todos data
     * @return array todos data
     */
    public function getTodo()
    {
        return $this->todoDao->getTodo();
    }

    /**
     * To Update Todo
     * @param string $id (todos'id)
     * @return array todos data
     */
    public function getTodoById($id)
    {
        return $this->todoDao->getTodoById($id);
    }

    /**
     * To update Todo
     * @param string $name, $instruction , $id
     */
    public function updateToDo($id, $name, $instruction)
    {
        return $this->todoDao->updateToDo($id, $name, $instruction);
    }

    /**
     * To delete ToDo
     * @param string $id todos id
     */
    public function deleteTodo($id)
    {
        return $this->todoDao->deleteTodo($id);
    }
}
