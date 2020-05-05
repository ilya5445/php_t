<?

class AdminController extends Controller {

	private $pageTpl = '/views/admin.tpl.php';

	public function __construct() {
		$this->model = new AdminModel();
		$this->view = new View();
	}

    public function index() {
        $this->pageData['title'] = "Вход в админку";
        $this->view->render($this->pageTpl, $this->pageData);
    }

    public function logout() {
        session_destroy();
        header('Location: /');
    }

    function postLogin(){
        $this->pageData['title'] = "Вход в админку";
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
                
            if ($_POST['username'] == 'admin' && $_POST['password'] == '123') {
                $_SESSION['valid'] = true;
                $_SESSION['timeout'] = time();
                $_SESSION['username'] = 'admin';

                $this->pageTpl = '/views/main.tpl.php';

                header('Location: /');
            } else {
                $this->pageData['msg'] = 'Wrong username or password';
                $this->view->render($this->pageTpl, $this->pageData);
            }
        }
    }

}