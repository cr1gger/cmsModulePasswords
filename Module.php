<?php

namespace app\modules\control\modules\cmsModulePasswords;

use app\modules\control\helpers\ControlHelper;
use app\modules\control\interfaces\ModuleInterface;
use yii\base\BootstrapInterface;
use Yii;

/**
 * cmsModulePasswords module definition class
 */
class Module extends \yii\base\Module implements ModuleInterface
{
    public const DB_PREFIX = "passwd_";
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\control\modules\cmsModulePasswords\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        if (!self::canAccess()) {
            throw new \yii\web\ForbiddenHttpException('Доступ запрещен');
        }

        if (ControlHelper::isConsoleApp()) {
            $this->controllerNamespace = 'app\modules\control\modules\cmsModulePasswords\commands';
        }

        parent::init();

        // здесь находится пользовательский код инициализации
    }

    /**
     * {@inheritdoc}
     */
    public static function getName(): string
    {
        return 'Менеджер паролей';
    }

    /**
     * @return array
     */
    public static function getMenuSettings(): array
    {
        return [
            'label' => self::getName(),
            'icon' => 'th',
            'url' => ['/control/cmsModulePasswords'],
            'visible' => true,
            'target' => '_self',
            'iconStyle' => 'fas',
            'iconClassAdded' => '',
            'items' => self::menuItems(),
            'iconClass' => 'nav-icon fas fa-key',
            //'badge' => '<span class="right badge badge-danger">New</span>',
        ];
    }

    /**
     * @return array
     */
    public static function menuItems(): array
    {
        $route = Yii::$app->controller->route;

        return [
            [
                'label' => 'Список паролей',
                'icon' => 'file-code',
                'url' => ['/control/cmsModulePasswords/store'],
                'active' => $route === 'control/cmsModulePasswords/store/index',
                'iconClass' => 'nav-icon fas fa-list',

            ]
        ];
    }

    /**
     * @return bool
     */
    public static function canAccess(): bool
    {
        if (!ControlHelper::isConsoleApp()) {
            return Yii::$app->user->can('control.password-manager.access');
        }

        return true;
    }
}
