<?php
/**
 * Created by PhpStorm.
 * User: jan
 * Date: 3/4/22
 * Time: 6:07 PM
 */

namespace Shared\Schema\Models\Services\Session;

use Shared\Models\MetaData;
/**
 * Interface _ModelSession
 * @package Shared\Schema\Models\Services\Session
 *
 * @property $id
 * @property $company_id
 * @property $actor_id
 * @property $token
 * @property $status
 * @property $created_by
 * @property $updated_by
 * @property $deleted_by
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property MetaData[] $metas
 */
interface _ModelSession{

    /**
     * whereMeta scope for easier join
     * -------------------------
     */
    public function scopeWhereMeta($query, $key, $value, $alias = null);

    /**
     * Meta scope for easier join
     * -------------------------
     */
    public function scopeMeta($query, $alias = null);

    /**
     * Set Meta Data functions
     * -------------------------.
     */
    public function setMeta($key, $value = null);

    /**
     * Unset Meta Data functions
     * -------------------------.
     */
    public function unsetMeta($key);


    public function getMeta($key = null, $raw = false);

    /**
     * Relationship for meta tables
     */
    public function metas();

    /**
     * Query Meta Table functions
     * -------------------------.
     */
    public function whereMeta($key, $value);

    /**
     * Return the foreign key name for the meta table.
     *
     * @return string
     */
    public function getMetaTypeKey();

    /**
     * Return the foreign key name for the meta table.
     *
     * @return string
     */
    public function getMetaTypeTarget();

    /**
     * Return the foreign key name for the meta table.
     *
     * @return string
     */
    public function getMetaKeyName();

    /**
     * Return the table name.
     *
     * @return string
     */
    public function getMetaTable();

    /**
     * Convert the model instance to an array.
     *
     * @return array
     */
    public function toArray();

    /**
     * Get an attribute from the model.
     *
     * @param string $key
     *
     * @return mixed
     */
    public function getAttribute($key);

    /**
     * Set attributes for the model
     *
     * @param array $attributes
     *
     * @return void
     */
    public function setAttributes(array $attributes);

    /**
     * Determine if model table has a given column.
     *
     * @param  [string]  $column
     *
     * @return boolean
     */
    public function hasColumn($column);


    public function __unset($key);


    public function __get($attr);


    public function __set($key, $value);


    public function __isset($key);
}
