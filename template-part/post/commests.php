<?php  
printf('<div style="top:5em" class="archivo">Pagina de comments.php</div>');
comment_form();

printf('<ol>');
 wp_list_comments();
printf('</ol>');
?>
<!-- Este metdo se agrega en single -->
<!-- comments_template(); -->