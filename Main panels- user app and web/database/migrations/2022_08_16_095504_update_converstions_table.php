<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateConverstionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('conversations', 'user_id') && !Schema::hasColumn('conversations', 'sender_id')) {
            Schema::table('conversations', function (Blueprint $table) {
                $table->renameColumn('user_id', 'sender_id');
            });
        }

        Schema::table('conversations', function (Blueprint $table) {
            if (!Schema::hasColumn('conversations', 'sender_type')) {
                $table->string('sender_type')->nullable();
            }
            if (!Schema::hasColumn('conversations', 'receiver_id')) {
                $table->foreignId('receiver_id')->nullable();
            }
            if (!Schema::hasColumn('conversations', 'receiver_type')) {
                $table->string('receiver_type')->nullable();
            }
            if (!Schema::hasColumn('conversations', 'last_message_id')) {
                $table->foreignId('last_message_id')->nullable();
            }
            if (!Schema::hasColumn('conversations', 'last_message_time')) {
                $table->timestamp('last_message_time')->nullable();
            }
            if (!Schema::hasColumn('conversations', 'unread_message_count')) {
                $table->integer('unread_message_count')->default(0);
            }
            if (Schema::hasColumn('conversations', 'message')) {
                $table->dropColumn('message');
            }
            if (Schema::hasColumn('conversations', 'reply')) {
                $table->dropColumn('reply');
            }
            if (Schema::hasColumn('conversations', 'checked')) {
                $table->dropColumn('checked');
            }
            if (Schema::hasColumn('conversations', 'image')) {
                $table->dropColumn('image');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('conversations', 'sender_id') && !Schema::hasColumn('conversations', 'user_id')) {
            Schema::table('conversations', function (Blueprint $table) {
                $table->renameColumn('sender_id', 'user_id');
            });
        }
    }
}
