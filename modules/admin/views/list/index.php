
<h1>Комментарии к статье <?= $request->name?></h1>
<?php foreach($comments as $comment):?>
    <a href = "/admin/comment/view?id=<?=$comment->id ?>"><?=$comment->text?></a>
    <hr>
<?php endforeach ?>
<button><a href = "/admin/comment/create">Написать комментарий</a></button>
