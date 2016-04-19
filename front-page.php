<?php get_header(); ?>

<!-- only 1 post -->
<section class="firstlatest-post">
<?php
// Query
  $args = array (
    'post_type' => array( 'post','film_news','sports_news','news', ),
    'posts_per_page' => 1, 'order'     => 'DESC',
  );
  $query = new WP_Query( $args );

  // The Loop
  if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
      $query->the_post();
?>
<article class="firstpost">
    <div class="article-wrapper">
    <a href="<?php the_permalink(); ?>">
      <div class="article-image">
        <?php the_post_thumbnail( 'category-thumb', array('class' => 'img-responsive') ); ?>
      </div>
      <div class="article-body">
        <div class="title">
          <?php echo '<h4>' . get_the_title() . '</h4>'; ?>
        </div>
        <div class="description">
            <p> <?php
             echo excerpt(25);

             ?> </p>
        </div>
    </div>
    </a>
    </div>
</article>
<?php
}} else {
  // no posts found
  echo "<span> No content in wordpress database </span>";
}
wp_reset_postdata();
?>
</section>

<section class="latest-post">
  <div class="second-large">
<?php
// Query
  $args = array (
    'post_type' => array( 'post','film_news','sports_news','news', ),
    'posts_per_page' => 3, 'offset' => 1,
    'order'     => 'DESC',
  );
  $query = new WP_Query( $args );
  // The Loop
  if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
      $query->the_post();
?>
<article class="nextlatest-post matchheight">
    <div class="article-wrapper">
    <a href="<?php the_permalink(); ?>">
      <div class="article-header">
        <?php the_post_thumbnail( 'category-thumb', array('class' => 'img-responsive') ); ?>
      </div>
      <div class="article-body">
        <div class="title">
          <?php echo '<h1>' . get_the_title() . '</h1>'; ?>
        </div>
        <div class="description">
            <p> <?php  echo excerpt(10);  ?> </p>
        </div>
      </div>
    </a>
    </div>
</article>

<?php
}} else {
  // no posts found
  echo "<span> No content in wordpress database </span>";
}
// Restore original Post Data
wp_reset_postdata();
?>
</div>
</section>

<section class="latest-post">
  <div class="second-large">
<?php
// Query
  $args = array (
    'post_type' => array( 'post','film_news','sports_news','news', ),
    'posts_per_page' => 3, 'offset' => 7,
    'order'     => 'DESC',
  );
  $query = new WP_Query( $args );
  // The Loop
  if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
      $query->the_post();
?>
<article class="nextlatest-post matchheight">
    <div class="article-wrapper">
    <a href="<?php the_permalink(); ?>">
      <div class="article-header">
        <?php the_post_thumbnail( 'category-thumb', array('class' => 'img-responsive') ); ?>
      </div>
      <div class="article-body">
        <div class="title">
          <?php echo '<h1>' . get_the_title() . '</h1>'; ?>
        </div>
        <div class="description">
            <p> <?php  echo excerpt(10);  ?> </p>
        </div>
      </div>
    </a>
    </div>
</article>

<?php
}} else {
  // no posts found
  echo "<span> No content in wordpress database </span>";
}
// Restore original Post Data
wp_reset_postdata();
?>
</div>
</section>
<!-- mini card -->
<section class="mini-latest">
<?php
// Query
  $args = array (
    'post_type' => array(
                  'post','film_news','sports_news','news',
                  ),
    'posts_per_page' => 12,
    'offset' => 8,
    'order'     => 'DESC',
  );
  $query = new WP_Query( $args );

  // The Loop
  if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
      $query->the_post();
?>
    <div class="mini-card">
    <div class="mini-card-wrapper">
    <a href="<?php the_permalink(); ?>">
      <div class="mini-card-image">
        <?php the_post_thumbnail( 'category-thumb', array('class' => 'img-responsive') ); ?>
      </div>
      <div class="mini-card-content">
        <div class="mini-card-title">
          <?php echo '<h4>' . get_the_title() . '</h4>'; ?>
        </div>
    </div>
    </a>
    </div>
    </div>

<?php
}} else {
  // no posts found
  echo "<span> No content in wordpress database </span>";
}
// Restore original Post Data
wp_reset_postdata();
?>
</section>
<!-- local section -->
<section class="newssec">
  <h5 class="sectiontitle"><span class="localnews-icon"> </span> local </h5>
  <?php
  // Query
    $args = array (
      'post_type' => array( 'news', ),
      'posts_per_page' => 1,
      'order'     => 'DESC',
      'tax_query' => array(
            array(
                'taxonomy' => 'new',
                'field' => 'slug',
                'terms' => 'local',
                'operator' => 'IN'
            )
        )
    );
  $query = new WP_Query( $args );
  // The Loop
  if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
      $query->the_post();
