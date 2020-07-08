<?php

declare(strict_types = 1);

namespace LivingWorld\World;

/**
 * Class Matrix
 * @package LivingWorld\World
 */
class Matrix
{

    /**
     * @var int
     */
    protected int $rows;
    /**
     * @var int
     */
    protected int $columns;
    /**
     * @var bool[][]
     */
    protected array $matrix;

    /**
     * Matrix constructor.
     * @param int $rows
     * @param int $columns
     */
    public function __construct(int $rows, int $columns)
    {
        $matrix = [];
        for ($i = 1; $i < $rows; $i++) {
            for ($j = 1; $j < $columns; $j++) {
                $matrix[$i][$j] = false;
            }
        }
        $this->matrix = $matrix;
    }

    /**
     * @return int
     */
    public function getRows(): int
    {
        return $this->rows;
    }

    /**
     * @param int $rows
     */
    public function setRows(int $rows): void
    {
        $this->rows = $rows;
    }

    /**
     * @return int
     */
    public function getColumns(): int
    {
        return $this->columns;
    }

    /**
     * @param int $columns
     */
    public function setColumns(int $columns): void
    {
        $this->columns = $columns;
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        $string = '';
        foreach ($this->matrix as $cols) {
            foreach ($cols as $col) {
                if ($col === true) {
                    $string .= 'X';
                } else{
                    $string .= '0';
                }

            }
            $string .= PHP_EOL;
        }
        return $string;
    }

    /**
     * @param int $i
     * @param int $j
     */
    public function addOrganism(int $i, int $j): void
    {
        $this->matrix[$i][$j] = true;
    }

    /**
     * @param int $i
     * @param int $j
     */
    public function removeOrganism(int $i, int $j): void
    {
        $this->matrix[$i][$j] = false;
    }

    /**
     * @param int $i
     * @param int $j
     * @return bool
     */
    public function hasOrganism(int $i, int $j): bool
    {
        return isset($this->matrix[$i][$j]);
    }

}