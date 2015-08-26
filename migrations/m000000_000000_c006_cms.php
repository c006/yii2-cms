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

        self::down();

        $tables = Yii::$app->db->schema->getTableNames();
        $dbType = $this->db->driverName;
        $tableOptions_mysql = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
        $tableOptions_mssql = "";
        $tableOptions_pgsql = "";
        $tableOptions_sqlite = "";
        /* MYSQL */
        if (!in_array('cms', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%cms}}', [
                    'id' => 'INT(10) UNSIGNED NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'layout_id' => 'SMALLINT(5) UNSIGNED NOT NULL',
                    'name' => 'VARCHAR(100) NOT NULL',
                    'css_id' => 'SMALLINT(5) UNSIGNED NULL',
                    'url' => 'VARCHAR(200) NOT NULL',
                    'in_menu' => 'TINYINT(1) UNSIGNED NULL',
                    'active' => 'TINYINT(1) UNSIGNED NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('cms_css', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%cms_css}}', [
                    'id' => 'SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'selector' => 'VARCHAR(100) NOT NULL',
                    'css' => 'TEXT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('cms_files', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%cms_files}}', [
                    'id' => 'INT(10) UNSIGNED NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'cms_id' => 'INT(10) UNSIGNED NOT NULL',
                    'name' => 'VARCHAR(100) NOT NULL',
                    'file' => 'VARCHAR(100) NOT NULL',
                    'file_type' => 'VARCHAR(4) NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('cms_fonts', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%cms_fonts}}', [
                    'id' => 'SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'name' => 'VARCHAR(100) NULL',
                    'font_family' => 'VARCHAR(100) NOT NULL',
                    'url' => 'VARCHAR(200) NOT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('cms_layout', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%cms_layout}}', [
                    'id' => 'SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'name' => 'VARCHAR(45) NOT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('cms_sections', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%cms_sections}}', [
                    'id' => 'INT(10) UNSIGNED NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'cms_id' => 'INT(11) NOT NULL',
                    'name' => 'VARCHAR(100) NOT NULL',
                    'html' => 'TEXT NULL',
                    'position' => 'SMALLINT(6) NOT NULL',
                ], $tableOptions_mysql);
            }
        }


        $this->createIndex('idx_layout_id_474_00','cms','layout_id',0);
        $this->createIndex('idx_css_id_474_01','cms','css_id',0);
        $this->createIndex('idx_cms_id_4772_02','cms_files','cms_id',0);

        $this->execute('SET foreign_key_checks = 0');
        $this->addForeignKey('fk_cms_layout_4736_00','{{%cms}}', 'layout_id', '{{%cms_layout}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_cms_css_4736_01','{{%cms}}', 'css_id', '{{%cms_css}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->execute('SET foreign_key_checks = 1;');


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
        $this->execute('DROP TABLE IF EXISTS `cms_files`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `cms_fonts`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `cms_layout`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `cms_sections`');
        $this->execute('SET foreign_key_checks = 1;');



    }

}