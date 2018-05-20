<?php 
class ChiTietPlayList_Model{
    public $playlist_id;
    public $song_id;
    public function all(){
		$conn = FT_Database::instance()->getConnection();
		$sql = 'select * from chitietplaylists';
		$result = mysqli_query($conn, $sql);
		$list_chi_tiet_playlist = array();
		if(!$result)
			die('Error: '.mysqli_query_error());
		while ($row = mysqli_fetch_assoc($result)){
            $chi_tiet_playlist = new ChiTietPlayList_Model();
            $chi_tiet_playlist->playlist_id = $row['playlist_id'];
            $chi_tiet_playlist->song_id = $row['song_id'];
            $list_chi_tiet_playlist[] = $chi_tiet_playlist;          
        }
        return $list_chi_tiet_playlist;
	}
	public function save(){
		$conn = FT_Database::instance()->getConnection();
		$stmt = $conn->prepare("INSERT INTO chitietplaylists (playlist_id, song_id) VALUES (?, ?)");
		$stmt->bind_param("ii", $this->playlist_id, $this->song_id);
		$rs = $stmt->execute();
		$this->id = $stmt->insert_id;		
		$stmt->close();
		return $rs;
	}
	public function delete($playlist_id, $song_id){
		$conn = FT_Database::instance()->getConnection();
		$sql = 'delete from chitietplaylists where playlist_id ='.$playlist_id . ' AND song_id = ' . $song_id;
		$result = mysqli_query($conn, $sql);
		return $result;
	}
	public function update(){
		$conn = FT_Database::instance()->getConnection();
		$stmt = $conn->prepare("UPDATE chitietplaylists SET playlist_id=?, song_id=? WHERE id=?");
		$stmt->bind_param("iii", $this->playlist_id, $this->song_id, $_POST['id']);
		$stmt->execute();
		$stmt->close();
	}
}