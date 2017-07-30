<?php

namespace SilverStripe\Comments\Tests\Stubs;

use SilverStripe\Comments\Tests\Stubs\CommentableItem;

class CommentableItemDisabled extends CommentableItem
{
    private static $table_name = 'CommentableItemDisabled';

    private static $defaults = array(
        'ProvideComments' => false,
        'ModerationRequired' => 'None',
        'CommentsRequireLogin' => false
    );
}
