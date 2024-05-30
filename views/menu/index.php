<?php
/** @var $menu */
?>

<div class="row row-cols-3 gap-5 justify-content-around w-75 m-auto">
    <?php foreach ($menu as $food):?>
        <div class="col card" style="width: 18rem;">
            <img src="/images/placeholder.svg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?=$food->title?></h5>
                <p class="card-text"><?=$food->description?></p>
                <p class="card-text"><?=$food->price?></p>
                <a href="#" class="btn btn-primary">Перейти</a>
            </div>
        </div>
    <?php endforeach;?>
</div>
