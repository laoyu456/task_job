<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------


namespace app\common\server;


class UrlServer
{
    /**
     * User: 意象信息科技 lr
     * Desc: 获取文件全路径
     * @param string $uri
     * @param string $type
     * @return string
     */
    public static function getFileUrl($uri = '', $type = '')
    {
        if (empty($uri)) {
            return '';
        }
        if (strstr($uri, 'http://') || strstr($uri, 'https://')) {
            return $uri;
        }

        if ($uri && $uri !== '/' && substr($uri, 0, 1) !== '/') {
            $uri = '/' . $uri;
        }

        // 获取存储引擎信息
        $engine = ConfigServer::get('storage', 'default', 'local');

        if ($engine === 'local') {

            //图片分享处理
            if ($type && $type == 'share') {
                return ROOT_PATH . $uri;
            }

            if (isset($uri[0])) {
                $uri[0] != '/' && $uri = '/' . $uri;
            }
            
            $protocol = is_https() ? 'https://' : 'http://';
            $file_url = config('project.file_domain');
            return $protocol . $file_url . $uri;

        } else {

            $config = ConfigServer::get('storage_engine', $engine);
            $domain = isset($config['domain']) ? $config['domain'] : 'http://';
            return $domain . $uri;
        }
    }

}