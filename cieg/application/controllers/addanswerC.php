<?php
class AddanswerC extends CI_Controller{
  public function index(){

  }
  public function add(){
   $this->load->view('loginV');
    $username=$this->session->userdata("username");
    $qid=$this->input->post('id');
    $answer=$this->input->post('txt');
    $stmt=$this->db->conn_id->prepare("insert into answer(username,quesid,answer)values(?,?,?)");
    $stmt->bindValue(1,$username);
    $stmt->bindvalue(2,$qid);
    $stmt->bindValue(3,$answer);
    $stmt->execute();
    $show=$this->db->conn_id->query("Select * from answer where username= '".$username ."' and quesid='".$qid."'");
    while($row=$show->fetch(PDO::FETCH_ASSOC)){
	     if($show->rowCount()>0){
	        echo $row['username']."<br>";
	         echo nl2br($row['answer'])."<br><br>";
        }
    }
    echo "alert from controller";
  }
}
 ?>
