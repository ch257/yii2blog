<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%article_tag}}`.
 */
class m190512_114256_create_article_tag_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%article_tag}}', [
            'id' => $this->primaryKey(),
			'article_id' => $this->integer(),
			'tag_id' => $this->integer(),
        ]);
		
		$this->createIndex(
			'idx-article_tag-article_id',
			'article_tag',
			'article_id'
        );
		
		$this->addForeignKey(
			'fk-article_tag-article_id',
			'article_tag',
			'article_id',
			'article',
			'id',
			'CASCADE'
        );
		
		$this->createIndex(
			'idx-article_tag-tag_id',
			'article_tag',
			'tag_id'
        );
		
		$this->addForeignKey(
			'fk-article_tag-tag_id',
			'article_tag',
			'tag_id',
			'tag',
			'id',
			'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%article_tag}}');
    }
}
