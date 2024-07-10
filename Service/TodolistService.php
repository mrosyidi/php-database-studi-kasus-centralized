<?php

  namespace Service
  {
    use Entity\Todolist;
    use Repository\TodolistRepository;

    interface TodolistService
    {
      public function showTodolist(): void;
      public function addTodolist(string $todo): void;
      public function removeTodolist(int $number): void;
    }

    class TodolistServiceImpl implements TodolistService
    {
      private TodolistRepository $todolistRepository;

      public function __construct(TodolistRepository $todolistRepository)
      {
        $this->todolistRepository = $todolistRepository;
      }

      public function showTodolist(): void
      {
        echo "TODOLIST" . PHP_EOL;

        $todolist = $this->todolistRepository->findAll();
        foreach($todolist as $todo)
        {
          echo $todo->getId() . ". " . $todo->getTodo() . PHP_EOL;
        }
      }

      public function addTodolist(string $todo): void
      {
        $todolist = new Todolist();
        $todolist->setTodo($todo);
        $this->todolistRepository->save($todolist);
        echo "SUKSES MENAMBAH TODOLIST" . PHP_EOL;
      }

      public function removeTodolist(int $number): void
      {
        if($this->todolistRepository->remove($number))
        {
          echo "SUKSES MENGHAPUS TODOLIST" . PHP_EOL;
        }else
        {
          echo "GAGAL MENGHAPUS TODOLIST" . PHP_EOL;
        }
      }
    }
  }
