<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class song_Controller extends Base_Controller
{
    /**
    * action index: show all songs
    * method: GET
    */
    public function index()
    {
        $this->model->load('song');
        $list_song = $this->model->song->all();
        $data = array(
            'title' => 'index',
            'list_song' => $list_song
        );

        // Load view
        $this->view->load('songs/index', $data);
    }

    /**
    * action show: show a song
    * method: GET
    */
    public function show()
    {
        $this->model->load('song');
        $song = $this->model->song->findById($_GET['id']);
        $data = array(
            'title' => 'show',
            'song' => $song
        );

        // Load view
        $this->view->load('songs/show', $data);
    }

    /**
    * action create: create a song
    * method: GET
    */
    public function create()
    {
        
        $this->view->load('songs/create');
    }

     /**
    * action store: save a song to database
    * method: POST
    */
    public function store()
    {
        $this->model->load('song');
        $this->model->song->name = $_POST['name'];
        $this->model->song->image = $_POST['image'];
        $this->model->song->mota = $_POST['mota'];
        $this->model->song->save();

        go_back();
    }

    /**
    * action edit: show form edit a song
    * method: GET
    */
    public function edit()
    {
        $this->model->load('song');
        $song = $this->model->song->findById($_GET['id']);
        $data = array(
            'title' => 'edit',
            'song' => $song
        );

        // Load view
        $this->view->load('songs/edit', $data);
    }

    /**
    * action edit: update song database
    * method: POST
    */
    public function update()
    {
        $this->model->load('song');
        $song = $this->model->song->findById($_POST['id']);
        $song->name = $_POST['name'];
        $song->image = $_POST['image'];
        $song->mota = $_POST['mota'];            ;
        $song->update();

        go_back();
    }

    /**
    * action delete: show form edit a song
    * method: GET
    */
    public function delete()
    {
        $this->model->load('song');
        $song = $this->model->song->findById($_GET['id']);
        $song->delete();

        go_back();
    }
}
