<?php

namespace models;

class GameModel
{
    public const MAX = 12;
    private $grid;
    private const COLORS = ['r', 'bl', 'b', 'y', 'w']; // r = rot, bl = schwarz, b = blau, y = gelb, w = weiß

    public function initializeWorld(): void
    {
        for ($i = 0; $i < self::MAX; $i++) {
            for ($j = 0; $j < self::MAX; $j++) {
                $this->grid[$i][$j] = self::COLORS[rand(0, 4)];
            }

        }
    }

    public function getGrid(): array
    {
        return $this->grid;
    }

}