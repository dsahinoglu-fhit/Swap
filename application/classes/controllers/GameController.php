<?php

namespace controllers;



use models\GameModel;
use views\GameView;

class GameController
{
    private $gameModel;
    private $gameView;
    public function __construct()
    {
        $this->gameModel = new GameModel();
        $this->gameView = new GameView($this->gameModel);
    }
public function swapFields() {

}

public function newGame(): void
{
$gameModel = new GameModel();
$gameModel->initializeWorld();
$gameView = new GameView();
$template = '';
$model = $gameModel;
$gameView->render($template, $model);
}

public function loadGame() {

}

}