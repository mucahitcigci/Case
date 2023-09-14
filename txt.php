<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Comments</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <h1>Comments</h1>
    <ul id="comment-list">
        <?php
        $json_data = file_get_contents('data.json');
        $data = json_decode($json_data, true);

        foreach ($data['comments'] as $comment) {
            echo '<li>';
            echo '<h2>' . $comment['title'] . '</h2>';
            echo '<p>' . $comment['content'] . '</p>';
            
            // Alt yorum varsa
            if (!empty($comment['comment_to_comment'])) {
                echo '<ul>';
                echo '<li><strong>Yoruma Yanıt:</strong> ' . $comment['comment_to_comment'] . '</li>';
                echo '</ul>';
            }

            echo '</li>';
        }
        ?>
    </ul>
</body>
</html>

