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
        if (!in_array('cms', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%cms}}', [
                    'id'        => 'INT(10) UNSIGNED NOT NULL AUTO_INCREMENT',
                    0           => 'PRIMARY KEY (`id`)',
                    'layout_id' => 'SMALLINT(5) UNSIGNED NOT NULL',
                    'name'      => 'VARCHAR(100) NOT NULL',
                    'css_id'    => 'SMALLINT(5) UNSIGNED NULL',
                    'url'       => 'VARCHAR(200) NOT NULL',
                    'in_menu'   => 'TINYINT(1) UNSIGNED NULL',
                    'active'    => 'TINYINT(1) UNSIGNED NULL',
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
        if (!in_array('cms_files', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%cms_files}}', [
                    'id'        => 'INT(10) UNSIGNED NOT NULL AUTO_INCREMENT',
                    0           => 'PRIMARY KEY (`id`)',
                    'cms_id'    => 'INT(10) UNSIGNED NOT NULL',
                    'name'      => 'VARCHAR(100) NOT NULL',
                    'file'      => 'VARCHAR(100) NOT NULL',
                    'file_type' => 'VARCHAR(4) NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('cms_fonts', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%cms_fonts}}', [
                    'id'          => 'SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT',
                    0             => 'PRIMARY KEY (`id`)',
                    'name'        => 'VARCHAR(100) NULL',
                    'font_family' => 'VARCHAR(100) NOT NULL',
                    'url'         => 'VARCHAR(200) NOT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('cms_layout', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%cms_layout}}', [
                    'id'   => 'SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT',
                    0      => 'PRIMARY KEY (`id`)',
                    'name' => 'VARCHAR(45) NOT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('cms_sections', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%cms_sections}}', [
                    'id'       => 'INT(10) UNSIGNED NOT NULL AUTO_INCREMENT',
                    0          => 'PRIMARY KEY (`id`)',
                    'cms_id'   => 'INT(11) NOT NULL',
                    'name'     => 'VARCHAR(100) NOT NULL',
                    'html'     => 'TEXT NULL',
                    'position' => 'SMALLINT(6) NOT NULL',
                ], $tableOptions_mysql);
            }
        }


        $this->createIndex('idx_layout_id_111_00', 'cms', 'layout_id', 0);
        $this->createIndex('idx_css_id_111_01', 'cms', 'css_id', 0);
        $this->createIndex('idx_cms_id_1155_02', 'cms_files', 'cms_id', 0);

        $this->execute('SET foreign_key_checks = 0');
        $this->addForeignKey('fk_cms_css_1105_00', '{{%cms}}', 'css_id', '{{%cms_css}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_cms_layout_1105_01', '{{%cms}}', 'layout_id', '{{%cms_layout}}', 'id', 'CASCADE', 'NO ACTION');
        $this->execute('SET foreign_key_checks = 1;');

        $this->execute('SET foreign_key_checks = 0');
        $this->insert('{{%cms}}', ['id' => '1', 'layout_id' => '1', 'name' => 'Sample Page', 'css_id' => '7', 'url' => 'sample-page', 'in_menu' => '0', 'active' => '1']);
        $this->insert('{{%cms_css}}', ['id' => '1', 'selector' => '.round-corner-5', 'css' => '-webkit-border-radius: 5px;
-moz-border-radius: 5px;
border-radius: 5px;
']);
        $this->insert('{{%cms_css}}', ['id' => '2', 'selector' => '.question', 'css' => 'display: block;
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
        $this->insert('{{%cms_css}}', ['id' => '3', 'selector' => '.answer', 'css' => 'display: block;
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
        $this->insert('{{%cms_css}}', ['id' => '4', 'selector' => '.text', 'css' => 'font-size: 1.0em;
line-height: 1.4em;
font-weight: 300;
font-variant: normal;
color: #555555;
font-family: \'Source Sans Pro\', sans-serif;
text-align: left;
white-space: normal;
']);
        $this->insert('{{%cms_css}}', ['id' => '5', 'selector' => '.float-left', 'css' => 'float: left;
']);
        $this->insert('{{%cms_css}}', ['id' => '6', 'selector' => '.float-right', 'css' => 'float: right;
']);
        $this->insert('{{%cms_css}}', ['id' => '7', 'selector' => '.title-large', 'css' => 'font-size: 2.75em;
font-weight: 900;
line-height: 1em;
font-variant: small-caps;
font-family: \'Sahitya\', Arial, Helvetica, Sans-serif;
color: #FFFFFF;
text-shadow: 2px 2px 3px rgba(0, 0, 0, 0.8);
']);
        $this->insert('{{%cms_css}}', ['id' => '8', 'selector' => '.bold', 'css' => 'font-weight: bold;
']);
        $this->insert('{{%cms_fonts}}', ['id' => '1', 'name' => 'Source Sans Pro', 'font_family' => '\'Source Sans Pro\', sans-serif;', 'url' => '//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400']);
        $this->insert('{{%cms_layout}}', ['id' => '1', 'name' => 'Tabs Top']);
        $this->insert('{{%cms_layout}}', ['id' => '2', 'name' => 'Sidebar']);
        $this->insert('{{%cms_sections}}', ['id' => '1', 'cms_id' => '1', 'name' => 'Section 1', 'html' => '<div class="item-container">

<p class="text">
    <span class="bold">Phasellus</span> ac purus aliquet, dictum lectus ut, maximus turpis. Morbi ac augue vitae lacus vestibulum gravida in at quam. Sed vitae massa lorem. Donec sed porta purus, et faucibus lorem. Aenean
    augue arcu, finibus sed ante ac, volutpat varius orci. Cras fermentum justo quis nisl venenatis rutrum. Nullam laoreet, ligula et pretium maximus, eros justo ultricies risus, et tristique sem quam
    ac nibh. Vestibulum aliquam ligula quam, quis commodo diam malesuada ut. Mauris eget mollis quam. Nullam consectetur diam volutpat varius fermentum. Mauris a turpis mi. Sed vestibulum purus non
    nisl dapibus, eu sollicitudin nibh feugiat. Praesent mi orci, tristique vel consequat ac, viverra quis erat. In hac habitasse platea dictumst. Quisque ac mi vitae ex pharetra pharetra id id augue.
</p>

<p class="text">
    Duis eu euismod ipsum. Duis scelerisque ante arcu, ullamcorper sagittis tortor porttitor hendrerit. Morbi ut neque finibus, faucibus erat vitae, pulvinar justo. Vestibulum sit amet orci leo.
    Maecenas blandit finibus pellentesque. Praesent finibus dui sit amet arcu aliquet consequat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Phasellus
    efficitur luctus turpis, eu semper felis tincidunt eget. Donec blandit sed elit in gravida.
</p>

</div>', 'position' => '1']);
        $this->insert('{{%cms_sections}}', ['id' => '2', 'cms_id' => '1', 'name' => 'Section 2', 'html' => '<div class="item-container">

    <div class="question">Sed ut tortor pulvinar, cursus dolor eu, imperdiet augue. Nulla eget dapibus nisi?</div>
    <div class="answer">Quisque congue pharetra lorem at lobortis. Phasellus scelerisque aliquet lectus, non finibus est eleifend ac. Praesent ut odio consectetur, accumsan arcu ac, dictum mi. Mauris
        eu ligula
        tempor, laoreet nunc non, blandit sapien. Integer laoreet tortor non volutpat venenatis. Nunc imperdiet consequat consectetur. Aenean bibendum id risus ac sagittis.
    </div>

    <div class="question">Curabitur nec nisi tincidunt?</div>
    <div class="answer">Maecenas sagittis tellus placerat libero vestibulum, vitae rhoncus lorem ultrices. Morbi pulvinar, ipsum eget feugiat dapibus, enim risus suscipit diam, vitae auctor odio dui
        varius nibh.
        Vivamus dignissim justo velit, sed hendrerit tortor euismod viverra.
    </div>

    <div class="question">Proin aliquam suscipit risus, sed iaculis sapien fringilla eu?</div>
    <div class="answer">Curabitur at pulvinar felis. Aliquam sit amet turpis eget felis efficitur tincidunt imperdiet non odio. Integer sit amet odio eros. Nam dapibus massa eget condimentum dictum.
        Curabitur non blandit metus. Praesent laoreet quis justo id tempor.
    </div>

</div>', 'position' => '2']);
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