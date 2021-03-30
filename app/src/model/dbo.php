<?php

require_once 'vendor/autoload.php';
//require __DIR__ . '/vendor/autoload.php';
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class Dbo
{
    private $conn;

    public function __construct()
    {
        $connectionParams = [
      'dbname' => 'bluesky',
      'user' => 'root',
      'password' => '',
      'host' => 'localhost',
      'driver' => 'pdo_mysql',
    ];

        $this->conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams);
    }

    //Select all the users...
    public function selectAll()
    {
        $this->dbLog('selectAll');
        $sql = 'SELECT * FROM users';
        $stmt = $this->conn->query($sql);
        echo "ID\tFIRST NAME\tLAST NAME\tEMAIL\n";
        echo "=================================================================\n";
        while (($row = $stmt->fetchAssociative()) !== false) {
            echo $row['id'].".\t".$row['fname']."\t\t".$row['lname']."\t\t".$row['email']."\n";
        }
    }

    //Select a user based on id...
    public function selectById($id)
    {
        $this->dbLog('selectById');
        $sql = "SELECT * FROM users where id = '+$id+'";
        $stmt = $this->conn->query($sql);
        echo "ID\tFIRSTNAME\tLASTNAME\tEMAIL\n";
        echo "=================================================================\n";
        while (($row = $stmt->fetchAssociative()) !== false) {
            echo $row['id'].".\t".$row['fname']."\t\t".$row['lname']."\t\t".$row['email']."\n";
        }
    }

    //Create a user in the db.
    public function insertUser($fname, $lname, $email)
    {
        $this->dbLog('insertUser');
        $this->conn->insert('users', [
                     'fname' => $fname,
                     'lname' => $lname,
                     'email' => $email,
                   ]);
    }

    public function dbLog($queryType)
    {
        //Logging....
        $logger = new Logger('bluesky');
        $logger->pushHandler(new StreamHandler('./logs/app.log', Logger::DEBUG));
        $logger->info('Db connection established successfully with '.$queryType.' query....');
        //$logger->warning('This is a log warning! ^_^ ');
        //$logger->error('This is a log error! ^_^ ');
    }
}
