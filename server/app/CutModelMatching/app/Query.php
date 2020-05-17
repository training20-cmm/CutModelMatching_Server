<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class Query
{

    public static function execute(string $class, $options)
    {
        $eloquent = new $class;
        if (array_key_exists("search", $options)) {
            $queries = explode(",", $options["search"]);
            foreach ($queries as $query) {
                $components = preg_split("/(<=|>=|<|>|=)/u", $query, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
                $lhs = $components[0];
                $operator = $components[1];
                $rhs = $components[2];
                $eloquent = $eloquent->where($lhs, $operator, $rhs);
            }
        }
        if (array_key_exists("sort", $options)) {
            $sort = $options["sort"];
            $columns = explode(",", $sort);
            foreach ($columns as $column) {
                if (Str::startsWith($column, "-")) {
                    $eloquent = $eloquent->orderBy(substr($column, 1), "desc");
                } else {
                    $eloquent = $eloquent->orderBy($column);
                }
            }
        }
        if (array_key_exists("embed", $options)) {
            $fields = preg_grep("/[^,]/u", preg_split("/([^,]+\\(.+?\\)|,)/u", $options["embed"], -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE));
            $relations = [];
            foreach ($fields as $field) {
                if (preg_match("/.+\\(.+\\)/u", $field)) {
                    $components = preg_split("/\\(|\\)/u", $field);
                    $relations[] = $components[0] . ":" . $components[1];
                } else {
                    $relations[] = $field;
                }
            }
            $eloquent = $eloquent->with($relations);
        }
        if (array_key_exists("fields", $options)) {
            $fields = explode(",", $options["fields"]);
            $eloquent = $eloquent->get($fields);
        }
        if ($eloquent instanceof Builder) {
            return $eloquent->get()->all();
        } else {
            return $eloquent->all();
        }
    }
}
