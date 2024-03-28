<?php
require_once 'autoload.php';

use controllers\GameController;
use models\GameModel;
use views\GameView;


// 1. Erstelle Controller
$gameController = new GameController();

// 2. Erstelle Model
$gameModel = new GameModel();

// 3. Erstelle View und übergebe Controller und Model
$gameView = new GameView($gameController, $gameModel);

// Starte neues Spiel
$gameController->newGame();

// Render View
$html = $gameView->render();

echo $html;

