<?php

require_once __DIR__ . "/../Entity/Todolist.php";
require_once __DIR__ . "/../Service/TodolistService.php";
require_once __DIR__ . "/../Repository/TodolistRepository.php";

use Entity\Todolist;
use Repository\TodolistRepositoryImpl;
use Service\TodolistServiceImpl;

function testShowTodolist(): void
{
  $todolistRepository = new TodolistRepositoryImpl();
  $todolistRepository->todolist[1] = new Todolist("Belajar PHP");
  $todolistRepository->todolist[2] = new Todolist("Belajar PHP Database");
  $todolistRepository->todolist[3] = new Todolist("Belajar PHP WEB");

  $todolistService = new TodolistServiceImpl($todolistRepository);

  $todolistService->showTodolist();
}

function testAddTodolist(): void
{
  $todolistRepository = new TodolistRepositoryImpl();

  $todolistService = new TodolistServiceImpl($todolistRepository);
  $todolistService->addTodolist("Belajar PHP");
  $todolistService->addTodolist("Belajar PHP Database");
  $todolistService->addTodolist("Belajar PHP WEB");

  $todolistService->showTodolist();
}

function testRemoveTodolist(): void
{
  $todolistRepository = new TodolistRepositoryImpl();

  $todolistService = new TodolistServiceImpl(($todolistRepository));

  $todolistService->showTodolist();

  $todolistService->addTodolist("Belajar PHP");
  $todolistService->addTodolist("Belajar PHP Database");
  $todolistService->addTodolist("Belajar PHP WEB");

  $todolistService->showTodolist();

  echo PHP_EOL . PHP_EOL;

  $todolistService->removeTodolist(2);
  $todolistService->removeTodolist(1);
  $todolistService->removeTodolist(100);

  $todolistService->showTodolist();


}

// testShowTodolist();
// testAddTodolist();
testRemoveTodolist();