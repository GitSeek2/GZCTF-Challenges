<?php
$comments = file_get_contents('../data/comment.txt');
$comments = explode('---', $comments);

foreach ($comments as $comment) {
    $comment = trim($comment);
    if (!empty($comment)) {
        $parts = explode("\n", $comment);
        $user = str_replace('user:', '', $parts[0]);
        $text = str_replace('text:', '', $parts[1]);
        $date = str_replace('date:', '', $parts[2]);

        echo '<div class="col-md-4">';
        echo '<div class="card mt-3 ms-0">';
        echo '<div class="card-header text-white-50">' . htmlspecialchars($user) . ' - ' . htmlspecialchars($date) . '</div>';
        echo '<div class="card-body">';
        echo '<p class="card-text">' . htmlspecialchars($text) . '</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
}
?>