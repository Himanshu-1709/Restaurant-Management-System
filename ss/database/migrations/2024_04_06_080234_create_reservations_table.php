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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('guest')->nullable();
            $table->string('date')->nullable();
            $table->string('time')->nullable();
            $table->string('message')->nullable();
            $table->timestamps();
        });

        $date = $table->string('date');
        $count = DB::table('reservations')->where('date', $date)->count();

        echo $count;

        if ($count > 2) {
            throw new \Exception('Too many reservations.');
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
};
