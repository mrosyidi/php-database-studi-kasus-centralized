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
  }
