<?php

  namespace View
  {
    use Service\TodolistService;
    use Helper\InputHelper;

    class TodolistView
    {
      private TodolistService $todolistService;

      public function __construct(TodolistService $todolistService)
      {
        $this->todolistService = $todolistService;
      }

      public function showTodolist(): void
      {
        while(true)
        {
          $this->todolistService->showTodolist();
          echo "MENU" . PHP_EOL;
          echo "1. Tambah Todo" . PHP_EOL;
          echo "2. Hapus Todo" . PHP_EOL;
          echo "x. Keluar" . PHP_EOL;

          $pilihan = InputHelper::input("pilih");

          if($pilihan == "1")
          {
            $this->addTodolist();
          }else if($pilihan == "2")
          {
            $this->removeTodolist();
          }else if($pilihan == "x")
          {
            break;
          }else
          {
            echo "Pilihan tidak dimengerti" . PHP_EOL;
          }
        }

        echo "Sampai Jumpa Lagi" . PHP_EOL;
      }

      public function addTodolist(): void
      {
        echo "MENAMBAH TODOLIST" . PHP_EOL;

        $todo = InputHelper::input("Todo (x untuk batal)");

        if($todo == "x")
        {
          echo "Batal menambah todo" . PHP_EOL;
        }else
        {
          $this->todolistService->addTodolist($todo);
        }
      }

      public function removeTodolist(): void
      {
        echo "MENGHAPUS TODOLIST" . PHP_EOL;

        $number = InputHelper::input("Nomor (x untuk batalkan)");

        if($number == "x")
        {
          echo "Batal menghapus todo" . PHP_EOL;
        }else
        {
          $this->todolistService->removeTodolist($number);
        }
      }
    }
  }
