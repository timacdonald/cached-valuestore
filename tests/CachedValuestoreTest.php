<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use TiMacDonald\CachedValuestore\CachedValuestore;

class CachedValuestoreTest extends TestCase
{
    protected $filename = './tests/test.json';

    function test_values_are_cached_locally_for_get_method()
    {
        $valuestore = CachedValuestore::make($this->filename, ['test' => 'value']);
        unlink($this->filename);

        $this->assertEquals($valuestore->get('test'), 'value');
    }

    function test_values_are_cached_locally_for_has_method()
    {
        $valuestore = CachedValuestore::make($this->filename, ['test' => 'value']);
        unlink($this->filename);

        $this->assertTrue($valuestore->has('test'));
    }

    function test_values_are_cached_locally_for_all_method()
    {
        $valuestore = CachedValuestore::make($this->filename, ['test' => 'value']);
        unlink($this->filename);

        $this->assertEquals($valuestore->all(), ['test' => 'value']);
    }

    function test_values_are_cached_locally_for_all_starting_with_method()
    {
        $valuestore = CachedValuestore::make($this->filename, ['test' => 'value']);
        unlink($this->filename);

        $this->assertEquals($valuestore->allStartingWith('te'), ['test' => 'value']);
    }

    function test_cache_values_are_updated_after_put()
    {
        $valuestore = CachedValuestore::make($this->filename, ['test' => 'original']);
        unlink($this->filename);
        $valuestore->put('test', 'updated');
        unlink($this->filename);

        $this->assertEquals($valuestore->get('test'), 'updated');
    }

    function test_cache_values_are_updated_after_prepend()
    {
        $valuestore = CachedValuestore::make($this->filename, ['test' => 'original']);
        unlink($this->filename);
        $valuestore->prepend('test', 'updated');
        unlink($this->filename);

        $this->assertEquals($valuestore->get('test'), ['updated', 'original']);
    }

    function test_cache_values_are_updated_after_push()
    {
        $valuestore = CachedValuestore::make($this->filename, ['test' => 'original']);
        unlink($this->filename);
        $valuestore->push('test', 'updated');
        unlink($this->filename);

        $this->assertEquals($valuestore->get('test'), ['original', 'updated']);
    }

    function test_cache_values_are_updated_after_forget()
    {
        $valuestore = CachedValuestore::make($this->filename, ['test' => 'value']);
        unlink($this->filename);
        $valuestore->forget('test');

        $this->assertNull($valuestore->get('test'));
    }

    function test_cache_values_are_updated_after_flush()
    {
        $valuestore = CachedValuestore::make($this->filename, ['test' => 'value']);
        unlink($this->filename);
        $valuestore->flush();

        $this->assertNull($valuestore->get('test'));
    }

    function test_cache_values_are_updated_after_flush_starting_with()
    {
        $valuestore = CachedValuestore::make($this->filename, ['test' => 'value']);
        unlink($this->filename);
        $valuestore->flushStartingWith('te');

        $this->assertNull($valuestore->get('test'));
    }

    function test_cache_values_are_updated_after_pull()
    {
        $valuestore = CachedValuestore::make($this->filename, ['test' => 'value']);
        unlink($this->filename);
        $value = $valuestore->pull('test');

        $this->assertEquals($value, 'value');
        $this->assertNull($valuestore->get('test'));
    }

    function test_cache_values_are_updated_after_increment()
    {
        $valuestore = CachedValuestore::make($this->filename, ['count' => 123]);
        unlink($this->filename);
        $valuestore->increment('count');
        unlink($this->filename);

        $this->assertEquals($valuestore->get('count'), 124);
    }

    function test_cache_values_are_updated_after_decrement()
    {
        $valuestore = CachedValuestore::make($this->filename, ['count' => 123]);
        unlink($this->filename);
        $valuestore->decrement('count');
        unlink($this->filename);

        $this->assertEquals($valuestore->get('count'), 122);
    }
}
