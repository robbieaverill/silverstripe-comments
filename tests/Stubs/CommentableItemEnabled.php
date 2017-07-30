<?php

namespace SilverStripe\Comments\Tests\Stubs;

use SilverStripe\Comments\Tests\Stubs\CommentableItem;

class CommentableItemEnabled extends CommentableItem
{
    private static $table_name = 'CommentableItemEnabled';

    private static $defaults = array(
        'ProvideComments' => true,
        'ModerationRequired' => 'Required',
        'CommentsRequireLogin' => true
    );
}
