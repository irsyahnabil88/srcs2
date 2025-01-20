<?php
declare(strict_types=1);

namespace App\Controller;

use AuditStash\Meta\RequestMetadata;
use Cake\Event\EventManager;
use Cake\Routing\Router;

/**
 * Registrations Controller
 *
 * @property \App\Model\Table\RegistrationsTable $Registrations
 */
class RegistrationsController extends AppController
{
	public function initialize(): void
	{
		parent::initialize();

		$this->loadComponent('Search.Search', [
			'actions' => ['index'],
		]);
	}
	
	public function beforeFilter(\Cake\Event\EventInterface $event)
	{
		parent::beforeFilter($event);
	}

	/*public function viewClasses(): array
    {
        return [JsonView::class];
		return [JsonView::class, XmlView::class];
    }*/
	
	public function json()
    {
		$this->viewBuilder()->setLayout('json');
        $this->set('registrations', $this->paginate());
        $this->viewBuilder()->setOption('serialize', 'registrations');
    }
	
	public function csv()
	{
		$this->response = $this->response->withDownload('registrations.csv');
		$registrations = $this->Registrations->find();
		$_serialize = 'registrations';

		$this->viewBuilder()->setClassName('CsvView.Csv');
		$this->set(compact('registrations', '_serialize'));
	}
	
	public function pdfList()
	{
		$this->viewBuilder()->enableAutoLayout(false); 
        $this->paginate = [
            'contain' => ['Students', 'Subjects'],
			'maxLimit' => 10,
        ];
		$registrations = $this->paginate($this->Registrations);
		$this->viewBuilder()->setClassName('CakePdf.Pdf');
		$this->viewBuilder()->setOption(
			'pdfConfig',
			[
				'orientation' => 'portrait',
				'download' => true, 
				'filename' => 'registrations_List.pdf' 
			]
		);
		$this->set(compact('registrations'));
	}
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
		$this->set('title', 'Registrations List');
		$this->paginate = [
			'maxLimit' => 10,
        ];
        $query = $this->Registrations->find('search', search: $this->request->getQueryParams())
            ->contain(['Students', 'Subjects']);
			//->where(['title IS NOT' => null])
        $registrations = $this->paginate($query);
		
		//count
		$this->set('total_registrations', $this->Registrations->find()->count());
		$this->set('total_registrations_archived', $this->Registrations->find()->where(['status' => 2])->count());
		$this->set('total_registrations_active', $this->Registrations->find()->where(['status' => 1])->count());
		$this->set('total_registrations_disabled', $this->Registrations->find()->where(['status' => 0])->count());
		
		//Count By Month
		$this->set('january', $this->Registrations->find()->where(['MONTH(created)' => date('1'), 'YEAR(created)' => date('Y')])->count());
		$this->set('february', $this->Registrations->find()->where(['MONTH(created)' => date('2'), 'YEAR(created)' => date('Y')])->count());
		$this->set('march', $this->Registrations->find()->where(['MONTH(created)' => date('3'), 'YEAR(created)' => date('Y')])->count());
		$this->set('april', $this->Registrations->find()->where(['MONTH(created)' => date('4'), 'YEAR(created)' => date('Y')])->count());
		$this->set('may', $this->Registrations->find()->where(['MONTH(created)' => date('5'), 'YEAR(created)' => date('Y')])->count());
		$this->set('jun', $this->Registrations->find()->where(['MONTH(created)' => date('6'), 'YEAR(created)' => date('Y')])->count());
		$this->set('july', $this->Registrations->find()->where(['MONTH(created)' => date('7'), 'YEAR(created)' => date('Y')])->count());
		$this->set('august', $this->Registrations->find()->where(['MONTH(created)' => date('8'), 'YEAR(created)' => date('Y')])->count());
		$this->set('september', $this->Registrations->find()->where(['MONTH(created)' => date('9'), 'YEAR(created)' => date('Y')])->count());
		$this->set('october', $this->Registrations->find()->where(['MONTH(created)' => date('10'), 'YEAR(created)' => date('Y')])->count());
		$this->set('november', $this->Registrations->find()->where(['MONTH(created)' => date('11'), 'YEAR(created)' => date('Y')])->count());
		$this->set('december', $this->Registrations->find()->where(['MONTH(created)' => date('12'), 'YEAR(created)' => date('Y')])->count());

		$query = $this->Registrations->find();

        $expectedMonths = [];
        for ($i = 11; $i >= 0; $i--) {
            $expectedMonths[] = date('M-Y', strtotime("-$i months"));
        }

        $query->select([
            'count' => $query->func()->count('*'),
            'date' => $query->func()->date_format(['created' => 'identifier', "%b-%Y"]),
            'month' => 'MONTH(created)',
            'year' => 'YEAR(created)'
        ])
            ->where([
                'created >=' => date('Y-m-01', strtotime('-11 months')),
                'created <=' => date('Y-m-t')
            ])
            ->groupBy(['year', 'month'])
            ->orderBy(['year' => 'ASC', 'month' => 'ASC']);

        $results = $query->all()->toArray();

        $totalByMonth = [];
        foreach ($expectedMonths as $expectedMonth) {
            $found = false;
            $count = 0;

            foreach ($results as $result) {
                if ($expectedMonth === $result->date) {
                    $found = true;
                    $count = $result->count;
                    break;
                }
            }

            $totalByMonth[] = [
                'month' => $expectedMonth,
                'count' => $count
            ];
        }

        $this->set([
            'results' => $totalByMonth,
            '_serialize' => ['results']
        ]);

