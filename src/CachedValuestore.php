<?php

namespace TiMacDonald\CachedValuestore;

use Spatie\Valuestore\Valuestore;

class CachedValuestore extends Valuestore
{
    protected static $cache;

    /**
     * Get all values from the store.
     *
     * @return array
     */
    public function all() : array
    {
        return static::$cache ?? static::$cache = parent::all();
    }

    /**
     * Set the valuestore contents.
     *
     * @param  array $values
     * @return $this
     */
    protected function setContent(array $values)
    {
        parent::setContent(static::$cache = $values);

        return $this;
    }

    /**
     * Clears the local cache.
     *
     * @return null
     */
    public static function clearCache()
    {
        static::$cache = null;
    }
}
