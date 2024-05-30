<?php
/** @var \app\entity\Menu $food */
?>

<div>
    <div class="row">
        <div class="col-lg-3">
        <img style="max-height: 400px" src="/images/placeholder.svg" class="card-img-top" alt="...">
        </div>
        <div class="col">
            <table class="table">
                <tr>
                    <th class="col-3">Название</th>
                    <td class="col"><?=$food->title?></td>
                </tr>
                <tr>
                    <th class="col-3">Описание</th>
                    <td class="col"><?=$food->description?></td>
                </tr>
                <tr>
                    <th class="col-3">Состав</th>
                    <td class="col"><?=$food->compound?></td>
                </tr>
                <tr>
                    <th class="col-3">Категория</th>
                    <td class="col"><?=$food->category->title?></td>
                </tr>
                <tr>
                    <th class="col-3">Вес</th>
                    <td class="col"><?=$food->volume?></td>
                </tr>
                <tr>
                    <th class="col-3">Цена</th>
                    <td class="col"><?=$food->price?></td>
                </tr>
            </table>
            <div>
                <a class="btn btn-primary" href="">В корзину</a>
            </div>
        </div>
    </div>
    <div></div>
</div>
