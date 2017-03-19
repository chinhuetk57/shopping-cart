<?php

use yii\db\Migration;

/**
 * Handles the creation of table `category`.
 */
class m170319_110105_create_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('product_category', [
            'id' => $this->primaryKey(),
            'name'=>$this->string(255),
            'status'=>$this->smallInteger()->defaultValue(1),
            'create_at'=>$this->integer(),
            'update_at'=>$this->integer(),
            'create_by'=>$this->integer(),
            'create_by'=>$this->integer(),
            
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('product_category');
    }
}
