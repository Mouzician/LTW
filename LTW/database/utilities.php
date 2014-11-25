<?php
  function getAllUsers() {
    global $db;
    
    $stmt = $db->prepare('SELECT * FROM Users');
    $stmt->execute();  

    return $stmt->fetchAll();
  }
  
  function getThatUser($id) {
    global $db;
    
    $stmt = $db->prepare('SELECT * FROM Users WHERE id = ?');
    $stmt->execute(array($id));  

    return $stmt->fetch();
  }

  function userExists($username, $password) {
    global $db;
    
    $stmt = $db->prepare('SELECT * FROM users WHERE username = ? AND password = ?');
    //$stmt->execute(array($username, sha1($password))); 
    $stmt->execute(array($username, $password));   

    return $stmt->fetch() !== false;
  }
?>

