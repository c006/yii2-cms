<?php

namespace c006\cms\migrations;

use Yii;
use yii\db\Migration;

class m000000_000000_c006_cms extends Migration
{

    /**
     *  ~ Console command ~
     *
     * php yii migrate --migrationPath=@vendor/c006/yii2-cms/migrations
     *
     */

    /**
     *
     */
    public function up()
    {
        $tables = Yii::$app->db->schema->getTableNames();
        $dbType = $this->db->driverName;
        $tableOptions_mysql = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
        $tableOptions_mssql = "";
        $tableOptions_pgsql = "";
        $tableOptions_sqlite = "";

        /* MYSQL */
        if (!in_array('cms', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%cms}}', [
                    'id'          => 'INT(10) UNSIGNED NOT NULL AUTO_INCREMENT',
                    0             => 'PRIMARY KEY (`id`)',
                    'title'       => 'VARCHAR(100) NOT NULL',
                    'name_css_id' => 'SMALLINT(5) UNSIGNED NULL',
                    'html'        => 'TEXT NULL',
                    'url'         => 'VARCHAR(200) NOT NULL',
                    'active'      => 'TINYINT(1) UNSIGNED NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('cms_css', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%cms_css}}', [
                    'id'       => 'SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT',
                    0          => 'PRIMARY KEY (`id`)',
                    'selector' => 'VARCHAR(100) NOT NULL',
                    'css'      => 'TEXT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('css_files', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%css_files}}', [
                    'id'        => 'INT(10) UNSIGNED NOT NULL AUTO_INCREMENT',
                    0           => 'PRIMARY KEY (`id`)',
                    'name'      => 'VARCHAR(100) NOT NULL',
                    'file'      => 'VARCHAR(100) NOT NULL',
                    'file_type' => 'VARCHAR(4) NULL',
                ], $tableOptions_mysql);
            }
        }

    }

    /**
     *
     */
    public function down()
    {

        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `cms`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `cms_css`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `css_files`');
        $this->execute('SET foreign_key_checks = 1;');

    }

}