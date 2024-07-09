<?php

  namespace Repository
  {
    use Entity\Todolist;

    interface TodolistRepository
    {
      public function save(Todolist $todolist): void;
      public function remove(int $number): bool;
      public function findAll(): array;
    }

    class TodolistRepositoryImpl implements TodolistRepository
    {
      public array $todolist = array();
      private \PDO $connection;

      public function __construct(\PDO $connection)
      {
        $this->connection = $connection;
      }

      public function save(Todolist $todolist): void
      {

      }

      public function remove(int $number): bool
      {

      }

      public function findAll(): array
      {
        $sql = "SELECT id, todo FROM todolist";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $todolist = [];

        foreach($statement as $row)
        {
          $todo = new Todolist();
          $todo->setId($row['id']);
          $todo->setTodo($row['todo']);
          $todolist[] = $todo;
        }

        return $todolist;
      }
    }
  }
