<div class="card">
    <div class="itemInfoPlace">
        <div class="itemImgPlace center">
            <img src="/images/imgs_goods_600/<?=$product->id?>.jpg" alt="item image" style="width: 300px;">
        </div>
        <div class="itemInfoItem">
            <div class="itemName">
                <h3><?=$product->name?></h3>
            </div>
            <div class="itemPrice">
               <h4><i>Цена:  <?=$product->price?> руб. </i></h4> 
            </div>
            <div class="buyBtn">
                <button class="buy" id="buyBtnItem" data-itemid=<?=$product->id?> data-session=<?=session_id()?>><b>BUY</b></button>
            </div>
            <h5>Описание товара:</h5> 
            <div class="itemDescription">
                <p><?=$product->s_describ?></p>
            </div>
        </div>
    </div>
</div>