?>
  <article class="secondary-large secondfs">
    <a href="<?php the_permalink(); ?>">
      <div class="figure">
        <?php the_post_thumbnail( 'category-thumb', array('class' => 'img-responsive') ); ?>
      </div>
      <div class="story-content">
        <div class="title">
          <?php echo '<h1>' . get_the_title() . '</h1>'; ?>
          <div class="description">
              <p> <?php  echo excerpt(200);  ?> </p>
          </div>
        </div>
    </div>
    </a>
  </article>
<?php
}} else {
  // no posts found
  echo "<span> No content @local news in wordpress database </span>";
}
// Restore original Post Data
wp_reset_postdata();
?>
<!--  -->
<article class="secondary-mini secondfs">
<?php
// Query
  $args = array (
    'post_type' => array( 'news', ),
    'posts_per_page' => 6,
    'offset' => 1,
    'order'     => 'DESC',
    'tax_query' => array(
          array(
              'taxonomy' => 'new',
              'field' => 'slug',
              'terms' => 'local',
              'operator' => 'IN'
          )
      )
  );
$query = new WP_Query( $args );
// The Loop
if ( $query->have_posts() ) {
  while ( $query->have_posts() ) {
    $query->the_post();
?>

  <div class="secondary-mini-wrapper">
  <a href="<?php the_permalink(); ?>">
    <div class="figure">
      <?php the_post_thumbnail( 'category-thumb', array('class' => 'img-responsive') ); ?>
    </div>
    <div class="story-content">
      <div class="title">
        <?php echo '<h1>' . get_the_title() . '</h1>'; ?>
        <div class="description">
            <!-- <p> <?php // echo excerpt(10);  ?> </p> -->
        </div>
      </div>
  </div>
  </a>
</div>

<?php
}} else {
// no posts found
echo "<span> No content @local news in wordpress database </span>";
}
// Restore original Post Data
wp_reset_postdata();
?>
</article>
<!--  -->
</section>

<!-- local section -->
<!-- national section -->
<section class="newssec">
  <h5 class="sectiontitle"><span class="national-icon"> </span> national </h5>
  <?php
  // Query
    $args = array (
      'post_type' => array( 'news', ),
      'posts_per_page' => 1,
      'order'     => 'DESC',
      'tax_query' => array(
            array(
                'taxonomy' => 'new',
                'field' => 'slug',
                'terms' => 'national',
                'operator' => 'IN'
            )
        )
    );
  $query = new WP_Query( $args );
  // The Loop
  if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
      $query->the_post();
?>
  <article class="secondary-large secondfs">
    <a href="<?php the_permalink(); ?>">
      <div class="figure">
        <?php the_post_thumbnail( 'category-thumb', array('class' => 'img-responsive') ); ?>
      </div>
      <div class="story-content">
        <div class="title">
          <?php echo '<h1>' . get_the_title() . '</h1>'; ?>
          <div class="description">
              <p> <?php  echo excerpt(200);  ?> </p>
          </div>
        </div>
    </div>
    </a>
  </article>
<?php
}} else {
  // no posts found
  echo "<span> No content @national news in wordpress database </span>";
}
// Restore original Post Data
wp_reset_postdata();
?>
<!--  -->
<article class="secondary-mini secondfs">
<?php
// Query
  $args = array (
    'post_type' => array( 'news', ),
    'posts_per_page' => 6,
    'offset' => 1,
    'order'     => 'DESC',
    'tax_query' => array(
          array(
              'taxonomy' => 'new',
              'field' => 'slug',
              'terms' => 'national',
              'operator' => 'IN'
          )
      )
  );
$query = new WP_Query( $args );
// The Loop
if ( $query->have_posts() ) {
  while ( $query->have_posts() ) {
    $query->the_post();
?>

  <div class="secondary-mini-wrapper">
  <a href="<?php the_permalink(); ?>">
    <div class="figure">
      <?php the_post_thumbnail( 'category-thumb', array('class' => 'img-responsive') ); ?>
    </div>
    <div class="story-content">
      <div class="title">
        <?php echo '<h1>' . get_the_title() . '</h1>'; ?>
        <!-- <div class="description">
            <p> <?php // echo excerpt(10);  ?> </p>
        </div> -->
      </div>
  </div>
  </a>
</div>

<?php
}} else {
// no posts found
echo "<span> No content @national news in wordpress database </span>";
}
// Restore original Post Data
wp_reset_postdata();
?>
</article>
<!--  -->
</section>
<!-- national section -->
<!-- international section -->
<div class="row">
<section class="newssec">
  <h5 class="sectiontitle"><span class="international-icon"> </span> international </h5>
  <?php
  // Query
    $args = array (
      'post_type' => array( 'news', ),
      'posts_per_page' => 1,
      'order'     => 'DESC',
      'tax_query' => array(
            array(
                'taxonomy' => 'new',
                'field' => 'slug',
                'terms' => 'international',
                'operator' => 'IN'
            )
        )
    );
  $query = new WP_Query( $args );
  // The Loop
  if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
      $query->the_post();
