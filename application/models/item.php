<?php

/**
 * Description of project
 *
 * @author Faizan Ayubi
 */
class Item extends Shared\Model {
    
    /**
     * @column
     * @readwrite
     * @type text
     * @length 128
     */
    protected $_title;
    
    /**
     * @column
     * @readwrite
     * @type text
     */
    protected $_details;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 64
     */
    protected $_type;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 16
     * 
     * @validate required, alpha, min(1), max(16)
     * @label amount
     */
    protected $_price;
}
