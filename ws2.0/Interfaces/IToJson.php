<?php

/**
 * Interface IToJson
 * 
 * Defines a contract for classes that can be converted to a JSON representation.
 */
interface IToJson
{
    /**
     * Converts the object into a JSON string or array.
     *
     * @return mixed
     */
    public function toJson();
}