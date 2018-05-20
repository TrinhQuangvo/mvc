<?php
class Album_Model{
  public $id;
  public $name;
  public $image;

  public function details($id)
  {
    $conn = FT_Database::instance()->getConnection();
    $sql = 'select * from songs where albums_id='.$id;
    $result = mysqli_query($conn, $sql);
    $albums_details = array();
    
    if(!$result)
      die('Error: '.mysqli_query_error());
      while ($row = mysqli_fetch_assoc($result)){
        $details = new Album_Model();
        
        $details->id = $row['id'];
        $details->name = $row['name'];
        $details->url = $row['url'];

        $albums_details[] = $details;
    }

    return $albums_details;
  }

  public function all(){
    $conn = FT_Database::instance()->getConnection();
    $sql = 'select * from albums';
    $result = mysqli_query($conn, $sql);
    $list_album = array();

    if(!$result)
      die('Error: '.mysqli_query_error());

    while ($row = mysqli_fetch_assoc($result)){
            $album = new Album_Model();
            $album->id = $row['id'];
            $album->name = $row['name'];
            $album->image = $row['image'];
            $list_album[] = $album;
        }

        return $list_album;
  }

  public function save(){
    $conn = FT_Database::instance()->getConnection();
    $stmt = $conn->prepare("INSERT INTO albums (name, image)
      VALUES (?, ?)");
    $stmt->bind_param("ss", $this->name , $this->image);
    $rs = $stmt->execute();
    $this->id = $stmt->insert_id;
    $stmt->close();
    return $rs;
  }

  public function findById($id){
    $conn = FT_Database::instance()->getConnection();
    $sql = 'select * from albums where id='.$id;
    $result = mysqli_query($conn, $sql);

    if(!$result)
      die('Error: ');

    $row = mysqli_fetch_assoc($result);
        $album = new Album_Model();
            $album->id = $row['id'];
            $album->name = $row['name'];
            $album->image = $row['image'];

        return $album;
  }

  public function delete(){
    $conn = FT_Database::instance()->getConnection();
    $sql = 'delete from albums where id='.$this->id;
    $result = mysqli_query($conn, $sql);

    return $result;
  }

  public function update(){
    $conn = FT_Database::instance()->getConnection();
    $stmt = $conn->prepare("UPDATE albums SET name=?,image=? WHERE id=?");
    $stmt->bind_param("ssi", $this->name,$this->image ,$_POST['id']);
    $stmt->execute();
    $stmt->close();
  } 
  
  public function InfoAlbum()
  {
    $conn = FT_Database::instance()->getConnection();
    $sql = 'SELECT albums.id , albums.name , albums.image
    ,songs.id as songs_id ,songs.name as songs_name , songs.url , songs.singers_id
    FROM albums INNER JOIN songs ON albums.id = songs.albums_id';
    
    $list_album = array();
    $result = mysqli_query($conn, $sql);
    if(!$result)
      die('Error: '.mysqli_query_error());

    while ($row = mysqli_fetch_assoc($result)){
          
          $list_album[$row["id"]]["name"] = $row["name"];
          $list_album[$row["id"]]["image"] = $row["image"];
          $list_album[$row["id"]]["songs"][$row["songs_id"]] = array(
              "songs_name"=>$row["songs_name"],
              "url"=>$row["url"],
      ); 
    }
   return $list_album;
  }
}
 
?>
