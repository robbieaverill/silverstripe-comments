<?php

namespace SilverStripe\Comments\Tests\Stubs;

use SilverStripe\Comments\Extensions\CommentsExtension;
use SilverStripe\Control\Director;
use SilverStripe\Dev\TestOnly;
use SilverStripe\ORM\DataObject;
use SilverStripe\Security\Member;
use SilverStripe\Security\Permission;

/**
 * @package comments
 * @subpackage tests
 */
class CommentableItem extends DataObject implements TestOnly
{
    private static $table_name = 'CommentableItem';

    private static $db = array(
        'Title' => 'Varchar'
    );

    private static $extensions = array(
        CommentsExtension::class
    );

    public function RelativeLink()
    {
        return 'CommentableItemController';
    }

    public function canView($member = null)
    {
        return true;
    }

    // This is needed for canModerateComments
    public function canEdit($member = null)
    {
        if ($member instanceof Member) {
            $memberID = $member->ID;
        } elseif (is_numeric($member)) {
            $memberID = $member;
        } else {
            $memberID = Member::currentUserID();
        }

        if ($memberID && Permission::checkMember($memberID, array('ADMIN', 'CMS_ACCESS_CommentAdmin'))) {
            return true;
        }
        return false;
    }

    public function Link()
    {
        return $this->RelativeLink();
    }

    public function AbsoluteLink()
    {
        return Director::absoluteURL($this->RelativeLink());
    }
}
