<?php 
    class spendTime {
        public function startSessionBlock(){
            if(isset($_SESSION['block'])){
                $time = 60;
                $restartTries = time() - $_SESSION['block'];
                if($restartTries > $time){
                    return $restartTries;
                    print $restartTries;
                } 
                else{
                    $_SESSION['block'] = 0;
                }
            }
        }
    }
?>