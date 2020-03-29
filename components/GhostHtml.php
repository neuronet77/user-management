<?php
/**
 * @var $this yii\web\View
 */

namespace neuronet77\modules\UserManagement\components;

use neuronet77\modules\UserManagement\models\User;
use yii\helpers\Html;

/**
 * Class GhostHtml
 *
 * Show elements only to those, who can access to them
 *
 * @package neuronet77\modules\UserManagement\components
 */
class GhostHtml extends Html
{
	/**
	 * Hide link if user hasn't access to it
	 *
	 * @inheritdoc
	 */
	public static function a($text, $url = null, $options = [])
	{
		if ( in_array($url, [null, '', '#']) )
		{
			return parent::a($text, $url, $options);
		}

		return User::canRoute($url) ? parent::a($text, $url, $options) : '';
	}
}