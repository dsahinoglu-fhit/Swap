<?php
namespace models;
class GameModel {
    public const MAX = 12;
    public const COLORS = ['r', 'bl', 'b', 'y', 'w']; // r = rot, bl = schwarz, b = blau, y = gelb, w = weiß
    private array $grid = [];
    public function initializeWorld():
    void {
        for ($i = 0;$i < self::MAX;$i++) {
            for ($j = 0;$j < self::MAX;$j++) {
                $random_color = self::COLORS[array_rand(self::COLORS) ];
                $this->grid[$i][$j] = $random_color;
            }
        }
    }
    public function getGrid():
    array {
        return $this->grid;
    }
    public function getCoordinates():
    array {
        $coordinates = [];
        for ($x = 0;$x < GameModel::MAX;$x++) {
            for ($y = 0;$y < GameModel::MAX;$y++) {
                $coordinates[] = ['x' => $x + 1, 'y' => $y + 1];
            }
        }
        return $coordinates;
    }
}