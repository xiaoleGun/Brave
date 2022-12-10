<?php

/**
 * 表白墙
 * @package custom
 * Author: Dark
 * CreateTime: 2022/12/10 19:02
 */
$this->need('base/head.php');
$this->need('base/nav.php');
$this->comments()->to($comments);
?>
<blockquote class="blockquote text-center my-5 py-2">
    <h5 class="card-title lover-card-title">你那么优秀，说不定Ta也喜欢你呢？</h5>
    <h5 class="card-title lover-card-title">勇敢一次吧！</h5>
</blockquote>
<?php function threadedComments($comments, $options)
{
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';
        } else {
            $commentClass .= ' comment-by-user';
        }
    }
    $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
    ?>
    <div id="li-<?php $comments->theId(); ?>" class=" comment-body<?php if ($comments->levels > 0) {
    echo ' comment-child';
    $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
} else {
    echo ' comment-parent';
}
$comments->alt(' comment-odd', ' comment-even');
echo $commentClass;
?>">

    <div class="commentlist">
        <div class="comment" id="li-<?php $comments->theId(); ?>">
            <div id="<?php $comments->theId(); ?>">
                <div class="comment-avatar"><img alt="" src="<?= App::avatarQQ($comments->mail); ?>s=100"
                                                 class="avatar avatar-96 photo" height="96" width="96"
                                                 style="display: inline;"></div>
                <div class="comment-body">
                    <div class="comment_author">
                        <span class="name"><?php $comments->author(); ?></span>
                        <em><?php $comments->date('Y-m-d H:i'); ?></em>
                    </div>
                    <div class="comment-text">
                        <?php $comments->content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
    <div id="<?php $this->respondId(); ?>" class="respond list-content mx-auto mt-5">
        <div class="list-top">
            <?php if ($comments->have()) : ?>
                <h5 class="text-center"><?php $this->commentsNum(_t('暂无表白'), _t('仅有一条表白'), _t('累计已经收到<span class="bigfontNum"> %d </span>条表白')); ?></h5>
                <?php $comments->listComments(); ?>
                <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
            <?php endif; ?>
            <form method="post" action="<?php $this->commentUrl() ?>" name="comment-form" id="comment-form" role="form"
                  class="comment-form">
                <?php if ($this->user->hasLogin()) : ?>
                    <p><?php _e('登录身份: '); ?><a
                                href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>.
                        <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a>
                    </p>
                <?php else : ?>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <input type="text" name="author" id="author" class="form-control"
                                   placeholder="<?php _e('姓名或昵称*'); ?>" value="<?php $this->remember('author'); ?>"
                                   required/>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="email" name="mail" id="mail" class="form-control"
                                   placeholder="<?php _e('邮箱*'); ?>"
                                   value="<?php $this->remember('mail'); ?>" <?php if ($this->options->commentsRequireMail) : ?> required<?php endif; ?> />
                        </div>
                    </div>
                <?php endif; ?>
                <div class="form-group">
                    <textarea rows="3" cols="50" name="text" id="textarea" class="form-control"
                              placeholder="<?php _e('写下你想对你的crush说的话'); ?>"
                              required><?php $this->remember('text'); ?></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="float-right btn btn-outline-danger"><?php _e('勇敢一次'); ?></button>
                </div>
            </form>
        </div>
    </div>

<?php $this->need('base/footer.php'); ?>