        //data as JSON arrays for report chart
        $totalByMonth = json_encode($totalByMonth);
        $dataArray = json_decode($totalByMonth, true);
        $monthArray = [];
        $countArray = [];
        foreach ($dataArray as $data) {
            $monthArray[] = $data['month'];
            $countArray[] = $data['count'];
        }

        $this->set(compact('registrations', 'monthArray', 'countArray'));
    }

    /**
     * View method
     *
     * @param string|null $id Registration id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
		$this->set('title', 'Registrations Details');
        $registration = $this->Registrations->get($id, contain: ['Students', 'Subjects']);
        $this->set(compact('registration'));

    }

    public function pdf($id = null)
{
    $this->viewBuilder()
        ->setClassName('CakePdf.Pdf')
        ->setOption('pdfConfig', [
            'orientation' => 'portrait',
            'download' => true,
            'filename' => 'Registration_' . $id . '.pdf'
        ]);

    $registration = $this->Registrations->get($id, [
        'contain' => ['Students', 'Subjects'],
    ]);
    
    $title = 'Registration Details';
    $this->set(compact('registration', 'title'));
}

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		$this->set('title', 'New Registrations');
		EventManager::instance()->on('AuditStash.beforeLog', function ($event, array $logs) {
			foreach ($logs as $log) {
				$log->setMetaInfo($log->getMetaInfo() + ['a_name' => 'Add']);
				$log->setMetaInfo($log->getMetaInfo() + ['c_name' => 'Registrations']);
				$log->setMetaInfo($log->getMetaInfo() + ['ip' => $this->request->clientIp()]);
				$log->setMetaInfo($log->getMetaInfo() + ['url' => Router::url(null, true)]);
				$log->setMetaInfo($log->getMetaInfo() + ['slug' => $this->Authentication->getIdentity('slug')->getIdentifier('slug')]);
			}
		});
        $registration = $this->Registrations->newEmptyEntity();
        if ($this->request->is('post')) {
            $registration = $this->Registrations->patchEntity($registration, $this->request->getData());
            if ($this->Registrations->save($registration)) {
                $this->Flash->success(('The registration has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(('The registration could not be saved. Please, try again.'));
        }
        $students = $this->Registrations->Students->find('list', ['limit' => 200])->all();
        $subjects = $this->Registrations->Subjects->find('list', ['limit' => 200])->all();
        $this->set(compact('registration', 'students', 'subjects'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Registration id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
		$this->set('title', 'Registrations Edit');
		EventManager::instance()->on('AuditStash.beforeLog', function ($event, array $logs) {
			foreach ($logs as $log) {
				$log->setMetaInfo($log->getMetaInfo() + ['a_name' => 'Edit']);
				$log->setMetaInfo($log->getMetaInfo() + ['c_name' => 'Registrations']);
				$log->setMetaInfo($log->getMetaInfo() + ['ip' => $this->request->clientIp()]);
				$log->setMetaInfo($log->getMetaInfo() + ['url' => Router::url(null, true)]);
				$log->setMetaInfo($log->getMetaInfo() + ['slug' => $this->Authentication->getIdentity('slug')->getIdentifier('slug')]);
			}
		});
        $registration = $this->Registrations->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $registration = $this->Registrations->patchEntity($registration, $this->request->getData());
            if ($this->Registrations->save($registration)) {
                $this->Flash->success(('The registration has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(('The registration could not be saved. Please, try again.'));
        }
		$students = $this->Registrations->Students->find('list', limit: 200)->all();
		$subjects = $this->Registrations->Subjects->find('list', limit: 200)->all();
        $this->set(compact('registration', 'students', 'subjects'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Registration id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
		EventManager::instance()->on('AuditStash.beforeLog', function ($event, array $logs) {
			foreach ($logs as $log) {
				$log->setMetaInfo($log->getMetaInfo() + ['a_name' => 'Delete']);
				$log->setMetaInfo($log->getMetaInfo() + ['c_name' => 'Registrations']);
				$log->setMetaInfo($log->getMetaInfo() + ['ip' => $this->request->clientIp()]);
				$log->setMetaInfo($log->getMetaInfo() + ['url' => Router::url(null, true)]);
				$log->setMetaInfo($log->getMetaInfo() + ['slug' => $this->Authentication->getIdentity('slug')->getIdentifier('slug')]);
			}
		});
        $this->request->allowMethod(['post', 'delete']);
        $registration = $this->Registrations->get($id);
        if ($this->Registrations->delete($registration)) {
            $this->Flash->success(('The registration has been deleted.'));
        } else {
            $this->Flash->error(('The registration could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	public function archived($id = null)
    {
		$this->set('title', 'Registrations Edit');
		EventManager::instance()->on('AuditStash.beforeLog', function ($event, array $logs) {
			foreach ($logs as $log) {
				$log->setMetaInfo($log->getMetaInfo() + ['a_name' => 'Archived']);
				$log->setMetaInfo($log->getMetaInfo() + ['c_name' => 'Registrations']);
				$log->setMetaInfo($log->getMetaInfo() + ['ip' => $this->request->clientIp()]);
				$log->setMetaInfo($log->getMetaInfo() + ['url' => Router::url(null, true)]);
				$log->setMetaInfo($log->getMetaInfo() + ['slug' => $this->Authentication->getIdentity('slug')->getIdentifier('slug')]);
			}
		});
        $registration = $this->Registrations->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $registration = $this->Registrations->patchEntity($registration, $this->request->getData());
			$registration->status = 2; //archived
            if ($this->Registrations->save($registration)) {
                $this->Flash->success(('The registration has been archived.'));

				return $this->redirect($this->referer());
            }
            $this->Flash->error(('The registration could not be archived. Please, try again.'));
        }
        $this->set(compact('registration'));
    }
}