<?

class IndexController extends Controller {

	private $pageTpl = '/views/main.tpl.php';
    private $TaskPerPage = 3;

	public function __construct() {
		$this->model = new IndexModel();
		$this->view = new View();
        $this->utils = new Utils();
	}

    public function index() {

        $this->pageData['title'] = "Список задач";

        $allTask = count($this->model->getAllTasks());
        $totalPages = ceil($allTask / $this->TaskPerPage);

        $this->makeProductPager($allTask, $totalPages);

        $pagination = $this->utils->drawPager($allTask, $this->TaskPerPage);
        $this->pageData['pagination'] = $pagination;

        $this->pageData['get'] = $_GET;
        $this->pageData['valid'] = $_SESSION['valid'];

        $this->view->render($this->pageTpl, $this->pageData);
    }

    public function makeProductPager($allTask, $totalPages) {

        if(!isset($_GET['page']) || intval($_GET['page']) == 0 || intval($_GET['page']) == 1 || intval($_GET['page']) < 0) {
            $pageNumber = 1;
            $leftLimit = 0;
            $rightLimit = $this->TaskPerPage; // 0-5
        } elseif (intval($_GET['page']) > $totalPages || intval($_GET['page']) == $totalPages) {
            $pageNumber = $totalPages; // 2
            $leftLimit = $this->TaskPerPage * ($pageNumber - 1); // 5 * (2-1) = 6
            $rightLimit = $allTask; // 8
        } else {
            $pageNumber = intval($_GET['page']);
            $leftLimit = $this->TaskPerPage * ($pageNumber-1); // 5* (2-1) = 6
            $rightLimit = $this->TaskPerPage; // 5 -> (6,7,8,9,10)
        }

        if (isset($_GET['sort'])) {
            
            if ($_GET['type'] == 'ASC') {
                $_GET['type'] = 'DESC';
            } else {
                $_GET['type'] = 'ASC';
            }

            $this->pageData['tasks'] = $this->model->getLimitTasks($leftLimit, $rightLimit, $_GET['sort'], $_GET['type']);

        } else {
            $this->pageData['tasks'] = $this->model->getLimitTasks($leftLimit, $rightLimit);
        }


    }

    public function create() {
        $this->pageData['title'] = "Создание задачи";

        if (empty($_POST['name']) && empty($_POST['email']) && empty($_POST['text'])) {
            $this->pageTpl = '/views/create.tpl.php';
            $this->view->render($this->pageTpl, $this->pageData);
        } else {
            $this->model->setTask($_POST);
            $this->pageData['msg'] = 'Задача успешно создана';
            $this->pageTpl = '/views/create.tpl.php';
            unset($_POST);
            $this->view->render($this->pageTpl, $this->pageData);
        }
    }

    public function update() {
        if (!empty($_POST) && !empty($_GET) && $_SESSION['valid']) {
            $id = $_GET['id'];
            $checked = $_POST['checked'] == 1? 1: 0;
            $text = $_POST['text'];

            $textOrigin = $this->model->getTaskById($id)['text'];

            if ($text != $textOrigin) {
                $admin = 1;
            }
            
            $this->model->updateTask($id, $text, $checked, $admin);

            header('Location: /');
        }
    }

}