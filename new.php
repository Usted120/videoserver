<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<title><?php echo $_GET['title']; ?> | Le Chat Noir</title>
    
</head>

<body>
    <div id="videoContainter">
        <video class="video" controls autoplay preload="auto" src="<?php echo $_GET['url']; ?>" frameborder="0" />
    </div>
    <div id="resourceStat">
        <div>
        <img id="likeSvg" src="./resources/like.svg" width="40px" height="40px" alt="likeicon"> 
        <p> <?php echo 'lq' ?> </p> 
        </div>
        
        <div><img id="dislikeSvg" src="./resources/dislike.svg" width="40px" height="40px" alt="dislikeIcon"> 
        <p><?php echo 'dq' ?></p></div>
        
        <div>
        <h3 id="visit" >visitas: </h3>
        <p> <?php echo 'visit' ?> </p>
        </div>
    </div>

    <script src="new.js"></script>
<style>
    #resourceStat {
	display: flex;
	justify-content: space-evenly;
	}
</style>
</body>

</html>