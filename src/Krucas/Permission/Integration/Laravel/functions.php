<?php

if (!function_exists('can')) {
    /**
     * Check permission status.
     *
     * @param string $permission Permission to check.
     * @param mixed $params Permission check params.
     * @return bool
     */
    function can($permission, $params = null)
    {
        return \Permission::can($permission, $params);
    }
}
