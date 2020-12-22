<div class="search">
        <i class="fas fa-search"></i>

        <div class="search-box">
        <form role="search" method="get" action="<?php echo esc_url( home_url( '/') ) ?>">
          <input type="search" name="s" placeholder="Search The Site" value="<?php echo esc_attr(get_search_query());?>"/>
          <button type="submit">Search</button>
         <!-- <input type="button" value="Search"/>-->
          </form>
        </div> <!-- End Searchbox -->

      </div> <!-- End Search-->