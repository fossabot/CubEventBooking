<?php
namespace App\Controller\Champion;

use App\Controller\Champion\AppController;

/**
 * Champions Controller
 *
 * @property \App\Model\Table\ChampionsTable $Champions
 */
class ChampionsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Districts']
        ];
        $this->set('champions', $this->paginate($this->Champions));
        $this->set('_serialize', ['champions']);
    }

    /**
     * View method
     *
     * @param string|null $id Champion id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $champion = $this->Champions->get($id, [
            'contain' => ['Districts']
        ]);
        $this->set('champion', $champion);
        $this->set('_serialize', ['champion']);
    }
}
