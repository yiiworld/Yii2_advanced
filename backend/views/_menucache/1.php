<ul class="nav nav-list">
    <li>
        <a href="#" class="dropdown-toggle">
            <i class="icon-desktop"></i>
            <span class="menu-text"> 系统设置 </span>
            <b class="arrow icon-angle-down"></b>
        </a>
        <ul class="submenu">
            <li>
                <a href="#" class="dropdown-toggle">
                    <i class="icon-double-angle-right"></i>
                    系统设置
                    <b class="arrow icon-angle-down"></b>
                </a>

                <ul class="submenu">
                    <li>
                        <a href="#">
                            <i class="icon-leaf"></i>
                            权限管理
                        </a>
                    </li>
                    <li <?php if($column=='sys/index'): ?> id="active" <?php endif; ?>>
                        <a href="/sys/">
                            <i class="icon-leaf"></i>
                            菜单管理
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
    <li class="">
        <a href="#" class="dropdown-toggle">
            <i class="icon-desktop"></i>
            <span class="menu-text"> 游戏管理 </span>
            <b class="arrow icon-angle-down"></b>
        </a>
        <ul class="submenu">
            <li class="">
                <a href="#" class="dropdown-toggle">
                    <i class="icon-double-angle-right"></i>
                    游戏
                    <b class="arrow icon-angle-down"></b>
                </a>
                <ul class="submenu">
                    <li <?php if($column=='user/mange'): ?> id="active" <?php endif; ?>>
                        <a href="/user/mange">
                            <i class="icon-leaf"></i>
                            普通表格
                        </a>
                    </li>
                    <li <?php if($column=='user/form'): ?> id="active" <?php endif; ?>>
                        <a href="/user/form">
                            <i class="icon-leaf"></i>
                            表单
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
</ul>