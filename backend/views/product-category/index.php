<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\store\ProductCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Product Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-category-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Create Product Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'status',
            'create_at:datetime',
            'update_at:date',

            [
              'attribute'=>'create_by',
                'format'=>'raw',
                'value'=>function($model){
                    return isset($model->create)? $model->create->username:'';
                }

            ],
            'update_by',
            'cate_id',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
