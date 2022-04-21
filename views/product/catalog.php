<div class="pageName">
    <h3>eStore</h3>
</div>
<div class="cardDesk">
    <?php foreach ($catalog as $item):?>
        <div class="itemCard">
            <a href="/item/?id=<?=$item['id']?>" class="itemLink">
                <img src="images/imgs_goods_300/<?=$item['id']?>.jpg" alt="small img" class="imgimg">
            </a>
            <div class="itemInfo">
                <a href="/item/?id=<?=$item['id']?>" class="itemLink">
                    <div class="itemName">
                        <?=$item['name']?>
                    </div>
                    <div class="itemPrice">
                        цена: <?=$item['price']?> руб.
                    </div>
                </a>
                <div class="buyBtn">
                    <button class="buy" data-itemid=<?=$item['id']?> data-session=<?=session_id()?>>BUY</button>
                </div>        
            </div>
        </div>
    <?php endforeach;?>
</div>
<div class="moreBtn center" style="width:100%">
    <a href="/?c=product&a=catalog&page=<?=$page?>" style="text-decoration:none;">
        <div class="buy center" style="color:black">Показать больше</div>
    </a>
</div>
