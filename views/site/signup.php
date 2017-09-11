<?php
/**
 * Created by PhpStorm.
 * User: omirali
 * Date: 8/16/17
 * Time: 3:08 PM
 */
use yii\widgets\ActiveForm;

?>
<section id="ContactContent">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="contact_area">
                <h1>Регистрация</h1>
                <p>Vestibulum id nisl a neque malesuada hendrerit. Mauris ut porttitor nunc, ut volutpat nisl. Nam ullamcorper ultricies metus vel ornare. Vivamus tincidunt erat in mi accumsan, a sollicitudin risus vestibulum. Nam dignissim purus vitae nisl adipiscing ultricies. Pellentesque in porttitor tellus. Integer fermentum in sem eu tempus. In eu metus vitae nibh laoreet sollicitudin et ac lectus. Curabitur blandit velit elementum augue elementum scelerisque.</p>
                <div class="contact_bottom">
                    <div class="contact_us wow fadeInRightBig animated" style="visibility: visible; animation-name: fadeInRightBig;">
                        <h2>Регистрация</h2>
                        <?php $form = ActiveForm::begin([
                            'id' => 'contact-form',
                            'options'=>[
                                'class'=>'contact_form',
                            ],
                            'fieldConfig' => [
                                'options' => [
                                    'tag' => false,
                                ],
                            ],
                        ]); ?>
                        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                        <?= $form->field($model, 'email')->textInput() ?>
                        <?= $form->field($model, 'password')->passwordInput() ?>
                            <input type="submit" value="Send">
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
