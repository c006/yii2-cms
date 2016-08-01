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

        $this->execute('SET foreign_key_checks = 0');
        $this->insert('{{%cms}}',['id'=>'1','layout_id'=>'1','name'=>'Sample Page','css_id'=>'7','url'=>'sample-page','in_menu'=>'0','active'=>'1']);
        $this->insert('{{%cms_fonts}}',['id'=>'1','name'=>'Source Sans Pro','font_family'=>'\'Source Sans Pro\', sans-serif;','url'=>'//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400']);
        $this->insert('{{%cms_css}}',['id'=>'1','selector'=>'.round-corner-5','css'=>'-webkit-border-radius: 5px;
-moz-border-radius: 5px;
border-radius: 5px;
']);
        $this->insert('{{%cms_css}}',['id'=>'2','selector'=>'.question','css'=>'display: block;
margin: 0;
margin-top: 20px;
padding: 3px 10px;
background-color: #344C2D;
color: #CCCCCC;
font-weight: 700;
font-size: 1.1em;
font-family: \'Source Sans Pro\', sans-serif;
-webkit-border-top-left-radius: 7px;
-webkit-border-top-right-radius: 7px;
-moz-border-radius-topleft: 7px;
-moz-border-radius-topright: 7px;
border-top-left-radius: 7px;
border-top-right-radius: 7px;
']);
        $this->insert('{{%cms_css}}',['id'=>'3','selector'=>'.answer','css'=>'display: block;
margin: 0;
margin-bottom: 20px;
padding: 3px 10px;
background-color: #BDBD9A;
color: #21331B;
font-weight: 400;
font-size: 0.9em;
font-family: \'Source Sans Pro\', sans-serif;
-webkit-border-bottom-right-radius: 7px;
-webkit-border-bottom-left-radius: 7px;
-moz-border-radius-bottomright: 7px;
-moz-border-radius-bottomleft: 7px;
border-bottom-right-radius: 7px;
border-bottom-left-radius: 7px;
']);
        $this->insert('{{%cms_css}}',['id'=>'4','selector'=>'.text','css'=>'font-size: 1.0em;
line-height: 1.4em;
font-weight: 300;
font-variant: normal;
color: #555555;
font-family: \'Source Sans Pro\', sans-serif;
text-align: left;
white-space: normal;
']);
        $this->insert('{{%cms_css}}',['id'=>'5','selector'=>'.float-left','css'=>'float: left;
']);
        $this->insert('{{%cms_css}}',['id'=>'6','selector'=>'.float-right','css'=>'float: right;
']);
        $this->insert('{{%cms_css}}',['id'=>'7','selector'=>'.title-large','css'=>'font-size: 2.75em;
font-weight: 900;
line-height: 1em;
font-variant: small-caps;
font-family: \'Sahitya\', Arial, Helvetica, Sans-serif;
color: #FFFFFF;
text-shadow: 2px 2px 3px rgba(0, 0, 0, 0.8);
']);
        $this->insert('{{%cms_layout}}',['id'=>'1','name'=>'Tabs Top']);
        $this->insert('{{%cms_layout}}',['id'=>'2','name'=>'Sidebar']);
        $this->insert('{{%cms_sections}}',['id'=>'1','cms_id'=>'1','name'=>'Section 1','html'=>'

    
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent metus lacus, consectetur ac laoreet in, volutpat vitae velit. Donec sodales arcu
        interdum metus blandit, sed
        tempor massa dapibus. Nam odio tellus, fringilla at enim at, faucibus fermentum ex. Aliquam sagittis sodales ante id sodales. Morbi sit amet elementum augue, vel elementum nisi. Maecenas ut
        turpis tempor, tristique neque sed, elementum lorem. Aenean ullamcorper augue vitae neque porta, eu bibendum turpis gravida. Quisque dictum a orci molestie porta. Quisque tristique quam
        tristique gravida viverra. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum ornare risus rutrum, pharetra risus quis, hendrerit quam. 



    

        Curabitur nec nisi tincidunt, tempus lacus sed, dignissim neque. Praesent vehicula viverra varius. Donec eget risus leo. Nunc neque tellus, iaculis eget elementum at, scelerisque eu nisl.
        Maecenas sagittis tellus placerat libero vestibulum, vitae rhoncus lorem ultrices. Morbi pulvinar, ipsum eget feugiat dapibus, enim risus suscipit diam, vitae auctor odio dui varius nibh.
        Vivamus dignissim justo velit, sed hendrerit tortor euismod viverra.
    


','position'=>'1']);
        $this->insert('{{%cms_sections}}',['id'=>'2','cms_id'=>'1','name'=>'Section 2','html'=>'


    
Sed ut tortor pulvinar, cursus dolor eu, imperdiet augue. Nulla eget dapibus nisi?

    
Quisque congue pharetra lorem at lobortis. Phasellus scelerisque aliquet lectus, non finibus est eleifend ac. Praesent ut odio consectetur, accumsan arcu ac, dictum mi. Mauris
        eu ligula
        tempor, laoreet nunc non, blandit sapien. Integer laoreet tortor non volutpat venenatis. Nunc imperdiet consequat consectetur. Aenean bibendum id risus ac sagittis.
    


    
Curabitur nec nisi tincidunt?

    
Maecenas sagittis tellus placerat libero vestibulum, vitae rhoncus lorem ultrices. Morbi pulvinar, ipsum eget feugiat dapibus, enim risus suscipit diam, vitae auctor odio dui
        varius nibh.
        Vivamus dignissim justo velit, sed hendrerit tortor euismod viverra.
    


    
Proin aliquam suscipit risus, sed iaculis sapien fringilla eu?

    
Curabitur at pulvinar felis. Aliquam sit amet turpis eget felis efficitur tincidunt imperdiet non odio. Integer sit amet odio eros. Nam dapibus massa eget condimentum dictum.
        Curabitur non blandit metus. Praesent laoreet quis justo id tempor.
    


','position'=>'2']);
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