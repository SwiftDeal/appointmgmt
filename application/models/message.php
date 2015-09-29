<?php

/**
 * Description of message
 *
 * @author Faizan Ayubi
 */
class Message extends Shared\Model {
    
    /**
     * @column
     * @readwrite
     * @type integer
     * @index
     */
    protected $_user_id;
    
    /**
     * @column
     * @readwrite
     * @type text
     */
    protected $_content;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 50
     */
    protected $_type;
}
