<?php
require_once 'AccessLogPDO.php';
class AccessLogPDOTest extends PHPUnit_Extensions_Database_TestCase {
  private $pdo;

  public function testCountRow()
  {
    $accessLogPdo = new AccessLogPDO($this->pdo);
    $result = $accessLogPdo->count();
	$this->assertEquals(2,$result);
    //assertThat(2, is(equalTo($result)));
  }
  
  public function createTable(PDO $pdo) {
    $query = "
      CREATE TABLE access_log (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        ip varchar(15) NOT NULL,
        access_time datetime,
        response_time decimal(7,4),
        service_url varchar(50) NOT NULL DEFAULT 0
      );
    ";
    $pdo->query($query);
  }
  
  public function getConnection() {
    try {
      $this->pdo = new PDO('sqlite:memory');
      $this->createTable($this->pdo);
      $this->truncateAutoIncrement($this->pdo);
      return $this->createDefaultDBConnection($this->pdo, ':memory:');
    }catch(PDOException $e) {
    }
  }
  
  public function getDataSet() {
    return new PHPUnit_Extensions_Database_DataSet_YamlDataSet(
      dirname(__FILE__)."/access_log.yml"
    );
  }
  
  /***/
   public function truncateAutoIncrement(PDO $pdo) {
    $query = "delete from sqlite_sequence where name='access_log';";
    $pdo->query($query);
  }
}
?>