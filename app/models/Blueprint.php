<?php

class Blueprint extends Eloquent
{
    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'blueprints';

    /**
     * Primary key of users table
     * @var string
     */
    protected $primaryKey = 'blueprint_id';

    /**
     * Rules for project
     * @var array
     */
    public static $updateRules = array(
        'title' => 'required|max:200',
        'status' => 'numeric',
        'importance' => 'numeric',
        'description' => '',
    );

    /**
     * Rules for project
     * @var array
     */
    public static $rules = array(
        'title' => 'required|max:200',
        'status' => 'numeric',
        'importance' => 'numeric',
        'description' => '',
    );

    /**
     * Get rules for new or update
     * @param $update string|null
     * @param $id string|null
     * @return array
     */
    public static function getRules($update, $id)
    {
        if (is_null($update))
        {
            return static::$rules;
        }
        return static::$updateRules;
    }
}