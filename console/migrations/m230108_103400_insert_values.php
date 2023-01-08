<?php

use yii\db\Migration;

/**
 * Class m230108_103400_insert_values
 */
class m230108_103400_insert_values extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("INSERT INTO tbl_user (username, password, email) VALUES ('demo','$2a$10\$JTJf6/XqC94rrOtzuF397OHa4mbmZrVTBOQCmYD9U.obZRUut4BoC','webmaster@example.com');
INSERT INTO tbl_post (title, content, status, create_time, update_time, author_id, tags) VALUES ('Welcome!','This blog system is developed using Yii. It is meant to demonstrate how to use Yii to build a complete real-world application. Complete source code may be found in the Yii releases.
Feel free to try this system by writing new posts and posting comments.',2,1230952187,1230952187,1,'yii, blog');
INSERT INTO tbl_post (title, content, status, create_time, update_time, author_id, tags) VALUES ('A Test Post', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 2,1230952187,1230952187,1,'test');

INSERT INTO tbl_comment (content, status, create_time, author, email, post_id) VALUES ('This is a test comment.', 2, 1230952187, 'Tester', 'tester@example.com', 2);

INSERT INTO tbl_tag (name) VALUES ('yii');
INSERT INTO tbl_tag (name) VALUES ('blog');
INSERT INTO tbl_tag (name) VALUES ('test');");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230108_103400_insert_values cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230108_103400_insert_values cannot be reverted.\n";

        return false;
    }
    */
}
