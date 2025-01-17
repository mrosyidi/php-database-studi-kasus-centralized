<?php

  require_once __DIR__ . "/../Config/Database.php";
  require_once __DIR__ . "/../Entity/Todolist.php";
  require_once __DIR__ . "/../Repository/TodolistRepository.php";
  require_once __DIR__ . "/../Service/TodolistService.php";

  use Config\Database;
  use Entity\Todolist;
  use Repository\TodolistRepositoryImpl;
  use Service\TodolistServiceImpl;

  function testShowTodolist(): void
  {
    $connection = Database::getConnection();
    $todolistRepository = new TodolistRepositoryImpl($connection);
    $todolistService = new TodolistServiceImpl($todolistRepository);
    $todolistService->showTodolist();
  }

  function testAddTodolist(): void
  {
    $connection = Database::getConnection();
    $todolistRepository = new TodolistRepositoryImpl($connection);
    $todolistService = new TodolistServiceImpl($todolistRepository);
    $todolistService->addTodolist("Belajar PHP Unit Test");
  }

  function testRemoveTodolistFailed(): void
  {
    $connection = Database::getConnection();
    $todolistRepository = new TodolistRepositoryImpl($connection);
    $todolistService = new TodolistServiceImpl($todolistRepository);
    $todolistService->removeTodolist(10);
    $todolistService->showTodolist();
  }

  function testRemoveTodolist(): void
  {
    $connection = Database::getConnection();
    $todolistRepository = new TodolistRepositoryImpl($connection);
    $todolistService = new TodolistServiceImpl($todolistRepository);
    $todolistService->removeTodolist(2);
    $todolistService->showTodolist();
  }

  testRemoveTodolist();
