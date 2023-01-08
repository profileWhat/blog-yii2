<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Lookup}}`.
 */
class m230108_103100_create_lookup_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("CREATE TABLE tbl_lookup
(
	id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(128) NOT NULL,
	code INTEGER NOT NULL,
	type VARCHAR(128) NOT NULL,
	position INTEGER NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Draft', 'PostStatus', 1, 1);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Published', 'PostStatus', 2, 2);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Archived', 'PostStatus', 3, 3);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Pending Approval', 'CommentStatus', 1, 1);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Approved', 'CommentStatus', 2, 2);");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%Lookup}}');
    }
}
