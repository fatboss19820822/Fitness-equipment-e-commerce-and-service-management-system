<?php
declare(strict_types=1);

namespace ContentBlocks\Controller;

use App\Controller\AppController;
use Authorization\AuthorizationService;
use Cake\Core\Configure;
use Cake\Event\EventInterface;
use Cake\Log\Log;
use Psr\Http\Message\UploadedFileInterface;

/**
 * ContentBlocks Controller
 *
 * @property \ContentBlocks\Model\Table\ContentBlocksTable $ContentBlocks
 * @method \ContentBlocks\Model\Entity\ContentBlock[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContentBlocksController extends AppController {
    public function initialize(): void
    {
        parent::initialize();
        $this->viewBuilder()->setLayout('ContentBlocks.admin');
    }

    public function beforeRender(\Cake\Event\EventInterface $event)
    {
        parent::beforeRender($event);
        $this->viewBuilder()->setLayout('admin');  // use your custom layout here
    }

}
