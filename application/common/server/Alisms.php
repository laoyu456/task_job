<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\common\server;
use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;

class Alisms
{
    private $app_key = '';
    private $secret_key = '';
    private $sign = '';
    private $mobile = '';
    private $template_code = '';
    private $template_param = '';

    public function __construct($config)
    {
        $this->sign = $config['sign'];
        $this->app_key = $config['app_key'];
        $this->secret_key = $config['secret_key'];
    }
    public function setTemplateCode($template_code){
        $this->template_code = $template_code;
        return $this;
    }

    public function setMobile($mobile){
        $this->mobile = $mobile;
        return $this;
    }

    public function setTemplateParam($template_param = ''){
        $this->template_param = json_encode($template_param);
        return $this;
    }

    public function sendSms(){
        try {
            AlibabaCloud::accessKeyClient($this->app_key, $this->secret_key)
                ->regionId('cn-hangzhou')
                ->asDefaultClient();

            $result = AlibabaCloud::rpc()
                ->product('Dysmsapi')
                // ->scheme('https') // https | http
                ->version('2017-05-25')
                ->action('SendSms')
                ->method('POST')
                ->host('dysmsapi.aliyuncs.com')
                ->options([
                    'query' => [
                        'RegionId' => "cn-hangzhou",
                        'PhoneNumbers' => $this->mobile,       //发送手机号
                        'SignName' => $this->sign,            //短信签名
                        'TemplateCode' => $this->template_code,    //短信模板CODE
                        'TemplateParam' => $this->template_param, //自定义随机数
                    ],
                ])
                ->request();
            return $result->toArray();
        } catch (ClientException $e) {
            return $e->getErrorMessage() . PHP_EOL;
        } catch (ServerException $e) {
            return $e->getErrorMessage() . PHP_EOL;
        }
    }

}