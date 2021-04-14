<?php

namespace App\Traits;

use Illuminate\Support\Arr;

trait LogAttributes
{
    /**
     * The attributes that can be logged
     *
     * @return array
     */
    protected function attributesToLog()
    {
        return [];
    }

    protected function attributesToDescription(): string
    {
        $description = '';

        $attributes = [];

        if (empty($this->attributesToLog())) {
            $attributes = $this->attributesToArray();
        } else {
            $attributes = Arr::only($this->attributesToArray(), $this->attributesToLog());
        }

        foreach ($attributes as $key => $value) {
            $description .= "{$key}:{$this->sanitizeAttributeValue($value)}, ";
        }

        // Trim whitespaces
        $description = trim($description);

        // Remove last , from foreach loop
        $description = substr_replace($description, '', -1);

        return $description;
    }

    private function sanitizeAttributeValue($value)
    {
        if (is_bool($value)) {
            return $value ? 'si' : 'no';
        }

        if (is_object($value)) {
            return json_encode($value);
        }

        return $value;
    }
}
