<?php

class pagination {


	public $link;
	public $page;
	public $records_per_page = 4;
	public $filename;

	public function __construct()
	{
		try {
			$this->link = new PDO('mysql:host=localhost;dbname=pdo_guestbook', 'root', '');
			$this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOEXCEPTION $e) {
			echo $e->getMessage();
		}
	}

	public function ini()
	{
		$this->page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
		$this->start = ($this->page - 1) * $this->records_per_page;

	}

	public function createLinks()
	{
		$results = $this->link->query("SELECT * FROM guestbook");
		$total_records  = $results->rowCount();

		$pages = ceil($total_records/$this->records_per_page);

		for ($i=1; $i < $pages; $i++) {
			if ($this->page == $i)
			 	echo $this->page;
			else
				echo "<a class='paginationHref paginationLink' href='$this->filename?page=$i'>$i</a>";
		}
	}
}

?>