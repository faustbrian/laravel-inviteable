<?php



use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInvitesTable extends Migration
{
    public function up()
    {
        Schema::create('invites', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('email')->nullable();
            $table->timestamp('claimed_at')->nullable();
            $table->integer('claimer_id')->unsigned()->index()->nullable();
            $table->string('claimer_type')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('invites');
    }
}
