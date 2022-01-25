<?php

namespace App\Dao\Todo;

use App\Contracts\Dao\Todo\TodoDaoInterface;
use Illuminate\Support\Facades\DB;

/**
 * DAO class for todo.
 */
class TodoDao implements TodoDaoInterface
{
    /**
     * Class Constructor
     * @return
     */
    public function __construct()
    {
    }

    /**
     * To save Todo
     * @param string $name, $instruction
     */
    public function saveTodo($name, $instruction)
    {
        DB::transaction(function () use ($name, $instruction) {
            DB::insert(
                'insert into todos (name, instruction) values (?, ?)',
                [$name, $instruction]
            );
        });
    }

    /**
     * To show Todos data
     * @return array todos data
     */
    public function getTodo() 
    {
        return DB::table('todos')->get();
    }

    /**
     * To Update Todo
     * @param string $id (todos'id)
     * @return array todos data
     */
    public function getTodoById($id)
    {
        return DB::table('todos')->where('id', $id)->get();
    }

    /**
     * To update Todo
     * @param string $name, $instruction , $id
     */
    public function updateToDo($id, $name, $instruction)
    {
        DB::transaction(function () use ($name, $instruction, $id) {
            DB::update('update todos set name = ?, instruction = ? where id = ?',[$name, $instruction, $id]);
        });
    }

    /**
     * To delete ToDo
     * @param string $id todos id
     */
    public function deleteTodo($id)
    {
        DB::transaction(function () use ($id) {
            DB::delete("delete from todos where id = ?", [$id]);
        });
    }
}
