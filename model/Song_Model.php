<?php
 class Song_Model{
  public $id;
  public $singer_id;
  public $type_id;
  public $name;
  public $image;
  public $lyric;

  public function all(){
    $conn = FT_Database::instance()->getConnection();
    $sql = 'select * from songs';
    $result = mysqli_query($conn, $sql);
    $list_song = array();

    if(!$result)
      die('Error: '.mysqli_query_error());

    while ($row = mysqli_fetch_assoc($result)){
            $song = new Song_Model();
            $song->id = $row['id'];
            $song->singer_id = $row['singers_id'];
            $song->type_id = $row['types_id'];
            $song->name = $row['name'];
            $song->image = $row['image'];
            $song->lyric = $row['lyric'];
            $list_song[] = $song;
        }

        return $list_song;
  }

  public function save(){
    $conn = FT_Database::instance()->getConnection();
    $stmt = $conn->prepare("INSERT INTO songs (singer_id, type_id, name, image, lyric)
      VALUES ('?, ?, ?, ?, ?)");
    $stmt->bind_param("iisss", $this->singer_id, $this->type_id, $this->name, $this->image, $this->lyric);
    $rs = $stmt->execute();
    $this->id = $stmt->insert_id;
    $stmt->close();
    return $rs;
  }

  public function findById($id){
    $conn = FT_Database::instance()->getConnection();
    $sql = 'select * from songs where id='.$id;
    $result = mysqli_query($conn, $sql);

    if(!$result)
      die('Error: ');

    $row = mysqli_fetch_assoc($result);
        $song = new Song_Model();
            $song->id = $row['id'];
            $song->singer_id = $row['singer_id'];
            $song->type_id = $row['type_id'];
            $song->name = $row['name'];
            $song->image = $row['image'];
            $song->lyric = $row['lyric'];

        return $song;
  }

  public function delete(){
    $conn = FT_Database::instance()->getConnection();
    $sql = 'delete from songs where id='.$this->id;
    $result = mysqli_query($conn, $sql);

    return $result;
  }

  public function update(){
    $conn = FT_Database::instance()->getConnection();
    $stmt = $conn->prepare("UPDATE songs SET singer_id=?, type_id=?, name=? image=? lyric=?
      WHERE id=?");
    $stmt->bind_param("iisssi", $this->singer_id, $this->type_id, $this->name, $this->image, $this->lyric, $_POST['id']);
    $stmt->execute();
    $stmt->close();
  }
}
?>
