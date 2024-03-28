<?php
namespace views;
use AllowDynamicProperties;
use models\GameModel;
use controllers\GameController;
#[AllowDynamicProperties] class GameView {
    private GameModel $gameModel;
    public function __construct(GameController $gameController = null, GameModel $gameModel = null) {
        $this->gameController = $gameController;
        $this->gameModel = $gameModel;
    }

    public function render():
    string {

        $grid = $this->gameModel->getGrid();
        $coordinates = $this->gameModel->getCoordinates();

        $this->gameController->checkMatchingFields($this->gameModel);


        $html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Game Board</title>
    <link href="../../frontend/bootstrap5/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../frontend/bootstrap5/icons/bootstrap-icons.min.css" rel="stylesheet">
    <script src="../../frontend/bootstrap5/js/popper.min.js"></script>
    <script src="../../frontend/bootstrap5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../frontend/style.css">
</head>
<body>
    <div class="container mt-5">
        <form class="mb-4">
            <div class="mb-3 row">
                <label for="x" class="col-sm-2 col-form-label">X-Koordinate1:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control form-control-sm" name="x1" id="x1" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="y" class="col-sm-2 col-form-label">Y-Koordinaten1:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control form-control-sm" name="y1" id="y1" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="x" class="col-sm-2 col-form-label">X-Koordinate2:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control form-control-sm" name="x2" id="x2" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="y" class="col-sm-2 col-form-label">Y-Koordinaten2:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control form-control-sm" name="y2" id="y2" required>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Überprüfen</button>
            </div>
        </form>
        <div class="board">
            <div class="row">';
        foreach ($grid as $rowIndex => $row) {
            $html.= '<div class="row">';
            foreach ($row as $colIndex => $cell) {
                $koordinaten = $coordinates[$rowIndex * GameModel::MAX + $colIndex];
                $html.= '<div class="kästchen ' . $cell . '" data-x="' . $koordinaten['y'] . '" data-y="' . $koordinaten['x'] . '"></div>';
            }
            $html.= '</div>';
        }
        $html.= '
        </div>
    </div>
</body>
</html>';

        return $html;
    }


}
