<?php

namespace Laravel\Pulse\Entries;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

abstract class Update
{
    /**
     * The update's table.
     */
    abstract public function table(): string;

    /**
     * Perform the update.
     */
    abstract public function perform(): void;

    /**
     * Determine if the update is the given type.
     */
    public function is(Type $type): bool
    {
        return $this->type() === $type;
    }

    /**
     * The type of update.
     */
    public function type(): Type
    {
        return Type::from($this->table());
    }

    /**
     * The table query.
     */
    protected function query(): Builder
    {
        return DB::table($this->table());
    }
}