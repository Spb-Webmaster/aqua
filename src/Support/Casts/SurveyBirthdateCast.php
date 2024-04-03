<?php

namespace Support\Casts;

use Illuminate\Database\Eloquent\Model;
use Support\ValueObjects\SurveyBirthdate;

class SurveyBirthdateCast
{

    /**
     * Cast the given value.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return SurveyBirthdate::make($value, $model, $attributes, $key);
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return $value;
    }
}
