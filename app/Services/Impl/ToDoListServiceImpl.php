<?php

namespace App\Services\Impl;
use App\Services\ToDoListService;
use Illuminate\Support\Facades\Session;

class ToDoListServiceImpl implements ToDoListService
{

    public function addToDoList(string $id, string $todo): void
    {
        if (!Session::exists("todolist")) {
            Session::put("todolist", []);
        }

        Session::push("todolist", ["id" => $id, "todo" => $todo]);


    }

    public function getToDoList(): array
    {
        if (!Session::exists("todolist")) {
            Session::put("todolist", []);
        }
        return Session::get("todolist");
    }

    public function deleteToDoList($todoId): void
    {
        if (!Session::exists("todolist")) {
            Session::put("todolist", []);
        }

        $toDoList = Session::get("todolist");
        foreach ($toDoList as $key => $value) {
            if ($value["id"] == $todoId) {
                unset($toDoList[$key]);
                break;
            }



        }
        Session::put("todolist", $toDoList);
    }
}