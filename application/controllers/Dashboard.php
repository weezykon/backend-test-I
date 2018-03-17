<?php
class Dashboard extends CI_Controller {

    public function __construct()
	{
        parent::__construct();
        $this->load->library('user_agent');
        date_default_timezone_set('Africa/Lagos');
        $this->twitteruser = "weezykon";
        $this->notweets = 100;
        $this->consumerkey = "kp9zGnKnuVUwamoMdN5g";
        $this->consumersecret = "xMDkeqhkM2A9aVSmucpv9fbOomDObtPgDHmWjv7cL8";
        $this->accesstoken = "149474254-XhXgQ9PLMs2bc6Ada09EIUwy8qhf2Zo2R8NL0zOe";
        $this->accesstokensecret = "7SHzfjUuucauVKX4vSQKkXNXj8TbnTqlgYF1fHT9ncJkv";
    }
    
    public function index(){
        $this->load->view("partials/header.php");
        $this->load->view("tweet.php");
        $this->load->view("partials/footer.php");
    }

    public function hashtag(){
        if($this->input->post()){
            $req = $this->input->post();
            $data['users'] = [];
            // $hash = explode(",", $req['hashtag']);
            $hash = explode(", ", $req['hashtag'][0]);
            foreach ($hash as $key => $value) {
                $connection = $this->bot->getConnectionWithAccessToken($this->consumerkey, $this->consumersecret, $this->accesstoken, $this->accesstokensecret);
        
                $hashtag = "%23".$value;
                $users = $connection->get("https://api.twitter.com/1.1/search/tweets.json?q=".$hashtag."&count=".$this->notweets);
                
                $fetch = json_decode(json_encode($users), True);
                foreach ($fetch['statuses'] as $key => $value) {
                    $followers = $value['user']['followers_count'];
                    if($followers >=1000 && $followers <=5000){
                        array_push($data['users'],array('tweet'=>$value['text'],'user'=>$value['user'])); 
                    }
                }
                $this->load->view("data.php", $data);
            }
        }
    }
}