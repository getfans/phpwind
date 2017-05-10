<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/*

DROP TABLE IF EXISTS `pw_design_segment`;
CREATE TABLE `pw_design_segment` (
  `segment` varchar(50) NOT NULL COMMENT '片段名称',
  `page_id` smallint(5) unsigned NOT NULL COMMENT '所属页面ID',
  `segment_tpl` MEDIUMTEXT COMMENT '片段代码',
  `segment_struct` MEDIUMTEXT  COMMENT '片段结构代码',
  PRIMARY KEY (`segment`,`page_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='门户片段表';

 */

class PwDesignSegmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pw_design_segment', function (Blueprint $table) {
            if (env('DB_CONNECTION', false) === 'mysql') {
                $table->engine = 'InnoDB';
            }
            $table->string('segment', 50)->default('')->comment('片段名称');
            $table->smallInteger('page_id')->unsigned()->nullable()->default(0)->comment('所属页面ID');
            $table->mediumText('segment_tpl')->comment('片段代码');
            $table->mediumText('segment_struct')->comment('片段结构代码');
            $table->primary(['segment', 'page_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pw_design_segment');
    }
}
