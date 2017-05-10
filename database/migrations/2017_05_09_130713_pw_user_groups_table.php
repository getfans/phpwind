<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/*

DROP TABLE IF EXISTS `pw_user_groups`;
CREATE TABLE `pw_user_groups` (
  `gid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户组ID',
  `name` varchar(64) NULL DEFAULT '' COMMENT '用户组名字',
  `type` enum('default','member','system','special','vip') NOT NULL COMMENT '用户组类型',
  `image` varchar(32) NULL DEFAULT '' COMMENT '用户组图标',
  `points` int(10) unsigned NULL DEFAULT '0' COMMENT '用户组需要的点',
  PRIMARY KEY (`gid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='用户组表';

 */

class PwUserGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pw_user_groups', function (Blueprint $table) {
            if (env('DB_CONNECTION', false) === 'mysql') {
                $table->engine = 'InnoDB';
            }
            $table->mediumIncrements('gid')->unsigned()->comment('用户组ID');
            $table->string('name', 64)->nullable()->default('')->comment('用户组名字');
            $table->enum('type', ['default', 'member', 'system', 'special', 'vip'])->comment('用户组类型');
            $table->string('image', 32)->nullable()->default('')->comment('用户组图标');
            $table->integer('points')->unsigned()->nullable()->default(0)->comment('用户组需要的点');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pw_user_groups');
    }
}
