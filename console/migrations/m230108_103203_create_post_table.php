<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post}}`.
 */
class m230108_103203_create_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("CREATE TABLE tbl_post
(
	id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	title VARCHAR(128) NOT NULL,
	content TEXT NOT NULL,
	tags TEXT,
	status INTEGER NOT NULL,
	create_time INTEGER,
	update_time INTEGER,
	author_id INTEGER NOT NULL,
	CONSTRAINT FK_post_author FOREIGN KEY (author_id)
		REFERENCES tbl_user (id) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%post}}');
    }
}
