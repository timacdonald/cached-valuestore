<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Spatie\Valuestore\Valuestore;
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

    function test_cache_across_multiple_instances()
    {
        $valuestore1 = CachedValuestore::make($this->filename, ['test' => 'value']);
        $valuestore2 = CachedValuestore::make($this->filename);
        unlink($this->filename);

        $this->assertEquals($valuestore1->get('test'), 'value');
        $this->assertEquals($valuestore2->get('test'), 'value');
    }

    function test_empty_cache_reads_values_from_file()
    {
        $cachedValuestore = CachedValuestore::make($this->filename, ['test' => 'original']);
        $valuestore = Valuestore::make($this->filename, ['test' => 'updated']);

        $this->assertEquals($cachedValuestore->get('test'), 'original');
        CachedValuestore::clearCache();
        $this->assertEquals($cachedValuestore->get('test'), 'updated');
    }

    protected function tearDown()
    {
        CachedValuestore::clearCache();
    }
}
