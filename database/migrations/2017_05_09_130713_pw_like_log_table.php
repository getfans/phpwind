<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/*

DROP TABLE IF EXISTS `pw_like_log`;
CREATE TABLE `pw_like_log` (
  `logid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '标识ID',
  `uid` int(10) unsigned NULL DEFAULT '0' COMMENT '用户ID',
  `likeid` int(10) unsigned NULL DEFAULT '0' COMMENT '喜欢ID',
  `tagids` varchar(50) NULL DEFAULT '' COMMENT '分类标签ID',
  `created_time` int(10) unsigned NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`logid`),
  KEY `idx_uid` (`uid`),
  KEY `idx_created_time` (`created_time`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='喜欢记录表';

 */

class PwLikeLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pw_like_log', function (Blueprint $table) {
            if (env('DB_CONNECTION', false) === 'mysql') {
                $table->engine = 'InnoDB';
            }
            $table->increments('logid')->unsigned()->comment('标识ID');
            $table->integer('uid')->unsigned()->nullable()->default(0)->comment('用户ID');
            $table->integer('likeid')->unsigned()->nullable()->default(0)->comment('喜欢ID');
            $table->string('tagids', 50)->nullable()->default('')->comment('分类标签ID');
            $table->integer('created_time')->unsigned()->nullable()->default(0)->comment('创建时间');

            $table->index('uid');
            $table->index('created_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pw_like_log');
    }
}
