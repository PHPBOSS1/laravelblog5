@if (Session::has('info'))
    <div>
        {{ Session::get('info') }}
    </div>
@endif
<form action="/blog/post/store" method="POST">
    {{ csrf_field() }}
    <?php
    use Illuminate\Support\MessageBag;
    /** @var MessageBag $errors */
    ?>
    <div> <label>Введите заголовок</label><input type="text" name="title" placeholder="введите заголовок" id="title"></div>
    <?  if($errors->first("title") != "") echo "<div class='alert'>".$errors->first("title")."</div>"; ?>
    <div><label>Введите урл страницы</label><input type="text" name="slug" placeholder="Укажите slug"></div>
    <? if($errors->first("slug") != "") echo "<div class='alert'>".$errors->first("slug")."</div>"; ?>
    <div><label>Введите пост статьи</label><textarea rows="10" cols="45" name="text" placeholder="введите пост статьи"></textarea></div>
    <? if($errors->first("text") != "") echo "<div class='alert'>".$errors->first("text")."</div>"; ?>
    <label for="">Статус</label>
    <select class="form-control" name="published">
        <?php if(isset($post->id)): ?>
        <option value="0" <?php if($post->published == 0): ?> selected="" <?php endif; ?>>Не опубликовано</option>
        <option value="1" <?php if($post->published == 1): ?> selected="" <?php endif; ?>>Опубликовано</option>
        <?php else: ?>
        <option value="0">Не опубликовано</option>
        <option value="1">Опубликовано</option>
        <?php endif; ?>
    </select>
    <input type="submit" value="Отправить">
</form>



