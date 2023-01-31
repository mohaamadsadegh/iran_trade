<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>
  <?php if ( have_comments() ) { ?>
    <div class="title-comment-article">
       <h3>دیدگاه ها</h3>
       </div>
    
   <?php wp_list_comments('type=comment&avatar_size=80&callback=advanced_comment'); ?>
   
    <?php
      // Are there comments to navigate through?
      if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
    ?>
    <nav class="navigation comment-navigation" role="navigation">
      <h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'twentythirteen' ); ?></h1>
      <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'twentythirteen' ) ); ?></div>
      <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'twentythirteen' ) ); ?></div>
    </nav><!-- .comment-navigation -->
    <?php endif; // Check for comment navigation ?>
  <?php   } else {
      ?>
      <div class="title-not-comment">
      <h1>دیدگاه ها</h1>
  </div>
      <div class="not-comment">
        <h2>دیدگاهی وجود ندارد</h1>
      </div>
      <?php
    } // have_comments() ?>

  <div class="title-comment-article">
     <h3>افزودن دیدگاه</h3>
  </div>


  <div class="comment-respond rtl_form_comment">
  <?php
  if (!is_user_logged_in()) {
    $submit_field = 'btn_none';
    $comment_field = '';
  } else {
    $submit_field = '';
    $comment_field = '<div class="inputt-comments"><div class="w-full text-input-comment"><textarea class="border-2-slate-300	rounded-3xl	p-6" id="comment" name="comment" rows="8" cols="58" placeholder="متن شما " required ></textarea></div></di>';
   
  }
  
  if (comments_open()) :
    $current_user = wp_get_current_user();
    $commenter = wp_get_current_commenter();
    $comment_form = array(
      /* translators: %s is post title */
      'class_form' => 'comment-form form-comment',
      'title_reply' => have_comments() ? esc_html__('', 'rtl_domain') : sprintf(esc_html__('', 'rtl_domain'), get_the_title()),
      'title_reply_to' => esc_html__('در جواب به %s', 'rtl_domain'),
      'comment_notes_before' => '',
      'comment_notes_after' => '',
      'submit_field' => '<div class="' . $submit_field . '">%1$s %2$s</div></div>',
      'class_submit' => 'submit-btn',
      'label_submit' => esc_html__('ارسال دیدگاه', 'rtl_domain'),
      'logged_in_as' => '<p class="logged-in-as">' .
        sprintf(
          __('شما به عنوان <a target="_blank" href="%1$s">%2$s</a> وارد شده اید .<a href="%3$s"> خارج می شوید ؟</a>'),
          admin_url('profile.php'),
          $current_user->display_name,
          wp_logout_url(apply_filters('the_permalink', get_permalink()))
        ) . '</p>',
      'comment_field' => $comment_field,
    );
  

  $name_email_required = (bool)get_option('require_name_email', 1);
  $fields = array(
    'author' => array(
      'placeholder' => __('نام و نام خانوادگی', 'rtl_domain'),
      'type' => 'text',
      'value' => $commenter['comment_author'],
      'required' => $name_email_required,
    ),
    'email' => array(
      'placeholder' => __('پست الکترونیکی', 'rtl_domain'),
      'type' => 'email',
      'value' => $commenter['comment_author_email'],
      'required' => $name_email_required,
    ),
  );

  $comment_form['fields'] = array();
  $rtl_form_comment_inputs = '';
  foreach ($fields as $key => $field) {
    
    $rtl_form_comment_inputs .= '<input class="w-full input-comment name-input-svg mb-5" id="' . esc_attr($key) . '" type="' . esc_attr($field['type']) . '" name="' . esc_attr($key) . '" placeholder="' . esc_attr($field['placeholder']) . ($field['required'] ? ' (الزامی)' : '') . '" value="' . esc_attr($field['value']) . '"' . ($field['required'] ? 'required' : '') . ' />';
    $name ='<div class="col-12 col-md-4 box-user-comment"><input class="form-box-name " type="text" name="name" placeholder=" نام ونام خانوادگی">' . esc_attr( $commenter['comment_author'] ) .' ';

    $email ='<label></label><input class="form-box-email " type="email" name="email" placeholder=" پست الکترونیکی">'  . esc_attr(  $commenter['comment_author_email'] ) .' ';
  
  }
  $comment_submit = '<button class="submit-btn" id="submit-btn" name="submit" type="submit" class="submit-btn">ارسال دیدگاه</button>';
  $comment_field2 =  '<div class="row form-comment-article">' .$name .$email.$comment_submit.'</div>'.'<div class="col-12 col-md-8 box-type-comment"><label for="msg" class="Comment-text"></label><textarea id="comment" placeholder="متن شما" name="comment" cols="58" rows="3" aria-required="true" class="box-text-form col-md-6"></textarea>' .'</textarea>'.'</div>';
  
  $comment_form['fields']['author'] =  $comment_field2;


  $comment_form['must_log_in'] = '<p class="must-log-in">' .
    sprintf(
      __('برای نوشتن دیدگاه ابتدا باید <a target="_blank" href="%s">وارد پروفایل خود شوید.</a>'),
      wp_login_url(apply_filters('the_permalink', get_permalink()))
    ) . '</p>';


  comment_form($comment_form);

endif;
?>

</div>




















