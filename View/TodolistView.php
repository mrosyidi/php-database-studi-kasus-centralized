<?php

  namespace View
  {
    use Service\TodolistService;

    class TodolistView
    {
      private TodolistService $todolistService;

      public function __construct(TodolistService $todolistService)
      {
        $this->todolistService = $todolistService;
      }
    }
  }
