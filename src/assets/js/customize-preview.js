import $ from 'jquery';



console.log(flexi-theme)
wp.customize('_flexi_accent_color', (value) => {
  value.bind( (to) => {
    $('#flexi-theme-stylesheet-inline-css').html(
      `
      a {
        color:  ${to}
      }
      article a {
        color:  ${to}
      }
      
      .sidebar-nav h3 {
        color:  ${to}
      }
      
      .sidebar-nav ul.navbar-nav li.nav-item a.nav-link:hover {
        border-right:5px solid ${to}
      }
      
      `
    );
  })
})

wp.customize('blogname', (value) => {
  value.bind( (to) => {
    $('.c-header_blogname').html(to);
  })
})