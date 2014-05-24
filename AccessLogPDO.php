<?php
class AccessLogPDO {
	  public function __construct($pdo) {
		$this->pdo = $pdo;
	  }
	  public function count() {
		$sql="select count(*) from access_log";
		$sth = $this->pdo->prepare($sql);
		$sth->execute();
		$rows = $sth->fetch(PDO::FETCH_NUM);
		return $rows[0];
	  }
}
?>