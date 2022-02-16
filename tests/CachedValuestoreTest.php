<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Spatie\Valuestore\Valuestore;
use TiMacDonald\CachedValuestore\CachedValuestore;

class CachedValuestoreTest extends TestCase
{
    protected $filename = './tests/test.json';

    public function test_values_are_cached_locally_for_get_method()
    {
        $valuestore = CachedValuestore::make($this->filename, ['test' => 'value']);
        unlink($this->filename);

        $this->assertSame($valuestore->get('test'), 'value');
    }

    public function test_values_are_cached_locally_for_has_method()
    {
        $valuestore = CachedValuestore::make($this->filename, ['test' => 'value']);
        unlink($this->filename);

        $this->assertTrue($valuestore->has('test'));
    }

    public function test_values_are_cached_locally_for_all_method()
    {
        $valuestore = CachedValuestore::make($this->filename, ['test' => 'value']);
        unlink($this->filename);

        $this->assertSame($valuestore->all(), ['test' => 'value']);
    }

    public function test_values_are_cached_locally_for_all_starting_with_method()
    {
        $valuestore = CachedValuestore::make($this->filename, ['test' => 'value']);
        unlink($this->filename);

        $this->assertSame($valuestore->allStartingWith('te'), ['test' => 'value']);
    }

    public function test_cache_values_are_updated_after_put()
    {
        $valuestore = CachedValuestore::make($this->filename, ['test' => 'original']);
        unlink($this->filename);
        $valuestore->put('test', 'updated');
        unlink($this->filename);

        $this->assertSame($valuestore->get('test'), 'updated');
    }

    public function test_cache_values_are_updated_after_prepend()
    {
        $valuestore = CachedValuestore::make($this->filename, ['test' => 'original']);
        unlink($this->filename);
        $valuestore->prepend('test', 'updated');
        unlink($this->filename);

        $this->assertSame($valuestore->get('test'), ['updated', 'original']);
    }

    public function test_cache_values_are_updated_after_push()
    {
        $valuestore = CachedValuestore::make($this->filename, ['test' => 'original']);
        unlink($this->filename);
        $valuestore->push('test', 'updated');
        unlink($this->filename);

        $this->assertSame($valuestore->get('test'), ['original', 'updated']);
    }

    public function test_cache_values_are_updated_after_forget()
    {
        $valuestore = CachedValuestore::make($this->filename, ['test' => 'value']);
        unlink($this->filename);
        $valuestore->forget('test');

        $this->assertNull($valuestore->get('test'));
    }

    public function test_cache_values_are_updated_after_flush()
    {
        $valuestore = CachedValuestore::make($this->filename, ['test' => 'value']);
        unlink($this->filename);
        $valuestore->flush();

        $this->assertNull($valuestore->get('test'));
    }

    public function test_cache_values_are_updated_after_flush_starting_with()
    {
        $valuestore = CachedValuestore::make($this->filename, ['test' => 'value']);
        unlink($this->filename);
        $valuestore->flushStartingWith('te');

        $this->assertNull($valuestore->get('test'));
    }

    public function test_cache_values_are_updated_after_pull()
    {
        $valuestore = CachedValuestore::make($this->filename, ['test' => 'value']);
        unlink($this->filename);
        $value = $valuestore->pull('test');

        $this->assertSame($value, 'value');
        $this->assertNull($valuestore->get('test'));
    }

    public function test_cache_values_are_updated_after_increment()
    {
        $valuestore = CachedValuestore::make($this->filename, ['count' => 123]);
        unlink($this->filename);
        $valuestore->increment('count');
        unlink($this->filename);

        $this->assertSame($valuestore->get('count'), 124);
    }

    public function test_cache_values_are_updated_after_decrement()
    {
        $valuestore = CachedValuestore::make($this->filename, ['count' => 123]);
        unlink($this->filename);
        $valuestore->decrement('count');
        unlink($this->filename);

        $this->assertSame($valuestore->get('count'), 122);
    }

    public function test_empty_cache_reads_values_from_file()
    {
        $valuestore = CachedValuestore::make($this->filename, ['test' => 'original']);
        file_put_contents($this->filename, json_encode(['test' => 'updated']));

        $this->assertSame($valuestore->get('test'), 'original');
        $valuestore->clearCache();
        $this->assertSame($valuestore->get('test'), 'updated');
    }
}
