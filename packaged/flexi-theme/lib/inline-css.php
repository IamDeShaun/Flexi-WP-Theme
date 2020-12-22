<?php
$accent_colour = sanitize_hex_color( get_theme_mod('_flexi_accent_color', '#20ddae' ) );
$inline_styles = "
a {
  color:  {$accent_colour}
}
article a {
  color:  {$accent_colour}
}

.sidebar-nav h3 {
  color:  {$accent_colour}
}

.sidebar-nav ul.navbar-nav li.nav-item a.nav-link:hover {
  border-right:5px solid {$accent_colour}
}

";
?>