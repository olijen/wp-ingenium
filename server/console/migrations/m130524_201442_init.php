<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function safeUp()
    {
        $this->execute('drop database wpi');
        $this->execute('create database wpi');
        $this->execute('use wpi');


        $this->createUser();
        $this->createCustomer();
        $this->createMaster();
        $this->createProject();
        $this->createIssue();
        $this->createTask();

        $this->createIssueMessage();
        $this->createProjectMessage();
        $this->createProjectProposalMessage();

        $this->createIssueFile();
        $this->createIssueMessageFile();
    }

    private function createUser()
    {
        $this->createTable('account', [
            'id' => $this->primaryKey(),

            'email' => $this->string()->notNull()->unique(),
            'name' => $this->string(55),
            'lastName' => $this->string(55),
            'phone' => $this->string(15)->unique(),

            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_date' => $this->integer()->notNull(),
            'updated_date' => $this->integer()->notNull(),

        ]);

        //todo: add index - status
    }

    private function createCustomer()
    {
        $this->createTable('customer', [
            'id' => $this->primaryKey(),
            'account_id' => $this->integer()->notNull(),
        ]);

        $this->linkTables('customer', 'account');
    }

    private function createMaster()
    {
        $this->createTable('master', [
            'id' => $this->primaryKey(),
            'account_id' => $this->integer()->notNull(),
        ]);
        $this->linkTables('master', 'account');
    }

    private function createProject()
    {
        $this->createTable('project', [
            'id' => $this->primaryKey(),
            'customer_id' => $this->integer()->notNull(),

            'name' => $this->string()->notNull(),
            'description' => $this->text(),

            //project data
            'url' => $this->string()->unique(),

            'ftp_host' => $this->string(255),
            'ftp_login' => $this->string(255),
            'ftp_pwd' => $this->string(255),

            'ssh_host' => $this->string(255),
            'ssh_login' => $this->string(255),
            'ssh_key' => $this->string(255),

            'repo_url' => $this->string(255),
            'repo_login' => $this->string(255),
            'repo_pwd' => $this->string(255),

            'database_host' => $this->string(255),
            'database_login' => $this->string(255),
            'database_pwd' => $this->string(255),

            'server_url' => $this->string(255),
            'server_login' => $this->string(255),
            'server_pwd' => $this->string(255),

            'admin_url' => $this->integer(255),
            'admin_login' => $this->integer(255),
            'admin_password' => $this->integer(255),

            'created_date' => $this->integer()->notNull(),
            'updated_date' => $this->integer()->notNull(),
        ]);
        $this->linkTables('project', 'customer');

    }

    private function createIssue()
    {
        $this->createTable('issue', [
            'id' => $this->primaryKey(),
            'project_id' => $this->integer()->notNull(),
            'master_id' => $this->integer(),

            'name' => $this->string()->notNull(),
            'description' => $this->text(),
            'deadline' => $this->string(),
            'stage' => $this->string(),
            'date' => $this->string(),

            'master_price' => $this->integer(),
            'master_deadline' => $this->date(),
            'master_comment' => $this->text(),

            'created_date' => $this->integer()->notNull(),
            'updated_date' => $this->integer()->notNull(),
        ]);
        $this->linkTables('issue', 'project');
        $this->linkTables('issue', 'master');
    }

    private function createTask()
    {
        $this->createTable('task', [
            'id' => $this->primaryKey(),
            'issue_id' => $this->integer()->notNull(),

            'name' => $this->string()->notNull(),
            'description' => $this->text(),
            'time' => $this->string(),
        ]);
        $this->linkTables('task', 'issue');
    }

    private function createIssueMessage()
    {
        $this->createTable('issue_message', [
            'id' => $this->primaryKey(),
            'account_id' => $this->integer()->notNull(),
            'issue_id' => $this->integer()->notNull(),

            'text' => $this->text()->notNull(),
            'created_date' => $this->integer()->notNull(),
            'updated_date' => $this->integer()->notNull(),
        ]);
        $this->linkTables('issue_message', 'account');
        $this->linkTables('issue_message', 'issue');
    }

    private function createProjectMessage()
    {
        $this->createTable('project_message', [
            'id' => $this->primaryKey(),
            'account_id' => $this->integer()->notNull(),
            'project_id' => $this->integer()->notNull(),

            'text' => $this->text()->notNull(),
            'created_date' => $this->integer()->notNull(),
            'updated_date' => $this->integer()->notNull(),
        ]);

        $this->linkTables('project_message', 'account');
        $this->linkTables('project_message', 'project');
    }

    private function createProjectProposalMessage()
    {
        $this->createTable('project_proposal_message', [
            'id' => $this->primaryKey(),
            'master_id' => $this->integer()->notNull(),
            'project_id' => $this->integer()->notNull(),

            'text' => $this->text()->notNull(),
            'created_date' => $this->integer()->notNull(),
            'updated_date' => $this->integer()->notNull(),
        ]);

        $this->linkTables('project_proposal_message', 'master');
        $this->linkTables('project_proposal_message', 'project');
    }

    private function createIssueFile()
    {
        $this->createTable('issue_file', [
            'id' => $this->primaryKey(),
            'issue_id' => $this->integer()->notNull(),

            'name' => $this->string()->notNull(),
            'url' => $this->string()->notNull()->unique(),
            'type' => $this->string()->notNull(),
        ]);

        $this->linkTables('issue_file', 'issue');
    }

    private function createIssueMessageFile()
    {
        $this->createTable('issue_message_file', [
            'id' => $this->primaryKey(),
            'issue_message_id' => $this->integer()->notNull(),

            'name' => $this->string()->notNull(),
            'url' => $this->string()->notNull()->unique(),
            'type' => $this->string()->notNull(),
        ]);

        $this->linkTables('issue_message_file', 'issue_message');
    }

    public function safeDown()
    {
        $this->dropTable('account');
        $this->dropTable('customer');
        $this->dropTable('master');
        $this->dropTable('project');
        $this->dropTable('issue');
        $this->dropTable('task');
        $this->dropTable('issue_message');
        $this->dropTable('issue_message');
        $this->dropTable('project_proposal_message');
        $this->dropTable('issue_file');
        $this->dropTable('issue_message_file');

        //todo: $this->dropForeignKey('fk-post-category_id', 'post');
        //todo: $this->dropIndex('idx-post-category_id', 'post');
    }

    //-------------- My

    //todo: extends Migration
    private function linkTables($table1, $table2)
    {
        $this->createIndex(
            "idx-$table1-{$table2}_id",
            $table1,
            "{$table2}_id"
        );

        $this->addForeignKey(
            "fk-$table1-{$table2}_id",
            $table1,
            "{$table2}_id",
            $table2,
            "id",
            "CASCADE"
        );
    }

}
