# Avo-Rotator

![License](https://img.shields.io/badge/license-GPLv3-blue)
![WordPress Tested](https://img.shields.io/badge/WordPress-6.5+-green)
![Built By](https://img.shields.io/badge/Built%20by-AvocadoWeb-brightgreen)

A simple, lightweight WordPress plugin that rotates between service offerings (logos + short descriptions) every 15 seconds. Built for speed, minimalism, and easy integration using a single shortcode.

---

## 🔧 Features

- 📸 Rotates images and text (e.g., AWS logo with intro, then WordPress logo)
- ⏱ Automatic rotation every 15 seconds
- 🧩 Embed anywhere using `[avo_rotator]` shortcode
- 💻 Fully responsive, clean CSS
- ⚡ Minimal bloat: just PHP, JS, and CSS

---

## 🚀 Installation

1. Clone or download this repository.
2. Upload the folder `avo-rotator` to your `/wp-content/plugins/` directory.
3. Activate the plugin from the WordPress admin dashboard.
4. Place the shortcode `[avo_rotator]` anywhere you'd like to display the rotating service block.

---

## 🖼️ Add or Edit Services

Logos and descriptions are defined inside the `avo-rotator.php` file like this:

```php
$slides = array(
    array(
        'img' => plugin_dir_url(__FILE__) . 'images/aws.png',
        'alt' => 'AWS Cloud Hosting',
        'desc' => 'Reliable and scalable cloud hosting powered by AWS infrastructure.'
    ),
    array(
        'img' => plugin_dir_url(__FILE__) . 'images/wordpress.png',
        'alt' => 'WordPress Hosting',
        'desc' => 'Optimized WordPress hosting for speed, security, and simplicity.'
    ),
    // Add more...
);
