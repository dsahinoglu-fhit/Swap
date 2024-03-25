<?php

namespace views;

use models\GameModel;

class GameView
{
    private GameModel $gameModel;

    public function __construct()
    {
        $this->gameModel = new GameModel();
    }

    public function render(): string
    {
        $this->gameModel->initializeWorld();
        $grid = $this->gameModel->getGrid();

        $html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Game Board</title>
    <style>
        .cell {
            width: 25px;
            height: 25px;
            border: 1px solid black;
            float: left;
        }

        .r { background-color: red; }
        .bl { background-color: black; }
        .b { background-color: blue; }
        .y { background-color: yellow; }
        .w { background-color: white; }
    </style>
</head>
<body>
    <div class="board">';

        $grid = $this->gameModel->getGrid();

        foreach ($grid as $row) {
            $html .= '<div class="row">';
            foreach ($row as $color) {
                $html .= "<div class='cell $color'></div>";
            }
            $html .= '</div>';
        }

        $html .= '
</body>
</html>';

        return $html;
    }
}

