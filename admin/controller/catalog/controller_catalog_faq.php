<?php
	class Controller_Faq {
		
		public	$FaqModel;
		

		public function __construct() {
			require_once('model/catalog/model_catalog_faq.php');
			$this->FaqModel =  new Model_Faq();
		}
		
		public function index() {
			
			if(!isset($_SESSION['AdminUser']) || empty($_SESSION['AdminUser'])) { echo "Permission Denied"; exit; }	
			
			$sortby = isset($_GET[sort]) ? $_GET[sort] : 'question';
			$sortorder = isset($_GET['order']) ? $_GET['order'] : 'ASC';
			
			$pageNo = isset($_POST['page']) ? $_POST['page'] : 1;
		
			$query ="1";
			if(isset($_GET[filter_title]) && isset($_GET[filter_status])) {
				$query = "question like '$_GET[filter_title]%' and status = $_GET[filter_status] order by $sortby $sortorder";
			}else if( isset($_GET[filter_title]) ) {
				$query = "question like '$_GET[filter_title]%' order by $sortby $sortorder";
			}else if( isset($_GET[filter_status]) ) {
				$query = "status = $_GET[filter_status] order by $sortby $sortorder";
			}else {
				$query = "1 order by $sortby $sortorder";
			}
			
			$results = $this->FaqModel->getDetailsByQuery("*", $query, $pageNo);		
			$totalRecords = $this->FaqModel->TotalRecords($query);
			$pageLimit = ADMIN_PAGE_LIMIT;
			$recordFrom = (($pageNo-1) * $pageLimit) + 1 ;
			$recordTo = $recordFrom + count($results) - 1;
			$totalPages = ceil($totalRecords/$pageLimit);

			global $header; global $menu; global $footer;
			include_once('view/templates/catalog/faq/template_catalog_faq_index.php');

		}
		

		public function insert() {
			
			if(!isset($_SESSION['AdminUser']) || empty($_SESSION['AdminUser'])) { echo "Permission Denied"; exit; }	
			
			$notification = ""; $question=""; $answer=""; $sort_order="0"; $status="1"; 
			if(isset($_POST['info'])) {
				$dbInfo = $_POST['info'] ;
				
				$question=$dbInfo['question']; $answer=$dbInfo['answer']; $sort_order=$dbInfo['sort_order']; $status=$dbInfo['status'];
				
				$faq_name_error = empty($question) || strlen($question)<10 || strlen($question)>255 ? "Faq question must be between 10 and 255 characters!" : "" ;
				$faq_answer_error = empty($answer) || strlen($answer)<10 || strlen($answer)>2000 ? "Faq answer must be between 10 and 2000 characters!" : "" ;

				if(!empty($faq_name_error) || !empty($faq_answer_error))
					$notification	=	"Warning: Please check the form carefully for errors!" ;
				else {
					$dbInfo['created'] = time();
					$dbInfo['modified'] = time();
					if($this->FaqModel->insert($dbInfo)) {
						echo '<script>window.location.href="index.php?route=catalog/faq"</script>';
						exit();
					} else {
						$notification	=	"Warning: Unknown Error Occurs" ;
					}
				}
				//echo "<pre>"; print_r($dbInfo); echo "</pre>";echo "<pre>"; print_r($_POST); echo "</pre>";
	
			}

			global $header; global $menu; global $footer;
			include_once('view/templates/catalog/faq/template_catalog_faq_form.php');
			
		}


		public function update() {
			
			if(!isset($_SESSION['AdminUser']) || empty($_SESSION['AdminUser'])) { echo "Permission Denied"; exit; }	
			
			if(isset($_POST['info'])) {
				$dbInfo = $_POST['info'] ;
				
				$faq_name_error = empty($dbInfo['question']) || strlen($dbInfo['question'])<10 || strlen($dbInfo['question'])>255 ? "Faq question must be between 10 and 100 characters!" : "" ;

				$faq_answer_error = empty($dbInfo['answer']) || strlen($dbInfo['answer'])<10 || strlen($dbInfo['answer'])>2000 ? "Faq answer must be between 10 and 2000 characters!" : "" ;

				if(!empty($faq_name_error) || !empty($faq_answer_error)) {
					$notification	=	"Warning: Please check the form carefully for errors!" ;
				} else {
					$dbInfo['modified'] = time();
					if($this->FaqModel->edit($dbInfo, $_GET['id'])) {
						echo '<script>window.location.href="index.php?route=catalog/faq"</script>';
						exit();
					} else {
						$notification	=	"Warning: Unknown Error Occurs" ;
					}
				}
				
			}else {
				$dbInfo =  $this->FaqModel->getDetailsById($_GET['id']);
			}
			
			$question=$dbInfo['question']; $answer=$dbInfo['answer']; $sort_order=$dbInfo['sort_order']; $status=$dbInfo['status'];
			
			global $header; global $menu; global $footer;
			include_once('view/templates/catalog/faq/template_catalog_faq_form.php');

		}

		public function delete() {
			
			if(!isset($_SESSION['AdminUser']) || empty($_SESSION['AdminUser'])) { echo "Permission Denied"; exit; }	
			
			//echo "<pre>"; print_r($_POST); echo "<pre>";
			if($this->model->toggle("deleted","id in (". implode( ",", $_POST['selected'] ). ")")) {
				echo '<script>window.location.href="index.php?route=catalog/faq"</script>';
				exit();
			} else {
				$notification	=	"Warning: Unknown Error Occurs" ;
			}
		}
		
		public function autocomplete() {
			echo json_encode ($this->model->getDetailsByFilter($_GET['filter_name']));	
		}


	}

?>