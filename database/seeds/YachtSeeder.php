<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Yacht;

class YachtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $now = Carbon::now()->toDateTimeString();
        Yacht::insert([
            ["name" => "Eugene1", "description" => "Eugene 1 is our luxury 140ft three-storey yacht which comes with top
            of the range features such as; Exquisite interior design, Fully
            air-conditioned interior with chilling capacity of 528,000BTU, Guest
            capacity: 600 (Banquet) & 1000 (standing), Automated sunroof,
            In-built 32 CCTV Cameras, Automated Sensor Doors, Hygienic Toilets,
            230KW power generation, 4 Cabin rooms and so much more...", "updated_at" => $now, "created_at" => $now],
            ["name" => "Eugene", "description" => "Eugene is a private luxurious yacht with a capacity of 8 to 10 people.The
              beautiful leather interior piece sailing at 8 to 10 knots cruising speed has a
              black water tank capacity of 220litres and fully air conditioned with 8000
              BTU with bathroom shower and kitchenette. This is solely A PRIVATE
              CRUISE", "created_at" => $now, "updated_at" => $now]
        ]);
    }
}
