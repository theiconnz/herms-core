<?php
namespace HermsCore\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;

class getGravatar extends AbstractHelper
implements ServiceLocatorAwareInterface
{
    protected $defaultimage = '';
    protected $gravatarUrl = 'http://www.gravatar.com/avatar/';
    public $serviceManager;
    public $protocol;
    
    public function __invoke($email, $size='80', $attr=array() ){
        $this->setDefautlavatar();
        $grav_url = $this->gravatarUrl .md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $this->defaultimage ) . "&s=" . $size;
        return $this->outputAvatar( $grav_url, $attr );
    }
    
    public function setDefautlavatar(){
        $this->serviceManager = $this->getServiceLocator()->getServiceLocator();
        $config = $this->serviceManager->get('config');
        $baseurl = $this->themeBaseUrl(false);
        $this->defaultimage = $baseurl . '/img/'.  $config['global']['defaultavatar'];
    }
    
    public function outputAvatar( $image, $attr=array(), $echo=true, $imageurlonly=false  ){
        if( $imageurlonly ) return $image;
        $output = '<img src="'.$image.'" ';
        foreach( $attr as $key => &$value ){
           $output .= $key.'="'.$value.'" ';
        }
        $output .= '/>';
        if( !$echo ) return $output;
        echo $output;
    }

    public function setServiceLocator(ServiceLocatorInterface $servicelocator){
        $this->serviceLocator = $servicelocator;
    }
    
    public function getServiceLocator(){
        return $this->serviceLocator;
    }
    
    /**
     * Set protocol.
     *
     * @param
     *
     * @return void
     */
    public function setProtocol() {
        if (getenv ( "HTTPS" ) == 'on') {
            $this->protocol = 'https';
        } else {
            $this->protocol = 'http';
        }
    }
    
    /**
     * Set the theme base url.
     *
     * @param
     *
     * @return void
     */
    public function themeBaseUrl( $scheme=true ) {
        $baseUrl = $domain = $subdomain = $protocol = $host = $port = NULL;
        $host = array_reverse ( explode ( '.', $_SERVER ['HTTP_HOST'] ) );
    
        $scriptname = $_SERVER ['SCRIPT_NAME'];
        $subdir = str_replace ( '/index.php', '', $scriptname );
        $domain = (count ( $host ) > 1) ? $host [1] . '.' . $host [0] : $host [0];
        $this->setProtocol();
    
        if (getenv ( "HTTPS" ) == 'on') {
            $port = $_SERVER ['SERVER_PORT'] != 443 ? ':' . $_SERVER ['SERVER_PORT'] : '';
        } else {
            $port = $_SERVER ['SERVER_PORT'] != 80 ? ':' . $_SERVER ['SERVER_PORT'] : '';
        }
        if( $scheme ) return sprintf("//%s%s", $domain,$subdir);
        return sprintf("%s://%s%s", $this->protocol,$domain,$subdir);
    }
}