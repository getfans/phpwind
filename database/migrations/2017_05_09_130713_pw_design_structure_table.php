<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/*

DROP TABLE IF EXISTS `pw_design_structure`;
CREATE TABLE `pw_design_structure` (
  `struct_name` varchar(50) NOT NULL COMMENT '结构名称',
  `struct_title` text COMMENT '结构标题',
  `struct_style` text COMMENT '结构样式',
 `segment` varchar(50) NULL DEFAULT '' COMMENT '结构所属片段',
  PRIMARY KEY (`struct_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='结构数据表';

 */

class PwDesignStructureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pw_design_structure', function (Blueprint $table) {
            if (env('DB_CONNECTION', false) === 'mysql') {
                $table->engine = 'InnoDB';
            }
            $table->string('struct_name', 50)->comment('结构名称');
            $table->text('struct_title')->comment('结构标题');
            $table->text('struct_style')->comment('结构样式');
            $table->string('segment', 50)->nullable()->comment('结构所属片段');
            $table->primary('struct_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pw_design_structure');
    }
}
