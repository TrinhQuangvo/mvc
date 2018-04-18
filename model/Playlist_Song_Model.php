<?php
class Playlist_Song_Model{
  public $id;
  public $playlist_id;
  public $song_id;

  public function all(){
    $conn = FT_Database::instance()->getConnection();
    $sql = 'select * from playlist_songs';
    $result = mysqli_query($conn, $sql);
    $list_playlist_song = array();

    if(!$result)
      die('Error: '.mysqli_query_error());

    while ($row = mysqli_fetch_assoc($result)){
            $playlist_song = new Playlist_Song_Model();
            $playlist_song->id = $row['id'];
            $playlist_song->playlist_id = $row['playlist_id'];
            $playlist_song->song_id = $row['song_id'];
            $list_playlist_song[] = $playlist_song;
        }

        return $list_playlist_song;
  }

  public function save(){
    $conn = FT_Database::instance()->getConnection();
    $stmt = $conn->prepare("INSERT INTO playlist_songs (playlist_id, song_id)
      VALUES (?, ?)");
    $stmt->bind_param("ii", $this->playlist_id, $this->song_id);
    $rs = $stmt->execute();
    $this->id = $stmt->insert_id;
    $stmt->close();
    return $rs;
  }

  public function findById($id){
    $conn = FT_Database::instance()->getConnection();
    $sql = 'select * from playlist_songs where id='.$id;
    $result = mysqli_query($conn, $sql);

    if(!$result)
      die('Error: ');

    $row = mysqli_fetch_assoc($result);
        $playlist_song = new Playlist_Song_Model();
            $playlist_song->id = $row['id'];
            $playlist_song->playlist_id = $row['playlist_id'];
            $playlist_song->song_id = $row['song_id'];

        return $playlist_song;
  }

  public function delete(){
    $conn = FT_Database::instance()->getConnection();
    $sql = 'delete from playlist_songs where id='.$this->id;
    $result = mysqli_query($conn, $sql);

    return $result;
  }

  public function update(){
    $conn = FT_Database::instance()->getConnection();
    $stmt = $conn->prepare("UPDATE playlist_songs SET playlist_id=?, song_id=? WHERE id=?");
    $stmt->bind_param("iii", $this->playlist_id, $this->song_id, $_POST['id']);
    $stmt->execute();
    $stmt->close();
  }
}
?>
