/* === File: avo-rotator.php === */
<?php
/*
Plugin Name: AvoRotator
Plugin URI: https://avocadoweb.net
Description: Rotate between service offerings (logo + description) every 15 seconds.
Version: 1.0
Author: Joseph Brzezowski
License: GPLv3
*/

function avo_rotator_enqueue_assets() {
    wp_enqueue_style('avo-rotator-style', plugin_dir_url(__FILE__) . 'style.css');
    wp_enqueue_script('avo-rotator-script', plugin_dir_url(__FILE__) . 'rotator.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'avo_rotator_enqueue_assets');

function avo_rotator_shortcode() {
$slides = array(
    array(
        'img' => 'https://avocadoweb.net/wp-content/uploads/2025/04/aws.png',
        'alt' => 'AWS Cloud Hosting',
        'desc' => 'Reliable and scalable cloud hosting powered by AWS infrastructure.'
    ),
    array(
        'img' => 'https://avocadoweb.net/wp-content/uploads/2025/05/WordPress.png',
        'alt' => 'WordPress Hosting',
        'desc' => 'Optimized WordPress hosting for speed, security, and simplicity.'
    ),
    array(
        'img' => 'https://avocadoweb.net/wp-content/uploads/2023/07/cloudpanel-logo.png',
        'alt' => 'CloudPanel Management',
        'desc' => 'Modern server control panel to manage your cloud servers efficiently.'
    ),
    array(
        'img' => 'https://avocadoweb.net/wp-content/uploads/2024/12/woocommerce-logo.png',
        'alt' => 'WooCommerce Hosting',
        'desc' => 'Ecommerce-optimized hosting designed for speed and conversion with WooCommerce.'
    ),
    array(
        'img' => plugin_dir_url(__FILE__) . 'images/marketing.png', // Local image stays
        'alt' => 'Marketing Services',
        'desc' => 'Custom marketing strategies to grow your brand and online presence.'
    ),
    array(
        'img' => 'https://avocadoweb.net/wp-content/uploads/2023/06/ai-1.jpg',
        'alt' => 'Web & AI Development',
        'desc' => 'Advanced web and AI solutions tailored for your business needs.'
    ),
);



    ob_start();
    echo '<div class="avo-rotator">';
    foreach ($slides as $index => $slide) {
        $active = $index === 0 ? ' active' : '';
        echo '<div class="avo-slide' . $active . '">';
        echo '<img src="' . esc_url($slide['img']) . '" alt="' . esc_attr($slide['alt']) . '">';
        echo '<p>' . esc_html($slide['desc']) . '</p>';
        echo '</div>';
    }
    echo '</div>';
    return ob_get_clean();
}
add_shortcode('avo_rotator', 'avo_rotator_shortcode');

/* === File: style.css === */
.avo-rotator {
  position: relative;
  max-width: 400px;
  margin: 0 auto;
  text-align: center;
}
.avo-slide {
  display: none;
  transition: opacity 0.5s ease;
}
.avo-slide.active {
  display: block;
}
.avo-slide img {
  max-width: 120px;
  height: auto;
  margin-bottom: 10px;
}
.avo-slide p {
  font-size: 1rem;
  color: #333;
}

/* === File: rotator.js === */
document.addEventListener('DOMContentLoaded', function () {
  const slides = document.querySelectorAll('.avo-slide');
  let index = 0;

  function showNextSlide() {
    slides[index].classList.remove('active');
    index = (index + 1) % slides.length;
    slides[index].classList.add('active');
  }

  setInterval(showNextSlide, 15000);
});
