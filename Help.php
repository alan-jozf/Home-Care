<!DOCTYPE html>
<html lang="en">
<head>
    <title> Chatbot</title>
    <link rel="stylesheet" href="css/chatbot.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
    <script src="script/jquery-3.5.1.min.js"></script>
</head>
<body>
    <?php 
        require("Topbar.php"); 
        $_SESSION['btn']="";
    ?> 
    <div class="homepage">
        <div class="wrapper">
            <div class="title">Chatbot</div>
            <div class="form">
                <div class="bot-inbox inbox">
                    <div class="icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="msg-header">
                        <?php
                            include('php/config.php');        
                            $quer="select * from chat_qstn where cq_id='1'";
                            $resul=mysqli_query($con,$quer);
                            $ro=mysqli_fetch_array($resul);
                            echo "<p>".$ro['question']."</p>";
                            ?>
                            <div class="msg-optn">
                        <?php
                            $query="select * from chat_optn where cq_id='1'";
                            $result=mysqli_query($con,$query);
                            $bt=0;
                            while($row=mysqli_fetch_array($result)){
                                $bt++;
                                echo "<input class='option-btn' id='$bt' name='btn' type='button' value='".$row['options']."' >&nbsp";
                            }?>
                            </div><?php
                        ?>
                    </div>
                </div>
            </div>
            <div class="typing-field">
                <div class="input-data">
                    <input id="data" type="text" placeholder="Type something here.." required>
                    <button id="send-btn">Send</button>
                </div>
            </div>
        </div>
    </div>
    <script>
			
		// ajax for button input
		$(document).ready(btnclickloader);
			function btnclickloader(){
            $(".option-btn").on("click", function(){
                $value = $(this).val();
				 console.log("clicked value : ", $value);
                $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';
                $(".form").append($msg);
                // $(this).val('');
				// document.getElementsByClassName('msg-optn')[0].remove();
				$(".msg-optn").remove();
				console.log("msgoption delted");
                
                // start ajax code
                $.ajax({
                    url: 'php/bot_option.php',
                    type: 'POST',
                    data: 'btn='+$value,
                    success: function(result){
						console.log(result);
                        // $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header">'+ result +'</div></div>';
                        $(".form").append(result);
						btnclickloader();
						// when chat goes down the scroll bar automatically comes to the bottom
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
            });
        }


		// ajax for Text input
        $(document).ready(function(){
            $("#send-btn").on("click", function(){
                $value = $("#data").val();
                $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';
                $(".form").append($msg);
                $("#data").val('');
                
                // start ajax code
                $.ajax({
                    url: 'php/bot_text.php',
                    type: 'POST',
                    data: 'text='+$value,
                    success: function(result){
                        $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                        $(".form").append($replay);
                        // when chat goes down the scroll bar automatically comes to the bottom
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
            });
        });

    </script>
    
</body>
</html>
