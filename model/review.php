<?php
require_once("../config/database.php");
class review{
    private $conn;
    private $table_name;

    /**
     * review constructor.
     * @param $conn
     * @param $table_name
     */
    public function __construct($conn, $table_name="review")
    {
        $this->conn = $conn;
        $this->table_name = $table_name;
    }

    function get_all($template){
        $sql = "select * from $this->table_name where template='$template'";
        return mysqli_query($this->conn,$sql);
    }

    function insert($template,$username,$star,$content){
        $s = "select * from templates where name = '$template'";
        $exist = mysqli_query($this->conn,$s)->fetch_assoc();
        if($exist!=null){
            $id = $exist["id"];
            $sql = "insert into review (template,username,star,content) values ('$id','$username', $star,'$content')";
            return mysqli_query($this->conn,$sql);
        }else{
            return false;
        }

    }

    static function render($review)
    {
        $user = $review["username"];
        $comment = $review["content"];
        $star = $review["star"];
        $remain = 5 - $star;
        echo("<div class='row mt-2'>");
        echo("<div class='col-3'>
                <span><i class='fa fa-user mr-2'></i><span>$user</span></span>
            </div>
            <div class='col-6 text-center'>
                <p>\" $comment \"</p>
            </div>
            <div class='col-3'>
        ");
        for ($i = 0; $i < $star; $i++) {
            echo("<span><i class='fas fa-star icon-yellow'></i></span>");
        }
        for ($i = 0; $i < $remain; $i++) {
            echo("<span><i class='fas fa-star'></i></span>");
        }
        echo("</div></div>");
    }
}
$review = new review($conn);
