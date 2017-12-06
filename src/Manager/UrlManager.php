<?php
/**
 * Herms (http://theicon.co.nz/)
 *
 * Manager
 *
 * PHP version 7
 *
 * @category Module
 * @package  HermsCore
 * @author   Don Nuwinda <nuwinda@gmail.com>
 * @license  GPL http://theicon.co.nz
 * @link     http://theicon.co.nz
 */
namespace HermsCore\Manager;

/**
 * UrlManager Class
 *
 * @category Manager
 * @package  HermsCore
 * @author   Don Nuwinda <nuwinda@gmail.com>
 * @license  GPL http://theicon.co.nz
 * @link     http://theicon.co.nz
 */
class UrlManager
{
    protected $protocol;
    
    protected $baseurl;
    
    protected $siteurl;

    /**
     * Constructor.
     *
     * @param ServiceLocatorInterface $servicelocator ServiceLocatorInterface
     *
     * @return void
     */
    public function __construct()
    {
        $this->generateBaseUrl();      
    }
    
    /**
     * Set protocol.
     *
     * @param
     *
     * @return void
     */
    public function setProtocol()
    {
        $this->protocol = (getenv("HTTPS")=='on')?'https':'http';
    }
    
    /**
     * Get the theme base url.
     *
     * @param boolean $scheme return with protocall
     *
     * @return string
     */
    protected function generateBaseUrl( $scheme=true )
    {
        $baseUrl = $domain = $subdomain = $protocol = $host = $port = null;
        if (php_sapi_name()=="cli") return false;
        $host = $_SERVER ['HTTP_HOST'];
    
        $scriptname = $_SERVER['SCRIPT_NAME'];
        $subdir = str_replace('/index.php', '', $scriptname);
        $this->siteurl = $_SERVER ['HTTP_HOST'];
        $this->setProtocol();

        if (getenv("HTTPS")=='on') {
            $port = $_SERVER ['SERVER_PORT'] != 443 ? ':' . $_SERVER ['SERVER_PORT'] : '';
        } else {
            $port = $_SERVER ['SERVER_PORT'] != 80 ? ':' . $_SERVER ['SERVER_PORT'] : '';
        }
        if($scheme) {
            $this->baseurl = sprintf("//%s%s/", $this->siteurl, $subdir);
        }
        $this->baseurl = sprintf("%s://%s%s/", $this->protocol, $this->siteurl, $subdir);
    }

    /**
     * Get the base url.
     *
     * @return string Base Url
     */
    public function getBaseUrl()
    {
        return $this->baseurl;
    }
    
    
    /**
     * Get the site url.
     *
     * @return string Base Url
     */
    public function getSiteUrl()
    {
        return $this->siteurl;
    }
    
    /**
     * Get the url.
     *
     * @param string $path append path
     *
     * @return string
     */
    public function getUrl($path=null)
    {
        return sprintf("%s".$path, $this->baseurl);
    }
    
    /**
     * Get the theme absolute path.
     *
     * @return string
     */
     public function themeBasePath()
     {
         return __DIR__;
     }
}