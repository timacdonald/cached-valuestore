<?php

namespace TiMacDonald\CachedValuestore;

use Spatie\Valuestore\Valuestore;

class CachedValuestore extends Valuestore
{
    protected $cache;

    /**
     * Get all values from the store.
     *
     * @return array
     */
    public function all() : array
    {
        return $this->cache ?? $this->cache = parent::all();
    }

    /**
     * Set the valuestore contents.
     *
     * @param  array $values
     * @return $this
     */
    protected function setContent(array $values)
    {
        return parent::setContent($this->cache = $values);
    }

    /**
     * Clears the local cache.
     *
     * @return $this
     */
    public function clearCache()
    {
        $this->cache = null;

        return $this;
    }
}
