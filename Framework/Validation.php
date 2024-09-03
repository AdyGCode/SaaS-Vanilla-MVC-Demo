<?php
/**
 * FILE TITLE GOES HERE
 *
 * DESCRIPTION OF THE PURPOSE AND USE OF THE CODE
 * MAY BE MORE THAN ONE LINE LONG
 * KEEP LINE LENGTH TO NO MORE THAN 96 CHARACTERS
 *
 * Filename:        Validation.php
 * Location:
 * Project:         SaaS-Vanilla-MVC
 * Date Created:    20/08/2024
 *
 * Author:          Adrian Gould <Adrian.Gould@nmtafe.wa.edu.au>
 *
 */

namespace Framework;

class Validation
{
    /**
     * Validate a string
     *
     * @param $value
     * @param int $min
     * @param float|int $max
     * @return bool
     */
    public static function string($value, int $min = 1, float|int $max = INF): bool
    {
        if (is_string($value)) {
            $value = trim($value);
            $length = strlen($value);
            return $length >= $min && $length <= floor($max);
        }

        return false;
    }

    /**
     * Validate email address
     *
     * @param string $value
     * @return mixed
     */
    public static function email(string $value): mixed
    {
        $value = trim($value);

        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    /**
     * Match a value against another
     * @param $value1
     * @param $value2
     * @return bool
     */
    public static function match($value1, $value2): bool
    {
        $value1 = trim($value1);
        $value = trim($value2);

        return $value1 === $value2;
    }

}