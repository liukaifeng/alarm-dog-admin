<?php

declare(strict_types=1);

use App\Support\HelpersForMigration;
use Hyperf\Database\Migrations\Migration;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Schema\Schema;

class CreateAlarmGroupSmsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('alarm_group_sms', function (Blueprint $table) {
            $table->integer('id', true, true)->comment('自增ID');
            $table->integer('group_id', false, true)->default(0)->comment('告警组ID');
            $table->integer('uid', false, true)->default(0)->comment('关联用户ID');
            $table->index('group_id', 'idx_groupid');
            $table->index('uid', 'idx_uid');
        });
        HelpersForMigration::commentTable('alarm_group_sms', '告警通知组短信关联表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alarm_group_sms');
    }
}
