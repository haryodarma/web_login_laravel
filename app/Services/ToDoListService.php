<?php

namespace App\Services;

interface ToDoListService
{
    public function addToDoList(string $id, string $todo): void;
    public function getToDoList(): array;
    public function deleteToDoList($todoId): void;
}