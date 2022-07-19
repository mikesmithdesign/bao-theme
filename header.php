<!DOCTYPE html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <?php wp_head(); ?>
  <script>
    window.onpageshow = function(event) {
      if (event.persisted) {
        window.location.reload();
      }
    };
  </script>
  <script>
    (function(d) {
      var config = {
          kitId: 'scu8fxl',
          scriptTimeout: 3000,
          async: true
        },
        h = d.documentElement,
        t = setTimeout(function() {
          h.className = h.className.replace(/\bwf-loading\b/g, "") + " wf-inactive";
        }, config.scriptTimeout),
        tk = d.createElement("script"),
        f = false,
        s = d.getElementsByTagName("script")[0],
        a;
      h.className += " wf-loading";
      tk.src = 'https://use.typekit.net/' + config.kitId + '.js';
      tk.async = true;
      tk.onload = tk.onreadystatechange = function() {
        a = this.readyState;
        if (f || a && a != "complete" && a != "loaded") return;
        f = true;
        clearTimeout(t);
        try {
          Typekit.load(config)
        } catch (e) {}
      };
      s.parentNode.insertBefore(tk, s)
    })(document);
  </script>
  <?php list($nav_r, $nav_g, $nav_b) = sscanf(get_theme_mod('nav_text_color'), "#%02x%02x%02x");
  list($text_r, $text_g, $text_b) = sscanf(get_theme_mod('text_color'), "#%02x%02x%02x");
  list($footer_r, $footer_g, $footer_b) = sscanf(get_theme_mod('footer_text_color'), "#%02x%02x%02x"); ?>
  <style type="text/css">
    :root {
      --bg-color: <?php echo get_theme_mod('site_bg_color'); ?>;
      --nav-bg-color: <?php echo get_theme_mod('nav_bg_color'); ?>;
      --nav-text-color: <?php echo get_theme_mod('nav_text_color'); ?>;
      --nav-text-color-rgb: <?php echo "$nav_r, $nav_g, $nav_b"; ?>;
      --text-color: <?php echo get_theme_mod('text_color'); ?>;
      --text-color-rgb: <?php echo "$text_r, $text_g, $text_b"; ?>;
      --footer-text-color: <?php echo get_theme_mod('footer_text_color'); ?>;
      --footer-text-color-rgb: <?php echo "$footer_r, $footer_g, $footer_b"; ?>;
      --heading-font: <?php echo get_theme_mod('heading_font'); ?>;
      --body-font: <?php echo get_theme_mod('body_font'); ?>;
      --mandarin-font: <?php echo get_theme_mod('mandarin_font'); ?>;
      --main-logo-size: <?php echo get_theme_mod('main_logo_size'); ?>px;
      --scroll-logo-size: <?php echo get_theme_mod('scroll_logo_size'); ?>px;
      --footer-logo-size: <?php echo get_theme_mod('footer_logo_size'); ?>px;
    }
  </style>
</head>

<body <?php body_class(); ?>>