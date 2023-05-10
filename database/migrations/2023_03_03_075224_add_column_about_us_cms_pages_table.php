<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cms_pages', function (Blueprint $table) {
            $table->string('section_one_title_en')->after('page_content_ar')->comment('for aboutus')->nullable();
            $table->string('section_one_title_ar')->after('section_one_title_en')->comment('for aboutus')->nullable();
            $table->string('section_one_image')->after('section_one_title_ar')->comment('for aboutus')->nullable();
            $table->longText('section_one_en')->after('section_one_image')->comment('for aboutus')->nullable();
            $table->longText('section_one_ar')->after('section_one_en')->comment('for aboutus')->nullable();

            $table->string('section_two_title_en')->after('section_one_ar')->comment('for aboutus')->nullable();
            $table->string('section_two_title_ar')->after('section_two_title_en')->comment('for aboutus')->nullable();
            $table->string('section_two_image')->after('section_two_title_ar')->comment('for aboutus')->nullable();
            $table->longText('section_two_en')->after('section_two_image')->comment('for aboutus')->nullable();
            $table->longText('section_two_ar')->after('section_two_en')->comment('for aboutus')->nullable();

            $table->string('section_three_title_en')->after('section_two_ar')->comment('for aboutus')->nullable();
            $table->string('section_three_title_ar')->after('section_three_title_en')->comment('for aboutus')->nullable();
            $table->string('section_three_image')->after('section_three_title_ar')->comment('for aboutus')->nullable();
            $table->longText('section_three_en')->after('section_three_image')->comment('for aboutus')->nullable();
            $table->longText('section_three_ar')->after('section_three_en')->comment('for aboutus')->nullable();

            $table->string('section_four_title_en')->after('section_three_ar')->comment('for aboutus')->nullable();
            $table->string('section_four_title_ar')->after('section_four_title_en')->comment('for aboutus')->nullable();
            $table->string('section_four_image')->after('section_four_title_ar')->comment('for aboutus')->nullable();
            $table->longText('section_four_en')->after('section_four_image')->comment('for aboutus')->nullable();
            $table->longText('section_four_ar')->after('section_four_en')->comment('for aboutus')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cms_pages', function (Blueprint $table) {
            //
        });
    }
};
