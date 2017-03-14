<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 14/03/17
 * Time: 5:52 PM
 */
class PdfInfoBox
{

    public $left = 0;
    public $right = 0;
    public $top = 0;
    public $bottom = 0;
    public $sizeX = 0;
    public $sizeY = 0;
    public $imageAspectRatio = 0;

    function __construct($info)
    {
        $cropbox = preg_split('/\s+/', $info);

        if (count($cropbox) == 4) {

            $this->left = floatval($cropbox[0]);
            $this->top = floatval($cropbox[1]);
            $this->right = floatval($cropbox[2]);
            $this->bottom = floatval($cropbox[3]);

            $this->sizeX = $this->right - $this->left;
            $this->sizeY = $this->bottom - $this->top;
            $this->imageAspectRatio = $this->sizeY / $this->sizeX;
        }

    }

}