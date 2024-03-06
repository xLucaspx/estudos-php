<?php

use Senac\Crud\Controller\AlunoController;

require_once 'autoload.php';

// Check if it's a DELETE request
if (!($_SERVER['REQUEST_METHOD'] === 'DELETE')) exit();

// Extract resource ID from the URL path
$url_parts = parse_url($_SERVER['REQUEST_URI']);
$path_segments = explode('/', $url_parts['path']);
$id = end($path_segments);

// Validate and sanitize the resource ID
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) exit();

$controller = new AlunoController();
$controller->deleta($id);
