<?php

$FILE = strtok($_SERVER['DOCUMENT_ROOT'] . $_SERVER['REQUEST_URI'], '?');
$PATH = substr($FILE,0,strrpos($FILE,'/')+1);
