<?php

namespace app\modules\control\modules\cmsModulePasswords\migrations;

use app\common\migrations\BaseMigration;

/**
 * Class M231211205412CreatecmsModulePasswordsAccessPermission
 */
class M231211205412CreateCmsModulePasswordsAccessPermission extends BaseMigration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $manager = \Yii::$app->getAuthManager();

        $permission = $manager->createPermission('control.password-manager.access');
        $permission->description = 'Доступ к менеджеру паролей';

        $manager->add($permission);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "M231211205412CreatecmsModulePasswordsAccessPermission cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "M231211205412CreatecmsModulePasswordsAccessPermission cannot be reverted.\n";

        return false;
    }
    */
}
