<?php
/** 
*Plugin Name: Form Plugin
*/


function form_plugin()
{

    $content = '';
    $content .= '<h2>Welcome!</h2>';
    $content .= '<form method="post" action= "http://localhost/g5strategie/thank-you/?preview_id=468&preview_nonce=1f982fcccc&preview=true">';
    $content .= '<label for="your_name">Prenom</label>';
    $content .= '<input type="text" name="your_name" class="form-control" placeholder="Enter your first name"/>';

    $content .= '<label for="your_name">Nom</label>';
    $content .= '<input type="text" name="your_name" placeholder="Enter your name"/>';


    $content .= '<label for="your_email">Email</label>';
    $content .= '<input type="email" name="your_email" class="form-control" placeholder="Enter your Email"/>';

    $content .= '<label for="your comments">Questions or Comments</label>';
    $content .= '<textarea name="your_comments" class="form-control" placeholder="Enter your questions or comments "></textarea>';


    $content .= '<br /><input type="submit" name="example_form_submit" class=btn btn-md btn-primary name="Envoyer" value=" Send your informations "/>';
    $content .= '</form>';

    return $content;

}

add_shortcode('example_form', 'form_plugin');


function example_form_capture()
{

   if(isset($_POST['example_form_submit']))
   {

      $name = sanitize_text_field($_POST['your_name']);
      $email = sanitize_text_field($_POST['your_email']);
      $comments = sanitize_textarea_field($_POST['your_comments']);

      $to = 'yakhine@gmail.com';
      $subject = 'Test form';
      $message = ''.$name.' - '.$email.' - '.$comments;  

      wp_mail($to,$subject,$message);
    }

}
add_action('wp_head','example_form_capture');



?>