<?php
class Playlist_Model{
  public $id;
  public $user_id;
  public $name;
  public $image;

  public function all(){
    $conn = FT_Database::instance()->getConnection();
    $sql = 'select * from playlists';
    $result = mysqli_query($conn, $sql);
    $list_playlist = array();

    if(!$result)
      die('Error: '.mysqli_query_error());

    while ($row = mysqli_fetch_assoc($result)){
            $playlist = new Playlist_Model();
            $playlist->id = $row['id'];
            $playlist->name = $row['name'];
            $playlist->user_id = $row['user_id'];
            $playlist->image = $row['image'];
            $list_playlist[] = $playlist;
        }

        return $list_playlist;
  }

  public function save(){
    $conn = FT_Database::instance()->getConnection();
    $stmt = $conn->prepare("INSERT INTO playlists (user_id, name, image)
      VALUES (?, ?, ?)");
    $stmt->bind_param("s", $this->user_id,$this->name,$this->image);
    $rs = $stmt->execute();
    $this->id = $stmt->insert_id;
    $stmt->close();
    return $rs;
  }

  public function findById($id){
    $conn = FT_Database::instance()->getConnection();
    $sql = 'select * from playlists where id='.$id;
    $result = mysqli_query($conn, $sql);

    if(!$result)
      die('Error: ');

    $row = mysqli_fetch_assoc($result);
        $playlist = new Playlist_Model();
            $playlist->id = $row['id'];
            $playlist->name = $row['name'];
            $playlist->user_id = $row['user_id'];
            $playlist->image = $row['image'];

        return $playlist;
  }

  public function delete(){
    $conn = FT_Database::instance()->getConnection();
    $sql = 'delete from playlists where id='.$this->id;
    $result = mysqli_query($conn, $sql);

    return $result;
  }

  public function update(){
    $conn = FT_Database::instance()->getConnection();
    $stmt = $conn->prepare("UPDATE playlists SET name=?, user_id=?, image=? WHERE id=?");
    $stmt->bind_param("issi",$this->user_id, $this->name, $this->image, $_POST['id']);
    $stmt->execute();
    $stmt->close();
  }
}
?>
