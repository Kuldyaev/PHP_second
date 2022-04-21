<div class="pageName">
    <h3>Отзывы</h3>
</div>

<div class="itemFeedback">
        <div class="feedbackDesk">
            <div class="oneFeedback">
                <? if(count($list) == 0): ?> 
                    Пока нет отзывов.
                <? endif ?>
                <? if(count($list) != 0): ?> 
                    <?php foreach ($list as $post):?>
                        <div class="feedbackItem" style="margin-bottom:5px">
                            <div class="feedbackHeader"> 
                                <div class="feedbackAuthor">                         
                                    автор: <b><?=$post['author']?></b>
                                </div>
                                <div class="feedbackDate">
                                    <?=$post['date']?>
                                </div>
                            </div>
                            <div class="feedbackText">    
                                <?=$post['feedback']?>
                            </div>
                        </div>    
                    <? endforeach;?>    
                <? endif; ?>
            </div>
        </div>
    </div>
    <div class="moreBtn center" style="width:100%">
        <a href="/?c=feedback&page=<?=$page?>" style="text-decoration:none;">
            <div class="buy center" style="color:black">Показать больше</div>
        </a>
    </div>
