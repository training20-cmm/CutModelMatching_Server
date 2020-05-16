<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Schema;

class QueryAdapter
{

    public static function execute(string $class, $options)
    {
        $eloquent = new $class;
        $table = $eloquent->getTable();
        if (array_key_exists("search", $options)) {
            $queries = explode(",", $options["search"]);
            foreach ($queries as $query) {
                $components = preg_split("/(<=|>=|<|>|=)/u", $query, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
                $lhs = $components[0];
                $operator = $components[1];
                $rhs = $components[2];
                info($components);
                $eloquent = $eloquent->where($lhs, $operator, $rhs);
            }
        }
        if (array_key_exists("fields", $options)) {
            $fields = preg_grep("/[^,]/u", preg_split("/([^,]+\\(.+\\)|,)/u", $options["fields"], -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE));
            $columns = [];
            $relations = [];
            foreach ($fields as $field) {
                if (Schema::hasColumn($table, $field)) {
                    $columns[] = $field;
                } else if (preg_match("/.+\\(.+\\)/u", $field)) {
                    $components = preg_split("/\\(|\\)/u", $field);
                    $relations[] = $components[0] . ":" . $components[1];
                } else {
                    $relations[] = $field;
                }
            }
            $eloquent = $eloquent->with($relations);
            if (!empty($columns)) {
                $eloquent = $eloquent->get($columns);
            }
        }
        if ($eloquent instanceof Builder) {
            return $eloquent->get()->all();
        } else {
            return $eloquent->all();
        }
    }
}
