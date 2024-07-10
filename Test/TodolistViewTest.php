<?php

  require_once __DIR__ . "/../Config/Database.php";
  require_once __DIR__ . "/../Entity/Todolist.php";
  require_once __DIR__ . "/../Repository/TodolistRepository.php";
  require_once __DIR__ . "/../Service/TodolistService.php";
  require_once __DIR__ . "/../View/TodolistView.php";
  require_once __DIR__ . "/../Helper/InputHelper.php";

  use Config\Database;
  use Repository\TodolistRepositoryImpl;
  use Service\TodolistServiceImpl;
  use View\TodolistView;
  use Helper\InputHelper;

  function testViewShowTodolist(): void
  {
    $connection = Database::getConnection();
    $todolistRepository = new TodolistRepositoryImpl($connection);
    $todolistService = new TodolistServiceImpl($todolistRepository);
    $todolistView = new TodolistView($todolistService);
    $todolistView->showTodolist();
  }

  function testViewAddTodolist(): void
  {
    $connection = Database::getConnection();
    $todolistRepository = new TodolistRepositoryImpl($connection);
    $todolistService = new TodolistServiceImpl($todolistRepository);
    $todolistView = new TodolistView($todolistService);
    $todolistView->addTodolist();
  }

  testViewAddTodolist();
