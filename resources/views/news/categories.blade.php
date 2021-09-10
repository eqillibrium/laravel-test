<?php foreach($categoriesList as $category): ?>
    <div>
        <h2><a href="<?=route('news.showCategoryNews', ['category' => $category])?>"><?=$category?></a></h2>
    </div><br>
<?php endforeach; ?>
