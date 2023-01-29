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


<?php if ( comments_open()) : ?>
  <?php
  $args = array(
  'id_form'           => 'commentform',
  'id_submit'         => 'submit',
  'class_submit'         => 'btn btn-success has_icon',
  'title_reply'       => __( '' ),
  'title_reply_to'    => __( 'ارسال پاسخ به %s' ),
  'cancel_reply_link' => __( 'لغو پاسخ' ),
  'label_submit'      => __( 'Post Comment' ),

  'comment_field' =>  '<div class="row form-comment-article"><div class="col-12 col-md-8"><label for="msg" class="Comment-text"></label><textarea id="comment" placeholder="متن شما" name="comment" cols="58" rows="3" aria-required="true" class="box-text-form col-md-6"></textarea>' .'</textarea>'.'</div>',
  

  
  'must_log_in' => 'برای ارسال نظر باید وارد شوید',

  'logged_in_as' => '<p class="logged-in-as">' .
    sprintf(
    __( 'شما با حساب کاربری  <a href="%1$s">%2$s</a> وارد شده‌اید. <a href="%3$s" title="خروج از این حساب کاربری ">خارج می‌شوید؟</a>' ),
      admin_url( 'profile.php' ),
      $user_identity,
      wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
    ) . '</p>',

  'comment_notes_before' => '',

  'comment_notes_after' => '',

  'fields' => apply_filters( 'comment_form_default_fields', array(

    'author' =>'<div class="col-12 col-md-4"><input class="form-box-name " type="text" name="name" placeholder=" نام ونام خانوادگی">' . esc_attr( $commenter['comment_author'] ) .' ',

    'email' =>'<label></label><input class="form-box-email " type="email" name="email" placeholder=" پست الکترونیکی">'  . esc_attr(  $commenter['comment_author_email'] ) .' </div>',
    
    )
  ),
  
);

comment_form( $args, get_the_ID() );
?>
</div>

<?php endif; ?>
