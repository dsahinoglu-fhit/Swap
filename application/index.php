<?php
require_once 'autoload.php';

use controllers\GameController;
use views\GameView;


$gameController = new GameController();

$gameController->newGame();

// Create an instance of the GameView
$view = new GameView();

// Render the view
$html = $view->render();

// Output the HTML code
echo $html;

