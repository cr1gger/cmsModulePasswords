
<?php
$this->title = 'Список паролей';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<div class="cmsModulePasswords-default-index card">
    <div class="card-body">
        <?=\yii\grid\GridView::widget([
                'dataProvider' => $provider
        ])?>
    </div>
</div>

