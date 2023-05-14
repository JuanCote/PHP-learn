<?php

const BASE_URL = '/php_basics/lesson6/';

const DB_HOST = 'localhost';
const DB_NAME = 'blog';
const DB_USER= 'root';
const DB_PASS = '';

include_once('core/arr.php');
include_once('core/db.php');
include_once('core/system.php');

include_once('model/articles.php');
include_once('model/categories.php');