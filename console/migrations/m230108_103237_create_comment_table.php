<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comment}}`.
 */
class m230108_103237_create_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("CREATE TABLE tbl_comment
(
	id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	content TEXT NOT NULL,
	status INTEGER NOT NULL,
	create_time INTEGER,
	author VARCHAR(128) NOT NULL,
	email VARCHAR(128) NOT NULL,
	url VARCHAR(128),
	post_id INTEGER NOT NULL,
	CONSTRAINT FK_comment_post FOREIGN KEY (post_id)
		REFERENCES tbl_post (id) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%comment}}');
    }
}
