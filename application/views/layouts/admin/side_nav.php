<ul class="sidebar navbar-nav">
    <?php foreach($menus as $menu){ ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="<?php echo site_url($menu->url); ?>" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="<?php echo $menu->fafa ?>"  aria-hidden="true"></i>
          <span><?php echo $menu->name ?></span>
        </a>
        <div class="dropdown-menu bg-dark" aria-labelledby="pagesDropdown" style="">
          <?php $submenus = $this->db->where('menu_id', $menu->id)->get('submenu')->result(); ?>
          <?php foreach($submenus as $submenu){ ?>
              <a class="dropdown-item text-light" href="<?php echo site_url($submenu->url); ?>"><?php echo $submenu->name ?></a>
          <?php } ?>
        </div>
      </li>
    <?php } ?>
</ul>