?>
  <article class="secondary-large secondfs">
    <a href="<?php the_permalink(); ?>">
      <div class="figure">
        <?php the_post_thumbnail( 'category-thumb', array('class' => 'img-responsive') ); ?>
      </div>
      <div class="story-content">
        <div class="title">
          <?php echo '<h1>' . get_the_title() . '</h1>'; ?>
           <div class="description">
              <p> <?php  echo excerpt(200);  ?> </p>
          </div>
        </div>
    </div>
    </a>
  </article>
<?php
}} else {
  // no posts found
  echo "<span> No content @international news in wordpress database </span>";
}
// Restore original Post Data
wp_reset_postdata();
?>
<!--  -->
<article class="secondary-mini secondfs">
<?php
// Query
  $args = array (
    'post_type' => array( 'news', ),
    'posts_per_page' => 6,
    'offset' => 1,
    'order'     => 'DESC',
    'tax_query' => array(
          array(
              'taxonomy' => 'new',
              'field' => 'slug',
              'terms' => 'international',
              'operator' => 'IN'
          )
      )
  );
$query = new WP_Query( $args );
// The Loop
if ( $query->have_posts() ) {
  while ( $query->have_posts() ) {
    $query->the_post();
?>

  <div class="secondary-mini-wrapper">
  <a href="<?php the_permalink(); ?>">
    <div class="figure">
      <?php the_post_thumbnail( 'category-thumb', array('class' => 'img-responsive') ); ?>
    </div>
    <div class="story-content">
      <div class="title">
        <?php echo '<h1>' . get_the_title() . '</h1>'; ?>
        <!-- <div class="description">
            <p> <?php  //echo excerpt(10);  ?> </p>
        </div> -->
      </div>
  </div>
  </a>
</div>

<?php
}} else {
// no posts found
echo "<span> No content @international news in wordpress database </span>";
}
// Restore original Post Data
wp_reset_postdata();
?>
</article>
<!--  -->
</section>
</div>
<!-- international -->

<!-- sports -->
<div class="row">
<section class="sports">
  <h5 class="sectiontitle"><span class="sports-icon"> </span> Sports </h5>
  <?php
  // Query
    $args = array (
      'post_type' => array( 'sports_news', ),
      'posts_per_page' => 3,
      'order'     => 'DESC'
    );
  $query = new WP_Query( $args );
  // The Loop
  if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
      $query->the_post();
?>
  <article class="third-large secondfs">
    <a href="<?php the_permalink(); ?>">
      <div class="figure">
        <?php the_post_thumbnail( 'category-thumb', array('class' => 'img-responsive') ); ?>
      </div>
      <div class="story-content">
        <div class="title">
          <?php echo '<h1>' . get_the_title() . '</h1>'; ?>
           <div class="description">
              <p> <?php  echo excerpt(200);  ?> </p>
          </div>
        </div>
    </div>
    </a>
  </article>
<?php
}} else {
  // no posts found
  echo "<span> No content @sports news in wordpress database </span>";
}
// Restore original Post Data
wp_reset_postdata();
?>
</section>
</div>
<!-- sports -->

<!-- film -->
<div class="row">
<section class="film">
  <h5 class="sectiontitle"><span class="film-icon"> </span> film </h5>
  <?php
  // Query
    $args = array (
      'post_type' => array( 'film_news', ),
      'posts_per_page' => 3,
      'order'     => 'DESC'
    );
  $query = new WP_Query( $args );
  // The Loop
  if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
      $query->the_post();
?>
  <article class="third-large secondfs">
    <a href="<?php the_permalink(); ?>">
      <div class="figure">
        <?php the_post_thumbnail( 'category-thumb', array('class' => 'img-responsive') ); ?>
      </div>
      <div class="story-content">
        <div class="title">
          <?php echo '<h1>' . get_the_title() . '</h1>'; ?>
           <div class="description">
              <p> <?php  echo excerpt(200);  ?> </p>
          </div>
        </div>
    </div>
    </a>
  </article>
<?php
}} else {
  // no posts found
  echo "<span> No content @film news in wordpress database </span>";
}
// Restore original Post Data
wp_reset_postdata();
?>
</section>
</div>
<!-- film -->

<?php get_footer(); ?>
