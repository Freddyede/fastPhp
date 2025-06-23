<?php

namespace Core\Traits\Kernel;

trait KernelTrait
{

    /**
     * @param array $array
     * @param $number
     * @return array
     * @version 0.0.1
     */
    final public static function unsetWithArrayKeys(array $array, $number): array
    {
        $i = 0;
        while ($i <= $number) {
            unset($array[$i]);
            $i++;
        }
        return $array;
    }

    /**
     * @param array $oldArray
     * @param array $newArray
     * @return array
     * @version 0.0.1
     */
    final public static function applyingNamespaceControllerName(array $oldArray, array &$newArray): array
    {
        foreach ($oldArray as $value) {
            $newArray[] = 'App\\Controller\\' . $value;
        }
        return $newArray;
    }

    /**
     * @param $array
     * @return array
     * @version 0.0.1
     */
    final public static function replaceKey($array): array
    {
        $array = self::unsetWithArrayKeys($array, 1);
        $array = str_replace('.php', '', $array);
        $new_array = array();
        self::applyingNamespaceControllerName($array, $new_array);
        return $new_array;
    }
}