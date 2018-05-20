<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
class ChiTietPlayList_Controller extends Base_Controller
{
    /**
    * action index: show all chitietplaylists
    * method: GET
    */
    public function index()
    {        
        $this->model->load('ChiTietPlayList');
        $this->model->load('song');
        $this->model->load('PlayList');
        $list_chi_tiet_playlist = $this->model->ChiTietPlayList->all();
        $list_song = $this->model->song->all();
        $list_playlist = $this->model->PlayList->all();
        $data = array(
            'title' => 'index',
            'list_chi_tiet_playlist' => $list_chi_tiet_playlist,
            'list_song' => $list_song,
            'list_playlist' => $list_playlist
        );
        // Load view
        $this->view->load('chitietplaylists/index', $data);
    }
    /**
    * action show: show a ChiTietPlayList
    * method: GET
    */
    public function show()
    {        
        $this->model->load('ChiTietPlayList');
        $chitietplaylist = $this->model->ChiTietPlayList->findById($_GET['id']);
        $data = array(
            'title' => 'show',
            'chitietplaylist' => $chitietplaylist     
        );
        // Load view
        $this->view->load('chitietplaylists/show', $data);
    }
    /**
    * action create: create a ChiTietPlayList
    * method: GET
    */
    public function create()
    {        
        $this->model->load('song');
        $this->model->load('PlayList');
        $list_song = $this->model->song->all();
        $list_playlist = $this->model->PlayList->all(); 
        $data = array(
            'title' => 'index',
            'list_song' => $list_song,
            'list_playlist' => $list_playlist            
        );
        $this->view->load('chitietplaylists/create',$data);
    }
     /**
    * action store: save a ChiTietPlayList to database
    * method: POST
    */
    public function store()
    {        
        $this->model->load('ChiTietPlayList');
        $this->model->ChiTietPlayList->playlist_id = $_POST['playlist_id'];
        $this->model->ChiTietPlayList->song_id = $_POST['song_id'];
        
        $this->model->ChiTietPlayList->save();
        go_back();
    }
    /**
    * action edit: show form edit a ChiTietPlayList
    * method: GET
    */
    public function edit()
    {        
        $this->model->load('ChiTietPlayList');
        $this->model->load('song');
        $this->model->load('PlayList');
        $chitietplaylist = $this->model->ChiTietPlayList->findById($_GET['id']);
        $list_song = $this->model->song->all();
        $list_playlist = $this->model->PlayList->all(); 
        $data = array(
            'title' => 'edit',
            'chitietplaylist' => $chitietplaylist,
            'list_song' => $list_song,
            'list_playlist' => $list_playlist  
        );
        // Load view
        $this->view->load('chitietplaylists/edit', $data);
    }
    /**
    * action edit: update ChiTietPlayList database
    * method: POST
    */
    public function update()
    {        
        $this->model->load('ChiTietPlayList');
        $chitietplaylist = $this->model->ChiTietPlayList->findById($_POST['id']);
        $chitietplaylist->playlist_id = $_POST['playlist_id'];
        $chitietplaylist->song_id = $_POST['song_id'];        
        $chitietplaylist->update();
        go_back();
    }
    public function check_exist() {
        $conn = FT_Database::instance()->getConnection();
        $stmt = $conn->prepare("SELECT * FROM playlists WHERE playlist_id = ? AND song_id = ?");
        $stmt->bind_param("ii", $playlist_id, $song_id);
        $stmt->execute();
        $stmt->bind_result($id);
        $stmt->store_result();
        /*Fetch the value*/
        $stmt->fetch();
        if ($stmt->num_rows > 0) {
        return $stmt->num_rows;
        } else {
        return 0;
        }
    }   
    /**
    * action delete: show form edit a ChiTietPlayList
    * method: GET
    */
    public function delete() {        
        $this->model->load('ChiTietPlayList');
        // die($_GET['playlist_id']);
        $this->model->ChiTietPlayList->delete($_GET['playlist_id'], $_GET['song_id']);
        go_back();
    }
}