<ul class="navbar-nav mr-auto">
    <?php foreach ($this->menu as $key => $value): ?>
        <?php if ($value['is_child']): ?>
            <li class="nav-item dropdown <?= ($key == 1) ? 'active' : '';?>">
                <a class="nav-link dropdown-toggle" href="<?= ($key != 1) ? h($value['alias']) : PATH;?>" id="navbarDropdown<?=$key?>" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?= h($value['name']);?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown<?=$key?>">
                    <a class="dropdown-item" href="/courses">Все курсы</a>
                    <?php foreach ($this->categories as $cat_id => $cat_value): ?>
                        <?php if ($cat_value['menu_id'] == $key): ?>
                            <a class="dropdown-item" href="/category/<?= h($cat_id);?>"><?= h($cat_value['name']);?></a>
                        <?php endif;?>
                    <?php endforeach; ?>
                </div>
            </li>
        <?php else: ?>
            <li class="nav-item <?= ($key == 1) ? 'active' : '';?>">
                <a class="nav-link" href="<?= ($key != 1) ? h($value['alias']) : PATH;?>"><?= h($value['name']);?></a>
            </li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>