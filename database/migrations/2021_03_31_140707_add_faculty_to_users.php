<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFacultyToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum("faculty", 
            ["Faculty of Medicine and Health Sciences", 
            "Lee Kong Chian Faculty of Engineering and Science", 
            "Faculty of Engineering and Green Technology",
            "Faculty of Information and Communication Technology",
            "Faculty of Science",
            "Faculty of Accountancy and Management",
            "Faculty of Creative Industries",
            "Institute of Postgraduate Studies & Research",
            "Institure of Chinese Studies",
            "Institute of Management & Leadership Development",
            "Centre for Foundation Studies",
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
