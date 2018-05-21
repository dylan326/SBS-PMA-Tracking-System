<?php

class DatabaseClass
{
    private $correctInfo = false;
    
    public function __construct(){}
    
    private function connect()
    {
        $config = parse_ini_file('/home/u864991580/config.ini');
        $conn = mysqli_connect('mysql.hostinger.com',$config['username'],$config['password'],$config['dbname']);
        if ($conn == false)
        {
            die("Connection failed: contact Administrator");
        }
        
        return $conn;
    }
    
    public function wash($input)
   {
       
        $input = htmlspecialchars_decode($input);
  
        return $input;
   }
   
    public function login($username, $password)
    {
        $connect = $this->connect();
       $sql = "SELECT * FROM login where username = ?";
    
       $pre = $connect->prepare($sql);
    
        $pre->bind_param('s', $username);
       
       
        $pre->execute();
        $result = $pre->get_result();
        $data = $result->fetch_assoc();
        //hashing passwords
        $hashedpass = $data['password'];
        
     
       
        
        if ($result->num_rows > 0 and $data['username'] == $username and password_verify($password, $hashedpass))
        {
            $this->correctInfo = true;
            $_SESSION['login'] = $data['password'];
            $_SESSION['username'] = $data['username'];
            //$_SESSION['email'] = $data['email'];
            
            $this->correctInfo = true;
        }
        
        return $this->correctInfo;
        
    }
    
    public function insertuser($username, $password)
   {
       $connect = $this->connect();
      $hashed = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO login (username, password) VALUES (?, ?)";
        $stmt= $connect->prepare($sql);
        $stmt->bind_param("ss", $username, $hashed);
        $stmt->execute();
        
        return $stmt;

   }
   
   public function add_existing($name, $days, $date_completed)
   {
        $connect = $this->connect();
        $stmt = $connect->prepare("insert into pma (name, days, in_prog, start_date, date_completed) values (?,?,0,null,?)");
        $stmt->bind_param("sss", $name, $days, $date_completed);

        $stmt->execute();
        
        return $stmt;
   }
   
   public function add_new($name, $days)
   {
       $connect = $this->connect();
        $sqlpma = "insert into pma (name, days, in_prog, start_date, date_completed) values ( ?, ?, 0, null, 'New PMA')";
        $stmtpma = $connect->prepare($sqlpma);
        $stmtpma->bind_param("ss", $name, $days);
        $stmtpma->execute();
        
        return $stmtpma;
   }
   
   public function edit_days($pma_id, $new_days)
   {
       $connect = $this->connect();
       $sql = "update pma set days = ? where pma_id = $pma_id";
        $stmt = $connect->prepare($sql);
        $stmt->bind_param("s", $new_days);
        $stmt->execute();
        
        return $stmt;
   }
   
   public function grabName($pma_id)
   {
       $connect = $this->connect();
       $sqlgetname = "SELECT * FROM pma where pma_id = $pma_id";
        $result = $connect->query($sqlgetname);
        if ($result->num_rows > 0)
        {
         // output data of each row
            while($row = $result->fetch_assoc()) 
        
             $pma_name = $row['name'];
         }
         
         return $pma_name;
    }
    
    public function historical_form_process($name, $date_completed, $contact_client, $inspector1, $inspector2, $how_long)
    {
        $connect = $this->connect();
        $sqlhistorical = "insert into historical (pma_name, date_completed, building_contact, inspector1, inspector2, time_to_complete)
                          values (?,?,?,?,?,?)";
                  
        $stmthistorical = $connect->prepare($sqlhistorical);
        $stmthistorical->bind_param("ssssss", $name, $date_completed, $contact_client,$inspector1,$inspector2,$how_long);
        $stmthistorical->execute();
        
        return $sqlhistorical;
    }
    
    public function save_reminder($reminder)
    {
        $connect = $this->connect();
        $stmt = $connect->prepare("INSERT INTO reminders (reminder)VALUES (?)");
        $stmt->bind_param("s",$reminder);
        $stmt->execute();
        
        return $stmt;
    }
    
    public function outsideConnect()
    {
        return $this->connect();
    }
   
   public function getName($inspector)
   {
       $conn = $this->connect();
       
       $sql = "select first_name from person where person_id = $inspector";
       $result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
    // output data of each row
            while($row = $result->fetch_assoc())
            {
                $name = $row['first_name'];
            }  
      
        }
   
   
        return $name;
   
    }
  
   
}

?>