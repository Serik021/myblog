<?php
  add_filter('comment_form_fields', 'kama_reorder_comment_fields' );
  function kama_reorder_comment_fields( $fields ){
    // die(print_r( $fields )); // посмотрим какие поля есть

    $new_fields = array(); // сюда соберем поля в новом порядке

    $myorder = array('author','email','url','comment'); // нужный порядок

    foreach( $myorder as $key ){
      $new_fields[ $key ] = $fields[ $key ];
      unset( $fields[ $key ] );
    }

    // если остались еще какие-то поля добавим их в конец
    if( $fields )
      foreach( $fields as $key => $val )
        $new_fields[ $key ] = $val;

    return $new_fields;
  }
  
    comment_form(array(
                        'fields' => array(
'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Use Your Real Name' ) . '</label> ' . '<input id="author" placeholder="Name" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $html_req . ' /></p>',
'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email Will not published' ) . '</label> ' . '<input id="email" placeholder="Email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . $aria_req . $html_req  . ' /></p>',
                                        ),
'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Write a good comment', 'noun' ) . '</label> <textarea id="comment" name="comment" cols="45" rows="8"  aria-required="true" required="required" placeholder="Comments"></textarea></p>',
                        'title_reply'          => ( 'Post A Comment'),
                        'id_form'              => 'commentform',
                        'id_submit'            => 'submit',
                        'comment_notes_before' => '',
                        'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="POST" />'

                )

    );
  ?>
  <?php wp_list_comments(); ?>