<?php
//json中加载文件的路径参考的是json文件的位置;
    if (!function_exists ('hd_config')) {
        function hd_config ( $var )
        {

//            \Cache::flush();
//            dd ($var);
            static $cache = [];
            $info = explode ('.', $var);
            if (!$cache) {
                $cache = \Cache ::get ('config_cache', function () {
                    return \App\Models\Config ::pluck ('content', 'name');
                });
            }
//			dd ($cache);
            return $cache[ $info[ 0 ] ][ $info[ 1 ] ] ?? '';
        }
    }
