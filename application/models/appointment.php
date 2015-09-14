<?php

/**
 * Description of appointments
 *
 * @author Faizan Ayubi
 */
class Appointment extends Shared\Model {
    
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
     * @length 255
     */
    protected $_title;

    /**
     * @column
     * @readwrite
     * @type datetime
     */
    protected $_start;

    /**
     * @column
     * @readwrite
     * @type datetime
     */
    protected $_end;

    /**
     * @column
     * @readwrite
     * @type boolean
     * @index
     */
    protected $_allDay;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 255
     */
    protected $_location;


}
