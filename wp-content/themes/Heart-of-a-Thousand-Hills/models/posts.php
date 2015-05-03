<?php

require_once (dirname(__FILE__) . '/authors.php');

class Post {

// private static $img = array("keyboard.png","blog-archive3.png","blog-archive2.png","blog-archive.png", "leadtext.jpeg");
// private static $imgmin = array("keyboard.min.png","blog-archive3.min.png","blog-archive2.min.png","blog-archive.min.png", "leadtext.min.jpg");


private static $img = array( "archive1.jpg", "archive2.jpg", "archive3.jpg", "archive4.jpg", "archive5.jpg", "archive6.jpg", "archive7.jpg", "archive8.jpg", "archive9.jpg", "archive10.jpg", "archive11.jpg", "archive12.jpg");
private static $imgmin = array("archive1.min.jpg", "archive2.min.jpg", "archive3.min.jpg", "archive4.min.jpg", "archive5.min.jpg", "archive6.min.jpg", "archive7.min.jpg", "archive8.min.jpg", "archive9.min.jpg", "archive10.min.jpg", "archive11.min.jpg", "archive12.min.jpg");
private static $imginc = 0;

  function __construct($postid) {

    if($postid !== -1) {
        $post = get_post($postid);
        $this->postid = $postid;
        $this->author = new Author($post->post_author);
        $this->title = $post->post_title;
        $this->postdate = date('F j, Y', strtotime($post->post_date));
        $this->setCategoryText(); //sets categorytext and categorycolor
        $this->headerimageurl = $this->setPostImage('post_header_image');
        $this->postlistimageurl = $this->setPostImage('post_list_image');
        $this->content = $this->setContent($post->post_content);
        $this->permalink = get_permalink($this->postid);
        $this->excerpt = $this->setExcerpt($post);
        $this->timesincepost = $this->setTimeSincePost();
        $this->isAd = false;
    } else {
        $this->isAd = $postid;
    }
  

  }

  function setCategoryText(){
    $catslugs = '';
    $post_categories = wp_get_post_categories($this->postid);
    foreach ($post_categories as $c)
    {
      $cat = get_category( $c );

      switch ($cat->slug) {
        case "deals":
          $cssclass = "orange";
          $text = "deals";
          break;
        case "learning":
          $cssclass = "pink";
          $text = "learning";
          break;
        case "news":
          $cssclass = "purple";
          $text = "news";
          break;
        case "interviews":
          $cssclass = "teal";
          $text = "interviews";
          break;
        case "ulc":
          $cssclass = "blue";
          $text = "u&lc";
          break;
      }

      //var_dump($cat->slug);

    }

    if(!isset($cssclass)){
       $cssclass = "grey";
       $text = "archive";
    }

    $this->categorytext = ucfirst($text);
    $this->categorycolor = $cssclass;
    $this->categoryid = get_cat_ID( $this->categorytext );
  }

  function setPostImage($imagetype){
    $addstyle = '';


    $image = get_field($imagetype, $this->postid);

    if (!empty($image))
    {
      $addstyle = ' style="background-image: url(' . $image['sizes']['large'] . ');"';
    } else {
      $img = ($imagetype === 'post_header_image') ? self::$img : self::$imgmin;

      $addstyle = ' style="background-image: url('.get_bloginfo('template_directory').'/images/'.$img[rand(0, 11)].');"';
    }
    return ucfirst($addstyle);
  }

  function setContent($content){
    return apply_filters('the_content', $content);
  }

  function setExcerpt($post){
    $length = 50;
    $extra = ' . . .';

    if(has_excerpt($post->ID)) {
      $the_excerpt = $post->post_excerpt;
      remove_filter('the_excerpt', 'wpautop');
      $the_excerpt = strip_tags($the_excerpt);
    } else {
      $the_excerpt = $post->post_content;
    }

    $the_excerpt = strip_tags($the_excerpt);
    $the_excerpt = preg_split('/\b/', $the_excerpt, $length * 2+1);
    $excerpt_waste = array_pop($the_excerpt);
    $the_excerpt = implode($the_excerpt);
    $the_excerpt .= $extra;


    remove_filter('the_content', 'wpautop');
    return apply_filters('the_content', $the_excerpt);
  }

  function setTimeSincePost() {
    return human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago';
  }

}

class Grid {
  function __construct($posttotal) {
    $this->currentRow = 1;
    $this->currentCol = 1;
    $this->colTaken = 0;
    $this->posttotal = $posttotal ?: -1;
    $this->postcount = 0;

    $this->grid = array(
      1 => array("row" => array(1 => 2,2 => 1,3 => 1,)),
      2 => array("row" => array(1 => 1,2 => 1,3 => 1,4 => 1)),
      3 => array("row" => array(1 => 1,2 => 1,3 => 2)),
      4 => array("row" => array(1 => 1,2 => 2,3 => 1)),
      5 => array("row" => array(1 => 1,2 => 1,3 => 1,4 => 1))
    );
  }

  function setGridClass(){
    //add col count to colTaken
    if($this->grid[$this->currentRow]["row"][$this->currentCol] == 1){
      $gridClass = "large-3 medium-6";
    } else {
      $gridClass = "large-6 medium-6";
    }

    $this->postcount++;
    if($this->postcount == $this->posttotal){
      $gridClass = $gridClass." end";
    }

    $this->colTaken = $this->colTaken + $this->grid[$this->currentRow]["row"][$this->currentCol++];

    //reset if row amount has been reached. 
    if($this->colTaken == 4){
      $this->currentCol = 1;
      $this->colTaken = 0;
      $this->currentRow++;
    }

    // Reset grid if rows count is exceded 
    if($this->currentRow > count($this->grid)){
      $this->currentRow = 1;
    }

    return $gridClass;
  }

  function isCategory(){
    $pos = strrpos($_SERVER['REQUEST_URI'], "/category/");
    if ($pos === false) { 
        return "nada";
    } else {
      echo "da";
    }


  }

}



?>