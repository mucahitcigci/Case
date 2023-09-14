<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
    <title>Web Master Case-1</title>
    <style>
       
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
          
            <div class="col-lg-2 col-md-3 col-sm-4 col-12 col-left">
            <div class="card">
                <div class="col align-self-center">
    <div class="menu-item">
        <i class="fas fa-home icon"></i>
        <span class="menu-text">  <i class="fas fa-home icx"></i> Anasayfa</span>
    </div>
    <div class="menu-item">
        <i class="fas fa-user icon"></i>
        <span class="menu-text">  <i class="fas fa-user icx"></i>Hesap</span>
    </div>
    <div class="menu-item">
        <i class="fas fa-bell icon"></i>
        <span class="menu-text"><i class="fas fa-bell  icx"></i>Bildirimler</span>
    </div>
    <div class="menu-item">
        <i class="fas fa-envelope icon"></i>
        <span class="menu-text"> <i class="fas fa-envelope icx"></i>Mesajlar</span>
    </div>
    <div class="menu-item">
        <i class="fas fa-cog icon"></i>
        <span class="menu-text"> <i class="fas fa-cog icx"></i>Ayarlar</span>
    </div>
    </div>
</div>

            </div>
            <div class="col-lg-7 col-md-6 col-sm-8 col-12">
              
                <main class="col-md-8 ms-sm-auto col-lg-12 px-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                    <h4>Anasayfa</h4>
                  <hr style="color:gray;">
                        <form>
                            <div class="form-group">
                                <textarea class="form-control" rows="3" placeholder="Ne düşünüyorsunuz?"></textarea>
                            </div>
                            <button type="submit" class="btn" style="float: right; margin-top:4px">Yorum Yap</button>
                        </form>
                    </div>
                </div>       
                <div class="card mb-4">
                    <div class="card-body">
                        <ul id="comment-list">
                            <?php
                            $json_data = file_get_contents('data.json');
                            $data = json_decode($json_data, true);

                            foreach ($data['comments'] as $comment) {
                                echo '<li>';
                                echo '<h3>' . $comment['title'] . '</h3>' ;
                                echo '<p class="icerik">' . $comment['content'] . '</p>';
                                
                                // Alt yorum varsa
                                if (!empty($comment['comment_to_comment'])) {
                                    echo '<ul>';
                                    echo '<li class="alt-yorum"> <strong> Yanıt:</strong> ' . $comment['comment_to_comment'] . '</li>';
                                    echo '</ul>';
                                }

                                echo '</li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </main>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-12 col-right">
                <div class="row">
                    <div class="card">
                    <div class="col-12">
                        <h4>Trendler</h4>  
                        <ul id="comment-list">
                                <?php   foreach ($data['comments'] as $comment) { echo '<li>';
                                 echo '<small>'.$comment['time'] . '</small>';
                                 echo '<p class="icerik">' . $comment['title'] . '</p>';  
                                
                                 echo '</li>';} ?>
                                  </ul>
                    </div>
                        </div><div class="card" style="margin-top:4px">
                    <div class="col-12" >
                        <h4>Keşfet</h4>
                        <ul id="comment-list">
                                <?php   foreach ($data['comments'] as $comment) { echo '<li>';
                                 echo '<small>'.$comment['time'] . '</small>';
                                 echo '<p class="alt-yorum">' . $comment['content'] . '</p>';  
                                
                                 echo '</li>';} ?>
                                  </ul>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
