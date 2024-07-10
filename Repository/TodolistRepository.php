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
      private \PDO $connection;

      public function __construct(\PDO $connection)
      {
        $this->connection = $connection;
      }

      public function save(Todolist $todolist): void
      {
        $sql = "INSERT INTO todolist(todo) VALUES(?)";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$todolist->getTodo()]);
      }

      public function remove(int $number): bool
      {
        $sql = "SELECT id FROM todolist WHERE id=?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$number]);

        if($statement->fetch())
        {
          $sql = "DELETE FROM todolist WHERE id=?";
          $statement = $this->connection->prepare($sql);
          $statement->execute([$number]);
          return true;
        }else
        {
          return false;
        }
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
