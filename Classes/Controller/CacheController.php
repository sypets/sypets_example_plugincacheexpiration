<?php
declare(strict_types=1);
namespace Sypets\SypetsExamplePlugincacheexpiration\Controller;

use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class CacheController extends ActionController
{
    public function showAction(): ResponseInterface
    {
        $interval = 10;
        if (isset($GLOBALS['TSFE']) && method_exists($GLOBALS['TSFE'], 'setPageCacheMinimalExpirationTimestamp')) {
            $GLOBALS['TSFE']->setPageCacheMinimalExpirationTimestamp(time() + $interval);
            $this->view->assign('hint', sprintf('Cache will expire in %d seconds', $interval));
        } else {
            $this->view->assign('hint', 'Could not change expiration time');
        }

        $this->view->assign('date', date("D M d, Y G:i:s"));

        return $this->htmlResponse();
    }
}
