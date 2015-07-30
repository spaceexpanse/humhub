<?php

use humhub\modules\space\models\Space;
use humhub\modules\user\models\User;
?>

<div class="modal-dialog modal-dialog-normal animated fadeIn">
    <div class="modal-content">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"
                id="myModalLabel"><?php echo Yii::t('AdminModule.views_module_setAsDefault', '%moduleName% - Set as default module', array('%moduleName%' => "<strong>" . $module->getName() . "</strong>")); ?></h4>
        </div>
        <?php
        $form = humhub\compat\CActiveForm::begin();
        ?>
        <div class="modal-body">

            <p>
                <?php echo Yii::t('AdminModule.views_module_setAsDefault', 'Here you can choose whether or not a module should be automatically activated on a space or user profile. If the module should be activated, choose "always activated".'); ?>
            </p>

            <br/>

            <div class="row">

                <?php if ($module->hasContentContainerType(Space::className())) : ?>
                    <div class="col-md-6">
                        <label for=""><?php echo Yii::t('AdminModule.views_module_setAsDefault', 'Spaces'); ?></label>

                        <div class="radio">
                            <label>
                                <?php echo $form->radioButton($model, 'spaceDefaultState', array('value' => 0, 'uncheckValue' => null, 'checked' => ($model->spaceDefaultState == 0))); ?>
                                <?php echo Yii::t('AdminModule.views_module_setAsDefault', 'Deactivated'); ?>
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <?php echo $form->radioButton($model, 'spaceDefaultState', array('value' => 1, 'uncheckValue' => null, 'checked' => ($model->spaceDefaultState == 1))); ?>
                                <?php echo Yii::t('AdminModule.views_module_setAsDefault', 'Activated'); ?>
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <?php echo $form->radioButton($model, 'spaceDefaultState', array('value' => 2, 'uncheckValue' => null, 'checked' => ($model->spaceDefaultState == 2))); ?>
                                <?php echo Yii::t('AdminModule.views_module_setAsDefault', 'Always activated'); ?>
                            </label>
                        </div>
                        <br/>
                    </div>
                <?php endif; ?>
                <?php if ($module->hasContentContainerType(User::className())) : ?>
                    <div class="col-md-6">
                        <label
                            for=""><?php echo Yii::t('AdminModule.views_module_setAsDefault', 'User Profiles'); ?></label>

                        <div class="radio">
                            <label>
                                <?php echo $form->radioButton($model, 'userDefaultState', array('value' => 0, 'uncheckValue' => null, 'checked' => ($model->userDefaultState == 0))); ?>
                                <?php echo Yii::t('AdminModule.views_module_setAsDefault', 'Deactivated'); ?>
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <?php echo $form->radioButton($model, 'userDefaultState', array('value' => 1, 'uncheckValue' => null, 'checked' => ($model->userDefaultState == 1))); ?>
                                <?php echo Yii::t('AdminModule.views_module_setAsDefault', 'Activated'); ?>
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <?php echo $form->radioButton($model, 'userDefaultState', array('value' => 2, 'uncheckValue' => null, 'checked' => ($model->userDefaultState == 2))); ?>
                                <?php echo Yii::t('AdminModule.views_module_setAsDefault', 'Always activated'); ?>
                            </label>
                        </div>
                        <br/>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="modal-footer">

            <?php
            echo \humhub\widgets\AjaxButton::widget([
                'label' => Yii::t('AdminModule.views_module_setAsDefault', 'Save'),
                'ajaxOptions' => [
                    'type' => 'POST',
                    'beforeSend' => new yii\web\JsExpression('function(){ setModalLoader(); }'),
                    'success' => new yii\web\JsExpression('function(html){ $("#globalModal").html(html); }'),
                    'url' => \yii\helpers\Url::to(['/admin/module/set-as-default', 'moduleId' => $module->id]),
                ],
                'htmlOptions' => [
                    'class' => 'btn btn-primary'
                ]
            ]);
            ?>
            <button type="button" class="btn btn-primary"
                    data-dismiss="modal"><?php echo Yii::t('AdminModule.views_module_setAsDefault', 'Close'); ?></button>


            <div id="default-loader" class="loader loader-modal hidden">
                <div class="sk-spinner sk-spinner-three-bounce">
                    <div class="sk-bounce1"></div>
                    <div class="sk-bounce2"></div>
                    <div class="sk-bounce3"></div>
                </div>
            </div>

        </div>

        <?php humhub\compat\CActiveForm::end(); ?>


    </div>
</div>

