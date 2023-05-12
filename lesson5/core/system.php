<?php

  function checkControllerName(string $name) : bool{
    return preg_match('/^[a-z0-9-]+$/', $name);
  }