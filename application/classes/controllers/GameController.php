<?php

namespace controllers;



use models\GameModel;
use views\GameView;

class GameController
{


public function swapFields() {

}

    public function newGame(): void
    {
        $gameModel = new GameModel();
        $gameModel->initializeWorld();

        $this->renderGame($gameModel);
    }

    public function loadGame()  {

    }
    public function checkMatchingFields(GameModel $gameModel): bool
    {

        // Hole das Spielfeld
        $grid = $gameModel->getGrid();



        // Überprüfe horizontale Matches
        for ($row = 0; $row < count($grid); $row++) {
            $match = 1;
            $previousColor = null;
            for ($col = 0; $col < count($grid[$row]); $col++) {
                if ($grid[$row][$col] == $previousColor) {
                    $match++;
                } else {
                    $match = 1;
                    $previousColor = $grid[$row][$col];
                }
                if ($match >= 3) {
                    // mindestens 3 Matches gefunden
                    return true;
                }
            }
        }

        // Überprüfe vertikale Matches
        for ($col = 0; $col < count($grid[0]); $col++) {
            $match = 1;
            $previousColor = null;
            for ($row = 0; $row < count($grid); $row++) {
                if ($grid[$row][$col] == $previousColor) {
                    $match++;
                } else {
                    $match = 1;
                    $previousColor = $grid[$row][$col];
                }
                if ($match >= 3) {
                    // mindestens 3 Matches gefunden
                    return true;
                }
            }
        }

        // Keine Matches gefunden
        return false;
    }

    public function renderGame(GameModel $gameModel): void
    {
        $gameView = new GameView($this, $gameModel);

        if ($this->checkMatchingFields($gameModel)) {
            echo "erfolgreich";
        } else {
            echo "kein match";
        }

        echo  $gameView->render();

    }


}