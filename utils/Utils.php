<?

class Utils {

	public function drawPager($totalItems, $perPage) {

		$pages = ceil($totalItems / $perPage);

		if(!isset($_GET['page']) || intval($_GET['page']) == 0) {
			$page = 1;
		} else if (intval($_GET['page']) > $totalItems) {
			$page = $pages;
		} else {
			$page = intval($_GET['page']);
		}

		$pager =  "<nav aria-label='Page navigation'>";
        $pager .= "<ul class='pagination'>";
        $dataGet = $_GET;
        $dataGet['page'] = 1;
        $pager .= "<li><a href='/?".http_build_query($dataGet)."' aria-label='Previous'><span aria-hidden='true'>«</span> Начало</a></li>";
        for($i=2; $i<=$pages-1; $i++) {
        	$dataGet['page'] = $i;
            $pager .= "<li><a href='/?".http_build_query($dataGet)."'>" . $i ."</a></li>";
        }
    	$dataGet['page'] = $pages;
        $pager .= "<li><a href='/?". http_build_query($dataGet)."' aria-label='Next'>Конец <span aria-hidden='true'>»</span></a></li>";
        $pager .= "</ul>";
 
        return $pager;

	}

}