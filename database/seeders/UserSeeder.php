<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->regularUser();
        $this->company();
        $this->recruiter();
    }

    public function regularUser()
    {
        $users = [
            [
                "first_name" => "Angelia",
                "last_name" => "Salim",
                "image_url" => "https://res.cloudinary.com/sivadira/image/upload/v1637383285/hackathon/angel_imciex.jpg",
                "country" => "Indonesia",
                "city" => "Jakarta",
                "address" => "Gedung sarana Jaya Jl. Budi Kemuliaan I no. 1, RT.2/RW.3, Gambir",
                "state" => "Jakarta Pusat",
                "zip" => "10110",
                "interest" => "System Analyst",
                "company_id" => null,
                "email" => "angelia@gmail.com",
                "dob" => Carbon::today()->addYears(-20),
                "phone" => "02321312123"
            ],
            [
                "first_name" => "Rafael",
                "last_name" => "Jonathan",
                "image_url" => "https://res.cloudinary.com/sivadira/image/upload/v1637383230/hackathon/rafael_2_lbreli.jpg",
                "country" => "Indonesia",
                "city" => "Jakarta",
                "address" => " Jl. Raya Kb. Jeruk No.27, RT.2/RW.9, Kb. Jeruk, Kec. Kb. Jeruk,",
                "state" => "Jakarta Barat",
                "zip" => "10110",
                "interest" => "Software Engineering",
                "company_id" => null,
                "email" => "rafael@gmail.com",
                "dob" => Carbon::today()->addYears(-20),
                "phone" => "02321912123"
            ],
        ];
        foreach ($users as $s) {
            $user = new User();
            $user->first_name = $s["first_name"];
            $user->last_name = $s["last_name"];
            $user->image_url = $s["image_url"];
            $user->country = $s["country"];
            $user->city = $s["city"];
            $user->address = $s["address"];
            $user->state = $s["state"];
            $user->interest = $s["interest"];
            $user->company_id = $s["company_id"];
            $user->email = $s["email"];
            $user->password = bcrypt("password");
            $user->dob = $s["dob"];
            $user->phone = $s["phone"];
            $user->role_id = 1;
            $user->save();
        }
    }

    public function company()
    {
        $companies =
            [
                [
                    "name" => "Tokopedia",
                    "country" => "Indonesia",
                    "city" => "Jakarta",
                    "state" => "Jakarta Selatan",
                    "address" => " Jl. Prof. DR. Satrio No.3, Karet Semanggi, Kecamatan Setiabudi",
                    "zip" => "12950",
                    "image_url" => "https://assets.tokopedia.net/assets-tokopedia-lite/v2/arael/kratos/36c1015e.png",
                    "category" => "Technology",
                ],
                [
                    "name" => "Tiket",
                    "country" => "Indonesia",
                    "city" => "Jakarta",
                    "state" => "Jakarta Pusat",
                    "address" => "Gedung Graha Niaga Thamrin, Jl. K.H. Mas Mansyur, RT.2/RW.8, Kb. Melati, Kecamatan Tanah Abang",
                    "image_url" => "https://m.tiket.com/home-ms-v4/assets/Icon-200.png",
                    "zip" => "12980",
                    "category" => "Technology",
                ]
            ];
        foreach ($companies as $s) {
            $company = new Company();
            $company->name = $s["name"];
            $company->country = $s["country"];
            $company->city = $s["city"];
            $company->state = $s["state"];
            $company->address = $s["address"];
            $company->zip = $s["zip"];
            $company->image_url = $s["image_url"];
            $company->category = $s["category"];
            $company->save();
        }
    }

    public function recruiter()
    {
        $users = [
            [
                "first_name" => "Ari",
                "last_name" => "Davis",
                "image_url" => "https://res.cloudinary.com/sivadira/image/upload/v1637383211/hackathon/ari_cqsb1h.jpg",
                "country" => "Indonesia",
                "city" => "Jakarta",
                "address" => "Gedung sarana Jaya Jl. Budi Kemuliaan I no. 1, RT.2/RW.3, Gambir",
                "state" => "Jakarta Pusat",
                "zip" => "10110",
                "interest" => null,
                "company_id" => 1,
                "email" => "ari@gmail.com",
                "dob" => Carbon::today()->addYears(-20),
                "phone" => "02321312121"
            ],
            [
                "first_name" => "Junaedi",
                "last_name" => "Dede",
                "image_url" => "https://res.cloudinary.com/sivadira/image/upload/v1637383270/hackathon/JU_xtnhbc.jpg",
                "country" => "Indonesia",
                "city" => "Jakarta",
                "address" => " Jl. Raya Kb. Jeruk No.27, RT.2/RW.9, Kb. Jeruk, Kec. Kb. Jeruk,",
                "state" => "Jakarta Barat",
                "zip" => "10110",
                "interest" => null,
                "company_id" => 2,
                "email" => "junaedi@gmail.com",
                "dob" => Carbon::today()->addYears(-20),
                "phone" => "02321312122"
            ],
        ];
        foreach ($users as $s) {
            $user = new User();
            $user->first_name = $s["first_name"];
            $user->last_name = $s["last_name"];
            $user->image_url = $s["image_url"];
            $user->country = $s["country"];
            $user->city = $s["city"];
            $user->address = $s["address"];
            $user->state = $s["state"];
            $user->interest = $s["interest"];
            $user->company_id = $s["company_id"];
            $user->email = $s["email"];
            $user->password = bcrypt("password");
            $user->role_id = 2;
            $user->dob = $s["dob"];
            $user->phone = $s["phone"];
            $user->save();
        }
    }
}
