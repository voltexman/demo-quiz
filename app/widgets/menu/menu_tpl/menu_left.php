<ul>
    <?php foreach ($this->menu as $key => $value): ?>
    <li style="position: relative">
        <a href="<?= ($key != 1) ? h($value['alias']) : PATH;?>"><?= h($value['name']);?>
            <i class="fa fa-angle-right float-right" aria-hidden="true"></i>
        </a>
        <?php if ($value['is_child']): ?>
        <ul>
            <?php foreach ($this->categories as $cat_id => $cat_value): ?>
                <?php if ($cat_value['menu_id'] == $key): ?>
                    <li><a href="/category/<?= h($cat_id);?>"><?= h($cat_value['name']);?></a></li>
                <?php endif;?>
            <?php endforeach; ?>
        </ul>
        <?php endif;?>
    </li>
    <?php endforeach; ?>
</ul>
