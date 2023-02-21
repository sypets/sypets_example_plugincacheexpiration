<?php
declare(strict_types=1);
namespace Sypets\SypetsExamplePlugincacheexpiration\Controller;

use Psr\Http\Message\ResponseInterface;
use Sypets\SypetsExamplePlugincacheexpiration\EventListener\PageCacheEventListener;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Frontend\Cache\CacheMetadata;

class CacheController extends ActionController
{
    protected PageCacheEventListener $eventListener;

    public function __construct(PageCacheEventListener $eventListener)
    {
        $this->eventListener = $eventListener;
    }

    /*
    public function showAction(): ResponseInterface
    {
        $interval = 10;
        if (isset($GLOBALS['TSFE']) && method_exists($GLOBALS['TSFE'], 'addCacheExpires')) {
            $GLOBALS['TSFE']->setMinimalCacheExpires(time() + $interval);
            $this->view->assign('hint', sprintf('Cache will expire in %d seconds', $interval));
        } else {
            $this->view->assign('hint', 'Could not change expiration time');
        }

        $this->view->assign('date', date("D M d, Y G:i:s"));

        return $this->htmlResponse();
    }
    */

    // using event
    public function showAction(): ResponseInterface
    {
        $interval = 10;
        $this->eventListener->setCacheMetadata(
            new CacheMetadata($interval + time(), ['bah', 'humbug'])
        );
        $this->view->assign('hint', sprintf('Cache will expire in %d seconds', $interval));
        $this->view->assign('date', date("D M d, Y G:i:s"));

        return $this->htmlResponse();
    }

}
