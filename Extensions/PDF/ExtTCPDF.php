<?php

namespace Shared\Extensions\PDF;

use Elibyy\TCPDF\FpdiTCPDFHelper;
use Elibyy\TCPDF\TCPDF;
use Elibyy\TCPDF\TCPDFHelper;
use Illuminate\Support\Facades\Config;

/**
 * Extension of TCPDF to implement custom functionality
 *
 * @inheritdoc
 *
 * Class ExtTCPDF
 * @package App\Extensions
 */
class ExtTCPDF extends TCPDF
{
    protected $app;
    /** @var  TCPDFHelper */
    protected $tcpdf;
    protected static $format;
    protected static $orientation;

    public function __construct()
    {
        $this->app = app();
        $this->reset();
    }

    public function reset()
    {
        $class = Config::get('tcpdf.use_fpdi') ? FpdiTCPDFHelper::class : TCPDFHelper::class;

        $this->tcpdf = new $class(
            static::$orientation ? static::$orientation : Config::get('tcpdf.page_orientation', 'L'),
            Config::get('tcpdf.page_units', 'mm'),
            static::$format ? static::$format : Config::get('tcpdf.page_format', 'A4'),
            Config::get('tcpdf.unicode', true),
            Config::get('tcpdf.encoding', 'UTF-8')
        );
    }

    public static function changeFormat($format)
    {
        static::$format = $format;
    }

    public static function changeOrientation($orientation)
    {
        static::$orientation = $orientation;
    }

    public function __call($method, $args)
    {
        if (method_exists($this->tcpdf, $method)) {
            return call_user_func_array([$this->tcpdf, $method], $args);
        }
        throw new \RuntimeException(sprintf('the method %s does not exists in TCPDF', $method));
    }

    public function setHeaderCallback($headerCallback)
    {
        $this->tcpdf->setHeaderCallback($headerCallback);
    }

    public function setFooterCallback($footerCallback)
    {
        $this->tcpdf->setFooterCallback($footerCallback);
    }
}
